<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(15);

        return view('orders', ['orders' => $orders]);
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
}
