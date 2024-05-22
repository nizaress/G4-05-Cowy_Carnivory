<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Mail\PaymentSuccess;
use Illuminate\Support\Facades\Mail;
use App\Models\Vendor;

class BasketController extends Controller
{
    public function index(Request $request)
    {
        $vendorId = $request->input('vendor_id');
        // Retrieve the basket from session
        $basket = session()->get('basket', []);

        // Fetch product details for items in the basket
        $products = Product::whereIn('id', array_keys($basket))->get();

        // Calculate the total price
        $totalPrice = 0;
        foreach ($products as $product) {
            $totalPrice += $product->price * $basket[$product->id];
        }

        return view('basket.index', compact('vendorId', 'basket', 'products', 'totalPrice'));
    }

    public function increment(Request $request)
    {
        $vendorId = $request->input('vendor_id');
        $productId = $request->input('product_id');

        $basket = session()->get('basket', []);
        if (isset($basket[$productId])) {
            $basket[$productId]++;
            session(['basket' => $basket]);
        }

        return redirect()->route('basket.index', ['vendor_id' => $vendorId]);
    }

    public function decrement(Request $request)
    {
        $vendorId = $request->input('vendor_id');
        $productId = $request->input('product_id');

        $basket = session()->get('basket', []);
        if (isset($basket[$productId])) {
            if ($basket[$productId] > 1) {
                $basket[$productId]--;
            } else {
                unset($basket[$productId]);
            }
            session(['basket' => $basket]);
        }

        return redirect()->route('basket.index', ['vendor_id' => $vendorId]);
    }

    public function remove(Request $request)
    {
        $vendorId = $request->input('vendor_id');
        $productId = $request->input('product_id');

        $basket = session()->get('basket', []);
        if (isset($basket[$productId])) {
            unset($basket[$productId]);
            session(['basket' => $basket]);
        }

        return redirect()->route('basket.index', ['vendor_id' => $vendorId]);
    }

    public function pay(Request $request)
    {
        $vendorId = $request->input('vendor_id');
        $basket = session()->get('basket', []);
        $products = Product::whereIn('id', array_keys($basket))->get();

        $totalPrice = 0;
        foreach ($products as $product) {
            $totalPrice += $product->price * $basket[$product->id];
        }

        return view('basket.pay', compact('totalPrice', 'vendorId'));
    }

    public function completePayment(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'card_number' => 'required|digits:16',
            'expiry_date' => 'required|date_format:m/y',
            'cvv' => 'required|digits:3',
        ]);

        $basket = session('basket', []);
        $products = Product::whereIn('id', array_keys($basket))->get();
        $totalPrice = $products->reduce(function ($carry, $product) use ($basket) {
            return $carry + ($product->price * $basket[$product->id]);
        }, 0);

        session()->forget('basket');

        try {
            Mail::to($request->email)->send(new PaymentSuccess($request, $totalPrice));
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Email failed but payment was suuccessful. ' . $e->getMessage());
        }

        return redirect()->route('home')->with('success', 'Payment completed successfully!');
    }

}
