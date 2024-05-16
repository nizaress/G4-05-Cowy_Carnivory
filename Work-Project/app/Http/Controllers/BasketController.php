<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    public function index()
    {
        $basket = Session::get('basket', []);
        return view('basket.index', compact('basket'));
    }

    public function add(Request $request)
    {
        $item = $request->input('item');
        $quantity = $request->input('quantity', 1);

        $basket = Session::get('basket', []);
        if (isset($basket[$item])) {
            $basket[$item] += $quantity;
        } else {
            $basket[$item] = $quantity;
        }
        Session::put('basket', $basket);

        return redirect()->route('basket.index');
    }

    public function remove(Request $request)
    {
        $item = $request->input('item');

        $basket = Session::get('basket', []);
        if (isset($basket[$item])) {
            unset($basket[$item]);
        }
        Session::put('basket', $basket);

        return redirect()->route('basket.index');
    }

    public function increment(Request $request)
    {
        $item = $request->input('item');

        $basket = Session::get('basket', []);
        if (isset($basket[$item])) {
            $basket[$item]++;
        }
        Session::put('basket', $basket);

        return redirect()->route('basket.index');
    }

    public function decrement(Request $request)
    {
        $item = $request->input('item');

        $basket = Session::get('basket', []);
        if (isset($basket[$item]) && $basket[$item] > 1) {
            $basket[$item]--;
        } elseif (isset($basket[$item]) && $basket[$item] == 1) {
            unset($basket[$item]);
        }
        Session::put('basket', $basket);

        return redirect()->route('basket.index');
    }
}

