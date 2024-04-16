<?php

namespace App\Http\Controllers;

use App\Models\Lineorder;

use Illuminate\Http\Request;

class LinorderController extends Controller
{
    public function index()
    {
        $linorders = Lineorder::all();

        return view('list.linorders', compact('linorders'));
    }
}
