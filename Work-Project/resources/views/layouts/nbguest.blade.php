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
            font-family: 'Verdana', sans-serif;  
            <!--background-color: #120903;-->
        }

        .nav {
            display: flex;
            align-items: center;
            width: 100%;
            margin: 0; 
            background-color: #07080c;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            color: #fafcff;
            padding: 8px 16px;
            font-size: 16px; 
        }

        .navbar a.bold {
            font-weight: bold; 
        }

        .navbar a:hover {
            color: #411acc;
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
            <li><a href="/product">Information</a></li>
            <li><a href="/product">Contact</a></li>
        </ul>

    </div>

    <footer>

    </footer>
</body>
</html>