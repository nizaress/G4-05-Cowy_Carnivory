@extends('layouts.app')

@section('content')
<form action="{{ url('/vendor/delete') }}" method="POST" style="display: flex; align-items: center;">
        @csrf
        <input type="number" name="vendor_id" min="1" step="1" required placeholder="Enter Vendor ID" style="flex: 1;">
        <button type="submit" style="margin-left: 10px;">Delete</button>
    </form>

    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif
    <br>
    <x-vendor-table :vendors="$vendors" />

    <style>
        .vendor-table table {
            width: 100%;
            border-collapse: collapse;
        }
        .vendor-table th, .vendor-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .vendor-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .vendor-table th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #4CAF50;
            color: white;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        /* Style the input field */
        input[type=number] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        /* Style the submit button */
        button[type=submit] {
            background-color: #7dd197;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        /* Change the submit button color on hover */
        button[type=submit]:hover {
            background-color: #45a049;
        }

    </style>
    
@endsection
