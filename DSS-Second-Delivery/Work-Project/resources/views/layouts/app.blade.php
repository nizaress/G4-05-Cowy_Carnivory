<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Application</title>
</head>
<body>
    <header>
        <!-- Header content here -->
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <!-- Footer content here -->
    </footer>
</body>
</html>
