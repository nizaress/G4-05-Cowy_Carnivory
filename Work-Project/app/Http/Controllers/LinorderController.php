<?php

namespace App\Http\Controllers;

use App\Models\Lineorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LinorderController extends Controller
{
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', 'none');

        if (!in_array($sortOrder, ['asc', 'desc', 'none'])) {
            $sortOrder = 'none';
        }

        $query = Lineorder::query();

        if ($sortOrder == 'asc') {
            $query->orderBy('product_name', 'asc');
        } elseif ($sortOrder == 'desc') {
            $query->orderBy('product_name', 'desc');
        } else {
            $query->getQuery()->orders = [];
        }

        $linorders = $query->paginate(15);

        $linorders->appends(['sort' => $sortOrder]);

        return view('linorders', [
            'linorders' => $linorders,
            'sortOrder' => $sortOrder,
        ]);
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
