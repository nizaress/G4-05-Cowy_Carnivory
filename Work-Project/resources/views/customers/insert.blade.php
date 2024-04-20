<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Add Customer</title>
        <style>
            body {
                background-color: #e5e5e5;
            }
            .box {
                width: 600px;
                padding: 20px;
                background-color: #f0f0f0;
                border: 2px solid #ccc;
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
                margin: auto;
                margin-top: 2.5%;
            }
            .form-container {
                max-width: 500px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #f9f9f9;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }

            .form-heading {
                text-align: center;
                margin-bottom: 20px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                font-weight: bold;
            }

            .form-group input[type="text"],
            .form-group input[type="email"] {
                width: 97%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-right: 2%;
            }

            .btn-primary, .redirectButton {
                display: block;
                width: 100%;
                padding: 10px;
                font-size: 16px;
                color: #fff;
                background-color: #007bff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }

            .text-danger {
                color: red;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <header>
        </header>

        <div class="box">
            <div class="container" style="font-family: 'Roboto', sans-serif; padding: 10px; overflow: hidden;">
                <h1 style="text-align: center; margin-bottom: 7%; font-family: 'Open Sans', sans-serif;">Add New Customer</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('customer.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" unique required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" unique required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <input type="integer" class="form-control" id="phone_number" name="phone_number" required>
                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="accountNumber">Credit Card:</label>
                        <input type="text" class="form-control" id="card_number" name="card_number" required>
                        @error('card_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div style="margin-top: 7%; display: flex;">
                        <button class="redirectButton" onclick="performCustomAction(event)" form=none style="background-color: #ff0000; width: 150px;"
                        onmouseover="this.style.backgroundColor='#b70000'" 
                        onmouseout="this.style.backgroundColor='#ff0000'">Cancel</button>
                        <button type="submit" class="btn btn-primary" style=" width: 400px; margin-left: 4%;">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function performCustomAction(event){
                event.preventDefault();
                window.location = "/customer";
            };
        </script>

        <footer></footer>
    </body>
</html>
