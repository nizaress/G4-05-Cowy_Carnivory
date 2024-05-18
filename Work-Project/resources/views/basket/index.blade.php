<!-- resources/views/basket/index.blade.php -->
@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex" style="vertical-align">
            <img src="{{ asset('/basket.png') }}" alt="Logo" style="width: 70px; height:45px">
            <h1>Your Basket</h1>
        </div>
        <a href="/product" class="btn btn-primary">Go Back</a>
    </div>
    
    @if(empty($basket))
        <div class="alert alert-info">Your basket is empty.</div>
    @else
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Items in your basket</h5>
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <span><b style="font-size: 15pt">{{ $product->name }}</b></span>
                                <div>
                                    <span class="ml-3">Price: {{ $product->price }}€</span>
                                    <span class="ml-3">Quantity: {{ $basket[$product->id] }}</span>
                                </div>
                            </div>
                            <div class="btn-group ml-3" role="group">
                                <form action="{{ route('basket.increment') }}" method="POST" class="mr-1">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-secondary btn-sm"><b>+</b></button>
                                </form>
                                <form action="{{ route('basket.decrement') }}" method="POST" class="mr-3">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-secondary btn-sm"><b>-</b></button>
                                </form>
                                <form action="{{ route('basket.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="text-right mb-4">
            <h5>Total Price: {{ number_format($totalPrice, 2) }}€</h5>
            <a href="{{ route('basket.pay') }}" class="btn btn-success">Pay</a>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Item</h5>
            <form action="{{ route('basket.add') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="product_id">Product ID</label>
                    <input type="number" id="product_id" name="product_id" class="form-control" required>
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
