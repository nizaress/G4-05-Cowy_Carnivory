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
            color: #014E7A;
            font-family: 'Verdana', sans-serif;  
            <!--background-color: #120903;-->
        }

        .nav {
            display: flex;
            align-items: center;
            width: 100%;
            margin: 0; 
            background-color: #e6e6fa;
        }

        .navbar {
            display: flex;
            align-items: center;
            list-style: none;
            padding: 16px;
            margin: 0; 
        }

        .navbar li {
            margin-right: 20px; 
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

        .btn-logout {
            font-family: 'Verdana', sans-serif;
            font-size: 14px;
            float: right;
            margin-left: 550px;
            background-color: rgba(255, 255, 255, 0.3);
            color: #014E7A;
            padding: 7px 16px;
            border: 1px solid rgba(1, 80, 160, 0.3);
            border-radius: 5px;
        }

        .btn-logout:hover {
            float: right;
            background-color: rgba(1, 80, 160, 0.3);
            color: #014E7A;
            border: 1px solid #014E7A;
        }

        .btn-logout:active {
            float: right;
            background-color: rgba(1, 80, 160, 0.3);
            color: #014E7A;
            border: 1px solid #014E7A;
            transform: translateY(4px);
        }

        .btn-profile {
            position: relative;
            font-family: 'Verdana', sans-serif;
            font-size: 16px;
            font-weight: bold;
            background-color: #014E7A;
            color: white;
            padding: 7px 16px;
            margin-left: 20px;
            border: none;
            border-radius: 5px;
        }

        .btn-profile:hover {
            float: left;
            background-color: #FFFFFF;
            color: #014E7A;
        }

        .btn-profile:active {
            float: left;
            background-color: #014E7A;
            color: white;
            transform: translateY(4px);
        }
    </style>
</head>
<body>
    <header>

    </header>
    
    <div class= "nav">
    <ul class="navbar">
        <li><a class="bold" href="/">Home</a></li>
        <li><a href="/vendor">Vendors</a></li>
        <li><a href="/product">Products</a></li>
        <li><a href="/customer">Customers</a></li>
        <li><a href="/order">Orders</a></li>
        <li><a href="/linorder">Linorders</a></li>
        </ul>

        <form method="GET" action="{{ url('/login') }}">
            @csrf
            <button class="btn-logout" type="submit" type="button">Log Out</button>
        </form>
        <form method="GET" action="{{ url('/login') }}">
            @csrf
            <button class="btn-profile" type="submit" type="button">Profile</button>
        </form>
    </div>

    <footer>

    </footer>
</body>
</html>