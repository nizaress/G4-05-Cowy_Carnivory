<!-- resources/views/basket/index.blade.php -->
@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Your Basket</h1>
        <a href="/product" class="btn btn-primary">Go Back</a>
    </div>
    
    @if(empty($basket))
        <div class="alert alert-info">Your basket is empty.</div>
    @else
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Items in your basket</h5>
                <ul class="list-group">
                    @foreach($basket as $item => $quantity)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <span>{{ $item }}</span>
                                <span class="ml-3">Quantity: {{ $quantity }}</span>
                            </div>
                            <div class="btn-group ml-3" role="group">
                                <form action="{{ route('basket.increment') }}" method="POST" class="mr-1">
                                    @csrf
                                    <input type="hidden" name="item" value="{{ $item }}">
                                    <button type="submit" class="btn btn-secondary btn-sm"><b>+</b></button>
                                </form>
                                <form action="{{ route('basket.decrement') }}" method="POST" class="mr-3">
                                    @csrf
                                    <input type="hidden" name="item" value="{{ $item }}">
                                    <button type="submit" class="btn btn-secondary btn-sm"><b>-</b></button>
                                </form>
                                <form action="{{ route('basket.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="item" value="{{ $item }}">
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="text-left mb-4">
            <button class="btn btn-success">Pay</button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Item</h5>
            <form action="{{ route('basket.add') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="item">Item</label>
                    <input type="text" id="item" name="item" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" required>
                </div>
                <button type="submit" class="btn btn-primary">Add to Basket</button>
            </form>
        </div>
    </div>
</div>
@endsection
