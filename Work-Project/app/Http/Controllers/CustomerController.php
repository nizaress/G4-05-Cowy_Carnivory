<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10);

        return view('customers.index', ['customers' => $customers]);
    }

    public function delete(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|integer|min:1'
        ], [
            'customer_id.required' => 'A number must be entered',
            'customer_id.integer' => 'Only integer numbers are allowed to be entered',
            'customer_id.min' => 'Only positive integer numbers are allowed'
        ]);

        $customer = Customer::find($validatedData['customer_id']);
        if (!$customer) {
            return redirect('/customer')->with('error', 'Customer not found');
        }

        $customer->delete();
        return redirect('/customer')->with('status', 'Customer deleted successfully!');
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $data = $request->validate([
            'password' => 'nullable|string',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|integer|min:1',
            'card_number' => 'nullable|integer|min:1',
        ]);

        $customer->update($data);
        return back();
    }

    public function create()
    {
        return view('customers.insert');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'required|string',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|integer|min:1',
            'card_number' => 'nullable|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Customer::create($request->all());

        return redirect()->route('list.customers')->with('success', 'Customer added successfully!');
    }
}
