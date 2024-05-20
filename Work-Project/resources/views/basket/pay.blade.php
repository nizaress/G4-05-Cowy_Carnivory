@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Payment</h1>
        <form action="{{ route('basket.index') }}" method="GET" class="mr-1">
            @csrf
            <input type="hidden" name="vendor_id" value="{{ $vendorId }}">
            <button type="submit" class="btn btn-primary">Back to Basket</button>
        </form>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Total Price: ${{ number_format($totalPrice, 2) }}</h5>
            <form action="{{ route('basket.completePayment') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" class="form-control" value="{{ old('city') }}" required>
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" id="postal_code" name="postal_code" class="form-control" value="{{ old('postal_code') }}" required>
                </div>
                <div class="form-group">
                    <label for="card_number">Card Number</label>
                    <input type="text" id="card_number" name="card_number" class="form-control" value="{{ old('card_number') }}" required>
                </div>
                <div class="form-group">
                    <label for="expiry_date">Expiry Date (MM/YY)</label>
                    <input type="text" id="expiry_date" name="expiry_date" class="form-control" value="{{ old('expiry_date') }}" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" class="form-control" value="{{ old('cvv') }}" required>
                </div>
                <button type="submit" class="btn btn-success">Complete Payment</button>
            </form>
        </div>
    </div>
</div>
@endsection
