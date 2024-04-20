<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Cowy Carnivory</title>
        <style>
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

        <div style="display: flex; justify-content: space-between; margin-top: 2%; margin-bottom: 2%;">
            <form method="GET" style="display: flex; align-items: center; margin-left: 2%;" action="{{ url('/') }}">
                @csrf
                <button type="submit" style="margin-right: auto; background-color: #4eb8c4;"
                onmouseover="this.style.backgroundColor='#2c7a89'" 
                onmouseout="this.style.backgroundColor='#45a0aa'">
                    Go Back
                </button>
            </form>
            <form action="{{ url('/product/delete') }}" method="POST" style="display: flex; align-items: center; margin-left: 17%;">
                @csrf
                <input type="number" name="product_id" min="1" step="1" required placeholder="Enter Product ID" style="flex: 1;">
                <button type="submit" style="margin-left: 10px;">Delete</button>
            </form>
            <form method="GET" style="margin-right: 20%;" action="{{ url('/product/create') }}">
                @csrf
                <button type="submit" type="button">Add a Product</button>
            </form>
        </div>

        @if (session('error'))
            <div style="color: red;">
                {{ session('error') }}
            </div>
        @endif

        <div style="margin-left: 1%; margin-right: 1%; margin-bottom: 3%;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Vendor ID</th>
                        <th>Vendor Email</th>
                        <th>Vendor Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><b>{{ $product->id }}</b></td>
                            <td>{{ $product->cod }}</td>
                            <td>
                                <form action="{{ url('/product/update/'.$product->name) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="name" value="{{ $product->name }}" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('/product/update/'.$product->description) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="description" value="{{ $product->description }}" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('/product/update/'.$product->price) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="price" value="{{ $product->price }}" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('/product/update/'.$product->vendor_id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="vendor_id" value="{{ $product->vendor_id }}" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>{{ $product->vendor_email }}</td>
                            <td>
                                <form action="{{ url('/product/update/'.$product->vendor_name) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="vendor_name" value="{{ $product->vendor_name }}" onchange="this.form.submit()">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <footer></footer>
    </body>
</html>
