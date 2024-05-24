<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
    

        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
    
        if ($minPrice !== null && $minPrice !== '') {
            $query->where('price', '>=', $minPrice);
        }
        if ($maxPrice !== null && $maxPrice !== '') {
            $query->where('price', '<=', $maxPrice);
        }
    

        $sortOrder = $request->input('sort', 'none');
        if ($sortOrder === 'asc') {
            $query->orderBy('name', 'asc');
        } elseif ($sortOrder === 'desc') {
            $query->orderBy('name', 'desc');
        }
        $currentPage = $request->query('page') ?? 1;

        $products = $query->paginate(50)->appends([
            'min_price' => $minPrice,
            'max_price' => $maxPrice,
            'sort' => $sortOrder,
        ]);
    

        return view('products.index', [
            'products' => $products,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'sortOrder' => $sortOrder,
            'currentPage' => $currentPage,
        ]);
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
            'price' => 'nullable|numeric',
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
            'price' => 'nullable|numeric',
            'vendor_id' => 'nullable|integer|min:1',
            'vendor_email' => 'required|email',
            'vendor_name' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $vendor = Vendor::where('email', $request->input('vendor_email'))->first();

        if (!$vendor) {
            return redirect()->back()->withErrors(['vendor_email' => 'Vendor not found for the provided email'])->withInput();
        }

        $requestData = $request->all();
        $requestData['vendor_id'] = $vendor->id;

        Product::create($requestData);

        return redirect()->route('list.products')->with('success', 'Product added successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['success' => true]);
    }

    public function showAddProductForm($vendorId)
{
    $vendor = Vendor::findOrFail($vendorId);
    return view('vendors.add_product', compact('vendor'));
}

public function addProduct(Request $request, $vendorId)
{
    $vendor = Vendor::findOrFail($vendorId);

    $validator = Validator::make($request->all(), [
        'cod' => 'required|integer|min:1',
        'name' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'nullable|numeric',
        'category' => 'required|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $requestData = $request->all();
    $requestData['vendor_id'] = $vendor->id;
    $requestData['vendor_email'] = $vendor->email;
    $requestData['vendor_name'] = $vendor->name;

    Product::create($requestData);

    return redirect()->route('vendors.show', $vendorId)->with('success', 'Product added successfully!');
}

public function editProductForm($vendorId, $productId)
{
    $vendor = Vendor::findOrFail($vendorId);
    $product = Product::findOrFail($productId);

    return view('vendors.edit_product', compact('vendor', 'product'));
}

public function updateProduct(Request $request, $vendorId, $productId)
{
    $vendor = Vendor::findOrFail($vendorId);
    $product = Product::findOrFail($productId);

    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0.01',
    ], [
        'price.min' => 'Introduce a valid price (greater than 0)',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $product->update($request->only(['name', 'description', 'price']));

    return redirect()->route('vendors.show', $vendorId)->with('success', 'Product updated successfully!');
}

public function uploadProductImage(Request $request, $vendorId, $productId)
{
    $vendor = Vendor::findOrFail($vendorId);
    $product = Product::findOrFail($productId);

    $request->validate([
        'product_image' => 'required|image|mimes:png|max:2048',
    ], [
        'product_image.mimes' => 'Only .png files are allowed',
        'product_image.max' => 'The image size must be less than 2MB'
    ]);

    $categoryFolder = strtolower(str_replace(' ', '_', $product->category)) . 's';
    $destinationPath = public_path('images/products/vendor_' . $vendor->id . '/' . $categoryFolder);
    $fileName = 'product_' . $product->id . '.png';

    if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0777, true);
    }

    $request->file('product_image')->move($destinationPath, $fileName);

    return redirect()->route('vendors.show', $vendorId)->with('success', 'Product image uploaded successfully!');
}





}
