<!-- resources/views/list/customers.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listings</title>
        <style>
            .black-background {
                background-color: #36393f;
                color: black;
                margin: 0;
                padding: 0;
            }
            .content {
                font-size: 13px;
                font-family: Arial, sans-serif;
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }

            .title-container {
                text-align: center;
                margin-top: 50px;
            }

            .styled-title {
                color: #ddd;
                font-size: 36px;
                font-weight: bold;
                text-transform: uppercase;
                letter-spacing: 2px;
                margin-bottom: 20px;
                text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
            }

            .styled-list {
                list-style: none;
                padding: 0;
            }

            .styled-list li {
                background-color: #f2f2f2;
                padding: 10px;
                margin-bottom: 5px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .styled-list li:hover {
                background-color: #e0e0e0;
                cursor: pointer;
            }

            .button-container {
                display: flex;
                justify-content: center;
                margin: 30px;
            }

            .button {
                display: inline-block;
                padding: 10px 20px;
                font-size: 16px;
                text-decoration: none;
                color: #ffffff;
                background-color: #007bff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin: 0 5px;
            }

            .button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body class="black-background">
        <div class="content">
            <div class="title-container">
                <h1 class=styled-title>Show listings</h1>
                <div class="button-container">
                    <a href="{{ route('list.products') }}" class="button">Products</a>
                    <a href="{{ route('list.vendors') }}" class="button">Vendors</a>
                    <a href="{{ route('list.customers') }}" class="button">Customers</a>
                    <a href="{{ route('list.orders') }}" class="button">Orders</a>
                    <a href="{{ route('list.linorders') }}" class="button">Order lines</a>
                </div>
            </div>

            <ul class="styled-list">
                @foreach($customers as $customer)
                    <li><b>{{ $customer->name }}</b>  <b>-</b>  {{ $customer->email }}  <b>-</b>  {{ $customer->password }}  <b>-</b>  {{ $customer->phone_number }}  <b>-</b>  {{ $customer->address }}  <b>-</b>  {{ $customer->card_number }}</li>
                @endforeach
            </ul>
        </div>
    </body>
</html>