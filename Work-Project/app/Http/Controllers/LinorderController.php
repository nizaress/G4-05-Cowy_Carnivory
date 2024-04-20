<?php

namespace App\Http\Controllers;

use App\Models\Lineorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LinorderController extends Controller
{
    public function index()
    {
        $linorders = Lineorder::all();

        return view('linorders', ['linorders' => $linorders]);
    }

    public function delete(Request $request)
    {
        $validatedData = $request->validate([
            'linorder_id' => 'required|integer|min:1'
        ], [
            'linorder_id.required' => 'A number must be entered',
            'linorder_id.integer' => 'Only integer numbers are allowed to be entered',
            'linorder_id.min' => 'Only positive integer numbers are allowed'
        ]);

        $linorder = Lineorder::find($validatedData['linorder_id']);
        if (!$linorder) {
            return redirect('/linorder')->with('error', 'Lineorder not found');
        }

        $linorder->delete();
        return redirect('/linorder')->with('status', 'Lineorder deleted successfully!');
    }
}
