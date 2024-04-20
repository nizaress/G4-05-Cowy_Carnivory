<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Start building the query for products
        $query = Product::query();
    
        // Check if minimum price is provided and apply it to the query
        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('price', '>=', $request->min_price);
        }
    
        // Check if maximum price is provided and apply it to the query
        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('price', '<=', $request->max_price);
        }
    
        // Get the results of the query
        $products = $query->get();
    
        // Return the view with the filtered or unfiltered list of products
        return view('products.index', ['products' => $products]);
    }
    

    public function delete(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|integer|min:1'
        ], [
            'product_id.required' => 'A number must be entered',
            'product_id.integer' => 'Only integer numbers are allowed to be entered',
            'product_id.min' => 'Only positive integer numbers are allowed'
        ]);

        $product = Product::find($validatedData['product_id']);
        if (!$product) {
            return redirect('/product')->with('error', 'Product not found');
        }

        $product->delete();
        return redirect('/product')->with('status', 'Product deleted successfully!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validate([
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|integer',
            'vendor_id' => 'nullable|integer|min:1',
            'vendor_name' => 'nullable|string',
        ]);

        $product->update($data);
        return back();
    }

    public function create()
    {
        return view('products.insert');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'cod' => 'required|integer|min:1',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'nullable|integer',
            'vendor_id' => 'nullable|integer|min:1',
            'vendor_email' => 'required|email',
            'vendor_name' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Product::create($request->all());

        return redirect()->route('list.products')->with('success', 'Product added successfully!');
    }
}
