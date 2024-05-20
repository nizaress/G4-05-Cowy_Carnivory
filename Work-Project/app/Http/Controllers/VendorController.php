<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', 'none');

        if (!in_array($sortOrder, ['asc', 'desc', 'none'])) {
            $sortOrder = 'none';
        }

        $query = Vendor::query();

        if ($sortOrder == 'asc') {
            $query->orderBy('name', 'asc');
        } elseif ($sortOrder == 'desc') {
            $query->orderBy('name', 'desc');
        } else {
            $query->getQuery()->orders = [];
        }

        $vendors = $query->paginate(10);

        $vendors->appends(['sort' => $sortOrder]);

        return view('vendors.index', [
            'vendors' => $vendors,
            'sortOrder' => $sortOrder,
        ]);
    }

    public function delete(Request $request)
    {
        $validatedData = $request->validate([
            'vendor_id' => 'required|integer|min:1'
        ], [
            'vendor_id.required' => 'A number must be entered',
            'vendor_id.integer' => 'Only integer numbers are allowed to be entered',
            'vendor_id.min' => 'Only positive integer numbers are allowed'
        ]);

        $vendor = Vendor::find($validatedData['vendor_id']);
        if (!$vendor) {
            return redirect('/vendor')->with('error', 'Vendor not found');
        }

        $vendor->delete();
        return redirect('/vendor')->with('status', 'Vendor deleted successfully!');
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);
        $data = $request->validate([
            'phone_number' => 'nullable|integer|min:1',
            'address' => 'nullable|string',
            'accountNumber' => 'nullable|integer|min:1',
        ]);

        $vendor->update($data);
        return back();
    }

    public function create()
    {
        return view('vendors.insert');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required|string',
            'phone_number' => 'nullable|integer|min:1',
            'address' => 'nullable|string',
            'accountNumber' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Vendor::create($request->all());

        return redirect()->route('list.vendors')->with('success', 'Vendor added successfully!');
    }

    public function show($id)
    {   
        $basket = session()->get('basket', []);
        foreach ($basket as $productId => $quantity) {
            $product = Product::findOrFail($productId);
            $email = $product->vendor_email;
            $vend_id = Vendor::where('email', $email)->first()->id;
            if ($vend_id != $id) {
                unset($basket[$productId]);
            }
        }
        session(['basket' => $basket]);

        $products = Product::whereIn('id', array_keys($basket))->get();
        $totalPrice = 0;
        foreach ($products as $product) {
            $totalPrice += $product->price * $basket[$product->id];
        }
        $vendor = Vendor::findOrFail($id);
        return view('vendors.show', compact('vendor', 'basket', 'products', 'totalPrice'));
    }

    public function sortaz()
    {
        $vendors = Vendor::orderBy('name', 'asc')->paginate(10);
        return view('vendors.index', compact('vendors'));
    }

    public function sortza()
    {
        $vendors = Vendor::orderBy('name', 'desc')->paginate(10);
        return view('vendors.index', compact('vendors'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $vendors = Vendor::where('name', 'like', '%' . $search . '%')->paginate(10);
        return view('vendors.index', compact('vendors'));
    }

    public function increment(Request $request)
    {
        $productId = $request->input('product_id');
        $vendorId = $request->input('vendor_id');
        $basket = session()->get('basket', []);

        $basket = session()->get('basket', []);
        if (isset($basket[$productId])) {
            $basket[$productId]++;
        }
        else {
            $basket[$productId] = 1;
        }

        session(['basket' => $basket]);
        return redirect()->route('vendors.show', $vendorId);
    }

    public function decrement(Request $request)
    {
        $productId = $request->input('product_id');
        $vendorId = $request->input('vendor_id');
        $basket = session()->get('basket', []);

        $basket = session()->get('basket', []);
        if (isset($basket[$productId])) {
            if ($basket[$productId] == 0) {
                unset($basket[$productId]);
            }
            else {
                $basket[$productId]--;
            }
        }

        session(['basket' => $basket]);
        return redirect()->route('vendors.show', $vendorId);
    }
}

