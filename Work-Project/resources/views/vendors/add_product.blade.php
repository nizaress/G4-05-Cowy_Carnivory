@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add a New Product</h2>
    <form action="{{ url('/vendors/' . $vendor->id . '/add-a-product') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="cod">Code:</label>
            <input type="number" name="cod" id="cod" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-secondary" onclick="if(confirm('Are you sure to cancel the creation of the new product?')) window.location='{{ url('/vendors/' . $vendor->id) }}'">Cancel</button>
    </form>
</div>
@endsection
