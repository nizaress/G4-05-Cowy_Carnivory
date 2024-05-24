<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Cowy Carnivory</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #fafcff;
            font-family: 'Verdana', sans-serif;
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 20px;
            background-color: #fafcff;
        }

        .vendor-info {
            display: flex;
            align-items: center;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .vendor-info img {
            width: 250px;
            height: 250px;
            object-fit: cover;
            margin-right: 20px;
            border-radius: 8px;
        }

        .vendor-details {
            flex-grow: 1;
        }

        .vendor-details h1 {
            margin: 0;
            font-size: 2em;
            color: #411acc;
        }

        .vendor-details p {
            margin: 5px 0;
            color: #444956
        }

        .vendor-name {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-right: 20px;
        }

        .main-content {
            display: flex;
            margin-top: 40px;
            gap: 30px;
        }

        .products-column {
            flex: 3;
        }

        .total-column {
            margin-top: 40px;
            flex: 1;
        }

        .products-title {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: #07080c;
        }

        .products {
            border-radius: 8px;
        }

        .product {
            position: relative;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #fafcff;
            display: flex;
            align-items: center;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
            border-radius: 8px;
        }

        .product-details {
            flex-grow: 1;
        }

        .product-details h3 {
            margin: 0 0 10px;
            font-size: 1.2em;
            color: #411acc;
        }

        .product-details p {
            margin: 5px 0;
            color: #444956;
        }

        .quantity-controls {
            position: absolute;
            bottom: 15px;
            right: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
            color: #444956;
        }

        .quantity-controls button {
            width: 30px;
            height: 30px;
            border: none;
            background-color: #767ede;
            color: #fafcff;
            font-size: 1.2em;
            cursor: pointer;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-controls button:hover {
            background-color: rgba(65, 26, 204, 1);
        }

        .quantity-controls button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background-color: #dbdfec;
            color: #fafcff;
        }

        .quantity-controls span {
            font-size: 1.2em;
        }

        .fixed-bottom-container {
            position: sticky;
            top: 20px;
            background-color: #fafcff;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
            border-top: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .total-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .total-price {
            font-size: 1.5em;
            color: #07080c;
            margin-bottom: 10px;
        }

        .order-button {
            padding: 10px 20px;
            border: none;
            background-color: #411acc;
            color: #fafcff;
            font-size: 1em;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
        }

        .order-button:hover {
            background-color: #07080c;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: right;
            margin-right: 20px;
            align-items: center;

        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 2.4em;
            color: #dbdfec;
            cursor: pointer;
        }

        .star-rating label:before {
            content: '★';
        }

        .star-rating input[type="radio"]:checked~label {
            color: #411acc;
        }

        .star-rating input[type="radio"]:checked+label {
            color: #411acc;
        }

        .star-rating input[type="radio"]:not(:checked)+label:hover,
        .star-rating input[type="radio"]:not(:checked)+label:hover~label {
            color: #411acc;
        }

        .star-rating input[type="radio"]:checked+label:hover,
        .star-rating input[type="radio"]:checked+label:hover~label,
        .star-rating input[type="radio"]:checked~label:hover,
        .star-rating input[type="radio"]:checked~label:hover~label {
            color: #411acc;
        }

        .rate-button {
            padding: 8px 15px;
            margin-left: 20px;
            margin-top: 5px;
            height: 80%;
            border: 1px solid #07080c;
            background-color: #07080c;
            color: #fafcff;
            font-size: 1em;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
        }

        .rate-button:hover {
            border: 1px solid #07080c;
            background-color: #fafcff;
            color: #07080c;
        }

        .edit-buttons {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 5px;
        }

        .edit-buttons a img {
            width: 24px;
            height: 24px;
        }

        .add-product-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            /* Add some gap between the div and the button */
        }

        .add-product-button {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-product-button:hover {
            background-color: #333;
        }

        .add-product-button:active {
            transform: translateY(2px);
        }
    </style>
</head>

<body>
    <header></header>

    @auth
        @if (Auth::user()->role == 'customer')
            @include('layouts.nbcustomer')
        @elseif (Auth::user()->role == 'vendor')
            @include('layouts.nbvendor')
        @endif
    @endauth

    @guest
        @include('layouts.nbguest')
    @endguest

    <div class="container">
        <div class="vendor-info">
            <img src="/images/vendors/{{ $vendor->name }}.jpg" alt="{{ $vendor->name }}">
            <div class="vendor-details">
                <div class="vendor-name">
                    <h1>{{ $vendor->name }}</h1>
                    <div style="display:flex;align-items:center">
                        <p>{{ number_format($vendor->average_rating, 1) }}</p>
                        <i class="fas fa-star" style="font-size:1.5em;margin-left:13px"></i>
                    </div>
                </div>
                <br>
                <p>{{ $vendor->address }}</p>
                <p>{{ $vendor->email }}</p>
                <p>{{ $vendor->phone_number }}</p>
                @auth 
                    @if(!\App\Models\VendorVote::where('user_id', Auth::id())->where('vendor_id', $vendor->id)->exists())
                        <form action="{{ route('vendor.rate', $vendor->id) }}" method="POST">
                            @csrf
                            <div class="star-rating">
                                <button class="rate-button" type="submit">Rate</button>
                                <input type="radio" id="5-stars" name="rating" value="5">
                                <label for="5-stars" class="star"></label>
                                <input type="radio" id="4-stars" name="rating" value="4">
                                <label for="4-stars" class="star"></label>
                                <input type="radio" id="3-stars" name="rating" value="3">
                                <label for="3-stars" class="star"></label>
                                <input type="radio" id="2-stars" name="rating" value="2">
                                <label for="2-stars" class="star"></label>
                                <input type="radio" id="1-star" name="rating" value="1">
                                <label for="1-star" class="star"></label>
                            </div>
                        </form>
                    @else
                        <div class="star-rating">
                            <p style="padding:11px">You have already rated this vendor.</p>
                        </div>
                    @endif
                @endauth
                @guest 
                    <form action="{{ url('/login') }}" method="GET">
                        @csrf
                        <div class="star-rating">
                            <button class="rate-button" type="submit">Rate</button>
                            <input type="radio" id="5-stars" name="rating" value="5">
                            <label for="5-stars" class="star"></label>
                            <input type="radio" id="4-stars" name="rating" value="4">
                            <label for="4-stars" class="star"></label>
                            <input type="radio" id="3-stars" name="rating" value="3">
                            <label for="3-stars" class="star"></label>
                            <input type="radio" id="2-stars" name="rating" value="2">
                            <label for="2-stars" class="star"></label>
                            <input type="radio" id="1-star" name="rating" value="1">
                            <label for="1-star" class="star"></label>
                        </div>
                    </form>
                @endguest
            </div>
        </div>

        @if (Auth::check() && Auth::user()->role == 'vendor')
            <div class="add-product-container">
                <button class="add-product-button"
                    onclick="window.location.href='{{ url("/vendors/$vendor->id/add-a-product") }}'">Add a Product</button>
            </div>
        @endif

        <div class="main-content">
            <div class="products-column">
                <div class="products">
                    <div class="products-title">Starters</div>
                    @foreach ($vendor->products->where('category', 'Starter') as $product)
                        <div class="product" data-price="{{ $product->price }}">
                        <img src="{{ asset('images/products/vendor_' . $vendor->id . '/product_' . $product->id . '.png') }}" alt="{{ $product->name }}">
                            <div class="product-details">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                <p><span class="product-price">{{ $product->price }}€</span></p>
                                @if (Auth::check() && Auth::user()->role == 'vendor')
                                    <div class="edit-buttons">
                                        <a href="{{ url('/vendors/' . $vendor->id . '/edit-product/' . $product->id) }}">
                                            <img src="{{ asset('images/products/edit-button.png') }}" alt="Edit">
                                        </a>

                                        <a href="#">
                                            <img src="{{ asset('images/products/upload-image-button.png') }}"
                                                alt="Upload Image">
                                        </a>
                                        <a href="#" class="delete-button" data-product-id="{{ $product->id }}">
                                            <img src="{{ asset('images/products/delete-button.jpg') }}" alt="Delete">
                                        </a>
                                    </div>
                                @endif

                                @if (!Auth::check() || Auth::user()->role == 'customer')
                                    <div class="quantity-controls">
                                        <form action="{{ route('vendor.decrement') }}" method="POST" class="mr-1">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                                            <button class="decrease" type="submit">-</button>
                                        </form>
                                        @if (isset($basket[$product->id]))
                                            <span class="quantity">{{ $basket[$product->id] }}</span>
                                        @else
                                            <span class="quantity">0</span>
                                        @endif
                                        <form action="{{ route('vendor.increment') }}" method="POST" class="mr-1">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                                            <button type="submit" class="increase">+</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <br>

                <div class="products">
                    <div class="products-title">Main Courses</div>
                    @foreach ($vendor->products->where('category', 'Main Course') as $product)
                        <div class="product" data-price="{{ $product->price }}">
                        <img src="{{ asset('images/products/vendor_' . $vendor->id . '/product_' . $product->id . '.png') }}" alt="{{ $product->name }}">
                            <div class="product-details">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                <p><span class="product-price">{{ $product->price }}€</span></p>
                                @if (Auth::check() && Auth::user()->role == 'vendor')
                                    <div class="edit-buttons">
                                        <a href="{{ url('/vendors/' . $vendor->id . '/edit-product/' . $product->id) }}">
                                            <img src="{{ asset('images/products/edit-button.png') }}" alt="Edit">
                                        </a>

                                        <a href="#">
                                            <img src="{{ asset('images/products/upload-image-button.png') }}"
                                                alt="Upload Image">
                                        </a>
                                        <a href="#" class="delete-button" data-product-id="{{ $product->id }}">
                                            <img src="{{ asset('images/products/delete-button.jpg') }}" alt="Delete">
                                        </a>
                                    </div>
                                @endif

                                @if (!Auth::check() || Auth::user()->role == 'customer')
                                    <div class="quantity-controls">
                                        <form action="{{ route('vendor.decrement') }}" method="POST" class="mr-1">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                                            <button class="decrease" type="submit">-</button>
                                        </form>
                                        @if (isset($basket[$product->id]))
                                            <span class="quantity">{{ $basket[$product->id] }}</span>
                                        @else
                                            <span class="quantity">0</span>
                                        @endif
                                        <form action="{{ route('vendor.increment') }}" method="POST" class="mr-1">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                                            <button type="submit" class="increase">+</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="products">
                    <div class="products-title">Desserts</div>
                    @foreach ($vendor->products->where('category', 'Dessert') as $product)
                        <div class="product" data-price="{{ $product->price }}">
                        <img src="{{ asset('images/products/vendor_' . $vendor->id . '/product_' . $product->id . '.png') }}" alt="{{ $product->name }}">
                            <div class="product-details">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                <p><span class="product-price">{{ $product->price }}€</span></p>
                                @if (Auth::check() && Auth::user()->role == 'vendor')
                                    <div class="edit-buttons">
                                        <a href="{{ url('/vendors/' . $vendor->id . '/edit-product/' . $product->id) }}">
                                            <img src="{{ asset('images/products/edit-button.png') }}" alt="Edit">
                                        </a>

                                        <a href="#">
                                            <img src="{{ asset('images/products/upload-image-button.png') }}"
                                                alt="Upload Image">
                                        </a>
                                        <a href="#" class="delete-button" data-product-id="{{ $product->id }}">
                                            <img src="{{ asset('images/products/delete-button.jpg') }}" alt="Delete">
                                        </a>
                                    </div>
                                @endif

                                @if (!Auth::check() || Auth::user()->role == 'customer')
                                    <div class="quantity-controls">
                                        <form action="{{ route('vendor.decrement') }}" method="POST" class="mr-1">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                                            <button class="decrease" type="submit">-</button>
                                        </form>
                                        @if (isset($basket[$product->id]))
                                            <span class="quantity">{{ $basket[$product->id] }}</span>
                                        @else
                                            <span class="quantity">0</span>
                                        @endif
                                        <form action="{{ route('vendor.increment') }}" method="POST" class="mr-1">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                                            <button type="submit" class="increase">+</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if (!Auth::check() || Auth::user()->role == 'customer')
                <div class="total-column">
                    <div class="fixed-bottom-container">
                        <div class="total-container">
                            <span class="total-price"><span id="total">{{ number_format($totalPrice, 2) }}€</span></span>
                        </div>
                        <form action="{{ route('basket.index') }}" method="GET" class="mr-1">
                            @csrf
                            <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                            <button type="submit" class="order-button">Go to order</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    if (confirm('Are you sure you want to delete this product?')) {
                        const productId = this.dataset.productId;
                        fetch(`/products/${productId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Remove the product element from the DOM
                                    this.closest('.product').remove();
                                } else {
                                    alert('An error occurred while deleting the product.');
                                }
                            });
                    }
                });
            });
        });
    </script>
</body>

</html>