<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Cowy Carnivory</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            color: #040507;
            font-family: 'Verdana', sans-serif;
            background-color: #fafcff;
        }

        table {
            font-family: "Helvetica", Arial, sans-serif;
            font-size: 15px;
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            vertical-align: middle;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #F3F6FF;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #D5DFF7;
        }
        th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #8390FA;
            color: white;
            border-bottom: 2px solid #ddd;
        }

        .frm {
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        .imp {
            width: 100%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 15px;
        }

        .btn {
            background-color: #8390FA;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #040507;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0px 20px 20px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .sidebar-and-content {
            display: flex;
            flex-direction: row;
            width: 100%;
        }
        .sidebar {
            width: 25%;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 8px;
        }
        .content {
            width: 75%;
            padding: 20px;
            box-sizing: border-box;
        }

        .filter-title, .vendor-title, .sort-title, .search-title {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: #07080c;
            font-weight: bold;
        }
        .vendor {
            border: 1px solid #dbdfec;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #fafcff;
            display: flex;
            align-items: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        .vendor img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-right: 20px;
            border-radius: 8px;
        }
        .vendor-details {
            flex-grow: 1;
        }
        .vendor-details h3 {
            margin: 0 0 10px;
            font-size: 1.5em;
            text-decoration: none;
            color: #411acc;
        }

        .vendor-details a {
            text-decoration: none;
            color: #411acc;
        }
        .vendor-details p {
            margin: 5px 0;
            color: #444956;
        }
        .filters, .sort-options, .search-form {
            margin-bottom: 20px;
        }
        .filters p, .sort-options p, .search-form p {
            margin: 10px 0;
        }
        .filters a, .sort-options a {
            display: flex;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #dbdfec;
            border-radius: 8px;
            text-decoration: none;
            color: #444956;
            transition: background-color 0.3s, color 0.3s;
            background-color: #fafcff;
        }
        .filters a:hover, .sort-options a:hover {
            background-color: #411acc;
            color: #fafcff;
        }
        .filters a i, .sort-options a i {
            margin-right: 10px;
            font-size: 1.2em;
        }

        .search-form {
            width: 90%;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            border-radius: 0px 0px 120px 120px;
            background-color: #07080c;
            padding: 20px;
        }
        .search-input {
            width: 400px;
            height: 35px;
            padding: 10px;
            border: 0px;
            background-color: #fafcff;
            color: #07080c;
            border-radius: 50px 0 0 50px;
        }
        .search-button {
            padding: 10px 20px;
            height: 55px;
            background-color: #411acc;
            color: #fafcff;
            border: 0px;
            border-radius: 0 50px 50px 0;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .search-button i {
            font-size: 1.2em;
        }
        .search-button:hover {
            background-color: #fafcff;
            color: #07080c;
        }
    </style>
</head>

<body>
    <header>
    </header>
    
    @auth

    <h1 style="text-align: center; font-family: Arial, sans-serif; color: rgb(116, 116, 116);">Vendors</h1>

    @if (Auth::user()->role == 'admin')
    {
        @include('layouts.nbadmin')
        <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 1%; margin-bottom: 1%;">
            <form class="frm" action="{{ url('/vendor/delete') }}" method="POST" style="display: flex; align-items: center; margin-left: 6%;">
                @csrf
                <input type="number" class="imp" name="vendor_id" min="1" step="1" required placeholder="Enter Vendor ID" style="flex: 1;">
                <button class="btn" type="submit" style="margin-left: 10px;">Delete</button>
            </form>
            <form class="frm" method="GET" style="margin-right: 5%; margin-left: 4%;" action="{{ url('/vendor/create') }}">
                @csrf
                <button class="btn" type="submit" type="button">Add a Vendor</button>
            </form>
            <div style="display: flex; align-items: center; margin-right: 6%; margin-left: 2%; flex-wrap: nowrap;">
                <h4 style="margin-right: 10px; font-family: Arial, sans-serif; color: rgb(116, 116, 116); white-space: nowrap;">Sort by:</h4>
                <form class="frm" action="{{ url('/vendor') }}" method="GET" style="margin-left: 0; margin-right: 4%;">
                    <select name="sort" onchange="this.form.submit()" style="padding: 13px; border-radius: 5px; background-color: white; border: 2px solid #ccc;">
                        <option value="none" {{ request('sort') == 'none' ? 'selected' : '' }}>None</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Alphabetical Order</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Reversed Alphabetical Order</option>
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
                        <th>Email</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Account Number</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendors as $vendor)
                        <tr>
                            <td><b>{{ $vendor->id }}</b></td>
                            <td>{{ $vendor->email }}</td>
                            <td>{{ $vendor->name }}</td>
                            <td>
                                <form class="frm" action="{{ url('/vendor/update/'.$vendor->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" class="imp" name="phone_number" value="{{ $vendor->phone_number }}" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>
                                <form class="frm" action="{{ url('/vendor/update/'.$vendor->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" class="imp" name="address" value="{{ $vendor->address }}" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>
                                <form class="frm" action="{{ url('/vendor/update/'.$vendor->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" class="imp" name="accountNumber" value="{{ $vendor->accountNumber }}" onchange="this.form.submit()">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $vendors->appends(['sort' => $sortOrder])->links() }}
        </div>
    }
    @elseif (Auth::user()->role == 'customer')
    {
        @include('layouts.nbcustomer')
        <div class="container">
            <div class="search-form">
                <form method="GET" action="{{ route('vendors.search')}}" style="display: flex; align-items: center;">
                    <input type="text" name="search" class="search-input" placeholder="  Search our restaurants..." value="{{ request('search') }}">
                    <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="sidebar-and-content">
                <div class="sidebar">
                    <div class="sort-title">Sort By</div>
                    <div class="sort-options">
                        <a href="{{ route('vendors.sortaz')}}" ><i class="fa-solid fa-arrow-down-a-z"></i> Alphabetical order</a>
                        <a href="{{ route('vendors.sortza')}}"><i class="fa-solid fa-arrow-down-z-a"></i> Reverse Alphabetical order</a>
                        <a href="?sort=delivery_fee"><i class="fas fa-star"></i> Ratings</a>
                    </div>

                    <div class="filter-title">Filters</div>
                    <div class="filters">
                        <a href="?filter=americana"><i class="fas fa-hamburger"></i> Hamburguer</a>
                        <a href="?filter=hamburguesas"><i class="fas fa-pizza-slice"></i> Pizza</a>
                        <a href="?filter=pizza"><i class="fa-solid fa-shrimp"></i> Asian</a>
                        <a href="?filter=arabe"><i class="fa-solid fa-bread-slice"></i> Sandwich</a>
                        <a href="?filter=asiatica"><i class="fa-solid fa-pepper-hot"></i> Mexican</a>
                    </div>
                </div>

                <div class="content">
                    <div class="vendor-title">Restaurants</div>
                    @if (count($vendors) == 0)
                        <p >No vendors found :/</p>
                    @endif
                    @foreach ($vendors as $vendor)
                        <div class="vendor">
                            <img src="/images/vendors/{{ $vendor->name }}.jpg" alt="{{ $vendor->name }}">
                            <div class="vendor-details">
                                <h3><a href="{{ route('vendors.show', $vendor->id) }}">{{ $vendor->name }}</a></h3>
                                <p>{{ $vendor->description }}</p>
                                <p>{{ $vendor->address }}</p>
                            </div>
                        </div>
                    @endforeach
                    {{ $vendors->links() }}
                </div>
            </div>
            
        </div>
    }
    @endif

    @endauth

    @guest

        @include('layouts.nbguest')

        <div class="container">
            <div class="search-form">
                <form method="GET" action="{{ route('vendors.search')}}" style="display: flex; align-items: center;">
                    <input type="text" name="search" class="search-input" placeholder="  Search our restaurants..." value="{{ request('search') }}">
                    <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="sidebar-and-content">
                <div class="sidebar">
                    <div class="sort-title">Sort By</div>
                    <div class="sort-options">
                        <a href="{{ route('vendors.sortaz')}}" ><i class="fa-solid fa-arrow-down-a-z"></i> Alphabetical order</a>
                        <a href="{{ route('vendors.sortza')}}"><i class="fa-solid fa-arrow-down-z-a"></i> Reverse Alphabetical order</a>
                        <a href="?sort=delivery_fee"><i class="fas fa-star"></i> Ratings</a>
                    </div>

                    <div class="filter-title">Filters</div>
                    <div class="filters">
                        <a href="?filter=americana"><i class="fas fa-hamburger"></i> Hamburguer</a>
                        <a href="?filter=hamburguesas"><i class="fas fa-pizza-slice"></i> Pizza</a>
                        <a href="?filter=pizza"><i class="fa-solid fa-shrimp"></i> Asian</a>
                        <a href="?filter=arabe"><i class="fa-solid fa-bread-slice"></i> Sandwich</a>
                        <a href="?filter=asiatica"><i class="fa-solid fa-pepper-hot"></i> Mexican</a>
                    </div>
                </div>

                <div class="content">
                    <div class="vendor-title">Restaurants</div>
                    @if (count($vendors) == 0)
                        <p >No vendors found :/</p>
                    @endif
                    @foreach ($vendors as $vendor)
                        <div class="vendor">
                            <img src="/images/vendors/{{ $vendor->name }}.jpg" alt="{{ $vendor->name }}">
                            <div class="vendor-details">
                                <h3><a href="{{ route('vendors.show', $vendor->id) }}">{{ $vendor->name }}</a></h3>
                                <p>{{ $vendor->description }}</p>
                                <p>{{ $vendor->address }}</p>
                            </div>
                        </div>
                    @endforeach
                    {{ $vendors->links() }}
                </div>
            </div>
            
        </div>

    @endguest

    @include('layouts.footer')
</body>
</html>
