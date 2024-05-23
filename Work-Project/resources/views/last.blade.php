<!-- resources/views/orders/pending.blade.php -->
@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Last Orders</h1>
        <a href="/home" class="btn btn-primary">Go Back</a>
    </div>
    
    @if(empty($ordersWithVendorNames))
        <div class="alert alert-info">You have no pending orders.</div>
    @else
        @foreach($ordersWithVendorNames as $orderData)
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title"><b>{{ $orderData['lineorders'][0]['vendor_name'] }} Order</b></h4>
                    <p><strong>Date:</strong> {{ $orderData['order']->Date }}</p>
                    <p><strong>Delivery Time:</strong> {{ $orderData['order']->deliveryTime }}</p>
                    <p><strong>Payment Method:</strong> {{ $orderData['order']->PaymentMethod }}</p>
                    <p><strong>Total Price:</strong> ${{ $orderData['order']->lineorders->sum('product_price') }}</p>
                    <ul class="list-group mt-3">
                        @foreach($orderData['lineorders'] as $lineorder)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span><b style="font-size: 15pt">{{ $lineorder['product_name'] }}</b></span>
                                    <div>
                                        <span class="ml-3">Price: ${{ $lineorder['product_price'] }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
