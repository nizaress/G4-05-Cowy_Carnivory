<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Cowy Carnivory</title>
        <style>

            .navbar {
                display: flex;
                align-items: center;
                list-style: none;
                padding: 16px;
                margin: 0; 
                background-color: #e6e6fa;
            }

            .navbar li {
                margin-right: 20px; /* Espaciado entre los elementos del menú */
            }

            .navbar a {
                text-decoration: none;
                color: #014E7A;
                padding: 8px 16px;
                font-size: 16px; 
            }

            .navbar a.bold {
                font-weight: bold; 
            }

            table {
                font-family: "Helvetica", Arial, sans-serif;
                font-size: 15px;
                width: 100%;
                border-collapse: collapse;
                text-align: center;
                vertical-align: middle;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                border-bottom: 1px solid #ddd;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            th {
                padding-top: 12px;
                padding-bottom: 12px;
                background-color: #4CAF50;
                color: white;
                border-bottom: 2px solid #ddd;
            }

            form {
                max-width: 400px;
                margin: 0 auto;
                text-align: center;
            }

            input[type=number], input[type=text] {
                width: 100%;
                padding: 10px;
                border: 2px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
                font-size: 15px;
            }

            button{
                background-color: #4bb350;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            button:hover {
                background-color: #31814a;
            }

            button[type=submit] {
                background-color: #4bb350;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            button[type=submit]:hover {
                background-color: #31814a;
            }
        </style>
    </head>
    <body>
        <header>
        </header>

        <ul class="navbar" style="margin: 0; padding: 10; height: 100%; color: #014E7A; font-family: 'Verdana', sans-serif;">
            <li><a href="/" class="bold">Home</a></li>
            <li><a href="/vendor"> Vendors </a></li>
            <li><a href="/product">Products</a></li>
            <li><a href="/customer">Customers</a></li>
            <li><a>Orders</a></li>
            <li><a href="/linorder">Linorders</a></li> 
        </ul>

        <br>

        <div style="display: flex; justify-content: space-between; margin-top: 1%; margin-bottom: 1%; margin-left: 6%;margin-right: 6%;">
            <form action="{{ url('/order/delete') }}" method="POST" style="display: flex; align-items: center; margin-left: 0%;">
                @csrf
                <input type="number" name="order_id" min="1" step="1" required placeholder="Enter Order ID" style="flex: 1;">
                <button type="submit" style="margin-left: 10px;">Delete</button>
            </form>
            <div style="display: flex; align-items: center; margin-right: 6%; margin-left: 2%; flex-wrap: nowrap;">
                <h4 style="margin-right: 10px; font-family: Arial, sans-serif; color: rgb(116, 116, 116); white-space: nowrap;">Sort by:</h4>
                <form action="{{ url('/order') }}" method="GET" style="margin-left: 0; margin-right: 4%;">
                    <select name="sort" onchange="this.form.submit()" style="padding: 13px; border-radius: 5px; background-color: white; border: 2px solid #ccc;">
                        <option value="none" {{ request('sort') == 'none' ? 'selected' : '' }}>None</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Smallest Order Number</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Biggest Order Number</option>
                    </select>
                </form>
            </div>
        </div>

        @if (session('error'))
            <div style="color: red;">
                {{ session('error') }}
            </div>
        @endif

        <div style="margin-left: 1%; margin-right: 1%; margin-bottom: 1%;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order</th>
                        <th>Date</th>
                        <th>Delivery Time</th>
                        <th>Pay Method</th>
                        <th>Customer ID</th>
                        <th>Customer Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td><b>{{ $order->id }}</b></td>
                            <td>{{ $order->numOrder }}</td>
                            <td>{{ $order->Date }}</td>
                            <td>{{ $order->deliveryTime }}</td>
                            <td>{{ $order->PaymentMethod }}</td>
                            <td>{{ $order->customer_id }}</td>
                            <td>{{ $order->customer_email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>

        <footer></footer>
    </body>
</html>
