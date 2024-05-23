<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', 'none');

        if (!in_array($sortOrder, ['asc', 'desc', 'none'])) {
            $sortOrder = 'none';
        }

        $query = Order::query();

        if ($sortOrder == 'asc') {
            $query->orderBy('numOrder', 'asc');
        } elseif ($sortOrder == 'desc') {
            $query->orderBy('numOrder', 'desc');
        } else {
            $query->getQuery()->orders = [];
        }

        $orders = $query->paginate(50);

        $orders->appends(['sort' => $sortOrder]);

        return view('orders', [
            'orders' => $orders,
            'sortOrder' => $sortOrder,
        ]);
    }

    public function delete(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|integer|min:1'
        ], [
            'order_id.required' => 'A number must be entered',
            'order_id.integer' => 'Only integer numbers are allowed to be entered',
            'order_id.min' => 'Only positive integer numbers are allowed'
        ]);

        $order = Order::find($validatedData['order_id']);
        if (!$order) {
            return redirect('/order')->with('error', 'Order not found');
        }

        $order->delete();
        return redirect('/order')->with('status', 'Order deleted successfully!');
    }

    public function pendingOrders()
    {
        $userId = auth()->id();
        $currentDate = Carbon::now('Europe/Madrid')->toDateString();
        $currentTime = Carbon::now('Europe/Madrid')->toTimeString();

        $pendingOrders = Order::where('customer_id', $userId)
        ->where(function($query) use ($currentDate, $currentTime) {
            $query->where('Date', '>', $currentDate)
                  ->orWhere(function($query) use ($currentDate, $currentTime) {
                      $query->where('Date', '=', $currentDate)
                            ->where('deliveryTime', '>', $currentTime);
                  });
        })
        ->latest('Date')
        ->latest('deliveryTime')
        ->get();

        $ordersWithVendorNames = [];

        if (!$pendingOrders->isEmpty()) {
            $pendingOrders->load('lineorders.product.vendor');

            foreach ($pendingOrders as $order) {
                $orderData = [
                    'order' => $order,
                    'lineorders' => []
                ];

                foreach ($order->lineorders as $lineorder) {
                    $orderData['lineorders'][] = [
                        'product_name' => $lineorder->product_name,
                        'product_price' => $lineorder->product_price,
                        'vendor_name' => $lineorder->product->vendor->name ?? 'N/A'
                    ];
                }

                $ordersWithVendorNames[] = $orderData;
            }
        }

        return view('pending', compact('ordersWithVendorNames'));
    }

    public function lastOrders()
    {
        $userId = auth()->id();

        $pendingOrders = Order::where('customer_id', $userId)
        ->latest('Date')
        ->latest('deliveryTime')
        ->take(5)
        ->get();

        $ordersWithVendorNames = [];

        if (!$pendingOrders->isEmpty()) {
            $pendingOrders->load('lineorders.product.vendor');

            foreach ($pendingOrders as $order) {
                $orderData = [
                    'order' => $order,
                    'lineorders' => []
                ];

                foreach ($order->lineorders as $lineorder) {
                    $orderData['lineorders'][] = [
                        'product_name' => $lineorder->product_name,
                        'product_price' => $lineorder->product_price,
                        'vendor_name' => $lineorder->product->vendor->name ?? 'N/A'
                    ];
                }

                $ordersWithVendorNames[] = $orderData;
            }
        }

        return view('last', compact('ordersWithVendorNames'));
    }
}