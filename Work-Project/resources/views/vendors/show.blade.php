<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Cowy Carnivory</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #fafcff;
            font-family: 'Verdana', sans-serif;  
            <!--background-color: #120903;-->
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
        .main-content {
            display: flex;
            margin-top: 40px;
            gap: 30px; /* Espacio entre columnas */
        }
        .products-column {
            flex: 3; /* La columna de productos tomará 2/3 del espacio */
        }
        .total-column {
            margin-top: 40px;
            flex: 1; /* La columna del total tomará 1/3 del espacio */
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
            position: relative; /* Añadido para el posicionamiento absoluto */
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
            position: absolute; /* Posicionamiento absoluto */
            bottom: 15px; /* Espaciado desde la parte inferior */
            right: 15px; /* Espaciado desde la parte derecha */
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
            top: 20px; /* Hace que el contenedor sea pegajoso y se quede en la parte superior */
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
            margin-bottom: 10px; /* Espaciado entre el total y el botón */
        }
        .total-price {
            font-size: 1.5em;
            color: #07080c;
            margin-bottom: 10px; /* Espaciado entre el total y el botón */
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
    </style>
</head>
<body>
    <header></header>

    @auth
    @if (Auth::user()->role == 'customer')
        @include('layouts.nbcustomer')
    @endif
    @endauth

    @guest
        @include('layouts.nbguest')
    @endguest

    <div class="container">
        <div class="vendor-info">
            <img src="/images/vendors/{{ $vendor->name }}.jpg" alt="{{ $vendor->name }}">
            <div class="vendor-details">
                <h1>{{ $vendor->name }}</h1>
                <br>
                <p>{{ $vendor->address }}</p>
                <p>{{ $vendor->email }}</p>
                <p>{{ $vendor->phone_number }}</p>
            </div>
        </div>
        
        <div class="main-content">
            <div class="products-column">
                <div class="products">
                    <div class="products-title">Products</div>
                    @foreach ($vendor->products as $product)
                        <div class="product" data-price="{{ $product->price }}">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            <div class="product-details">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                <p><span class="product-price">{{ $product->price }}€</span></p>
                                <div class="quantity-controls">
                                    <button class="decrease">-</button>
                                    <span class="quantity">0</span>
                                    <button class="increase">+</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="total-column">
                <div class="fixed-bottom-container">
                    <div class="total-container">
                        <span class="total-price"><span id="total">0.00€</span></span>
                    </div>
                    <a href="#" class="order-button">Go to order</a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
