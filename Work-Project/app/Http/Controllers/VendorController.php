<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\VendorVote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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

        $vendors = $query->paginate(5);

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
            'category' => 'nullable|string',
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
            'password' => 'nullable|string|min:8', // 'password' => 'required|string|min:8
            'phone_number' => 'nullable|integer|min:1',
            'address' => 'nullable|string',
            'accountNumber' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $vendor = Vendor::create($data);

        $userData = [
            'name' => $vendor->name,
            'email' => $vendor->email,
            'password' => $vendor->password,
            'address' => $vendor->address,
            'phone_number' => $vendor->phone_number,
            'card_number' => $vendor->accountNumber,
            'role' => 'vendor'
        ];

        User::create($userData);

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

    public function filter_hamburguer()
    {
        $vendors = Vendor::where('category', 'Hamburguer')->paginate(10);
        return view('vendors.index', compact('vendors'));
    }

    public function filter_pizza()
    {
        $vendors = Vendor::where('category', 'Pizza')->paginate(10);
        return view('vendors.index', compact('vendors'));
    }

    public function filter_asian()
    {
        $vendors = Vendor::where('category', 'Asian')->paginate(10);
        return view('vendors.index', compact('vendors'));
    }

    public function filter_mexican()
    {
        $vendors = Vendor::where('category', 'Mexican')->paginate(10);
        return view('vendors.index', compact('vendors'));
    }

    public function filter_sandwich()
    {
        $vendors = Vendor::where('category', 'Sandwich')->paginate(10);
        return view('vendors.index', compact('vendors'));
    }

    public function filter_rating()
    {
        $vendors = Vendor::withCount([
            'votes as average_rating' => function ($query) {
                $query->select(\DB::raw('coalesce(avg(rating),0)'));
            }
        ])->orderBy('average_rating', 'desc')->paginate(10);

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
        } else {
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
            } else {
                $basket[$productId]--;
            }
        }

        session(['basket' => $basket]);
        return redirect()->route('vendors.show', $vendorId);
    }

    public function rate(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);
        $user = Auth::user();

        if (VendorVote::where('user_id', $user->id)->where('vendor_id', $vendor->id)->exists()) {
            return redirect()->route('vendors.show', $vendor->id)->with('error', 'You have already rated this vendor.');
        }

        $rating = $request->input('rating');

        if ($rating >= 1 && $rating <= 5) {
            VendorVote::create([
                'user_id' => $user->id,
                'vendor_id' => $vendor->id,
                'rating' => $rating,
            ]);

            // Actualizar el promedio de la valoración
            $vendor->refresh();

            return redirect()->route('vendors.show', $vendor->id)->with('success', 'Thank you for your rating!');
        }

        return redirect()->route('vendors.show', $vendor->id)->with('error', 'Invalid rating value.');
    }

    public function uploadVendorImage(Request $request, $vendorId)
    {
        $vendor = Vendor::findOrFail($vendorId);

        $request->validate([
            'vendor_image' => 'required|image|mimes:jpg|max:2048',
        ], [
            'vendor_image.mimes' => 'Only .jpg files are allowed',
            'vendor_image.max' => 'The image size must be less than 2MB'
        ]);

        $fileName = $vendor->name . '.jpg';
        $destinationPath = public_path('images/vendors');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $request->file('vendor_image')->move($destinationPath, $fileName);

        return redirect()->route('vendors.show', $vendorId)->with('success', 'Vendor image uploaded successfully!');
    }

}

