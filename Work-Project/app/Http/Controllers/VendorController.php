<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();

        return view('vendors.index', ['vendors' => $vendors]);
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
            'accountNumber' => 'nullable|string',
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
}

