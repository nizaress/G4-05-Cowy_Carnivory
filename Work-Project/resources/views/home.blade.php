@php
    use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

  .footer {
    text-align: center;
    color: #014E7A;

  }

  .background {
    position: relative;
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
    padding: 50px 0;
    height: 71%;
  }

  .background::before, .background::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      transition: opacity 4s ease-in-out;
      z-index: -1;
  }

  .background.start::after {
      opacity: 1;
  }
  .background.start::before {
      opacity: 0;
  }


  .logo-container {
    background-color: rgba(0, 0, 0, 0.5); 
    padding: 0;
    text-align: center;
    position: relative; 
    z-index: 1; 
    height: 100%;
  }

  .logo {
    background-image: url('logo.png');
    height: 200px; 
    width: 200px; 
    background-size: contain;
    background-repeat: no-repeat;
    margin: auto; 
    position: absolute;
    top: 35%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2; 

  }

  .slogan {
    font-weight: 500;
    font-size: 1.5em; 
    color: 	#FFFFFF;
    z-index: 1; 
    position: absolute;
    top: 72%;
    left: 50%;
    transform: translate(-50%, -50%); 
    font-family: 'Baskerville', serif;
  }

  
  .brand-name {
    font-weight: 900;
    font-size: 4em; 
    color: 	#FFFFFF;
    position: absolute;
    top: 65%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: 'Baskerville', serif;
  }

  .login {
    font-weight: 900;
    font-size: 4em; 
    color: 	#FFFFFF;
    position: absolute;
    top: 90%;
    left: 50%;
    width: 16%;
    height: 12%;
    transform: translate(-50%, -50%);
    font-family: 'Verdana', sans-serif;
  }

  .btn-login {
    font-family: 'Verdana', sans-serif;
    font-size: 16px;
    font-weight: bold;
    float: left;
    background-color: #014E7A;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 5px;
  }

  .btn-login:hover {
    float: left;
    background-color: #FFFFFF;
    color: #014E7A;
  }

  .btn-login:active {
    float: left;
    background-color: #014E7A;
    color: white;
    transform: translateY(4px);
  }

  .btn-register {
    font-family: 'Verdana', sans-serif;
    font-size: 16px;
    float: right;
    background-color: rgba(255, 255, 255, 0.3);
    color: #FFFFFF;
    padding: 11px 24px;
    border: 1px solid rgba(255, 255, 255, 0);
    border-radius: 5px;
  }

  .btn-register:hover {
    float: right;
    background-color: rgba(255, 255, 255, 0.4);
    color: white;
    border: 1px solid #FFFFFF;
  }

  .btn-register:active {
    float: right;
    background-color: rgba(255, 255, 255, 0.4);
    color: white;
    border: 1px solid #FFFFFF;
    transform: translateY(4px);
  }

</style>

</head>

<body>
  <head>
      <meta http-equiv="refresh" content="4"> 
  </head>
  @php
    Log::info("Debugging starts here");
    $seconds = now()->second % 28; 

    $backgroundUrls = [
        '/images/backgrounds/fondo1.jpg',
        '/images/backgrounds/fondo2.jpg',
        '/images/backgrounds/fondo3.png',
        '/images/backgrounds/fondo4.jpg',
        '/images/backgrounds/fondo5.jpg',
        '/images/backgrounds/fondo6.jpg',
        '/images/backgrounds/fondo7.jpg'
    ];


    $currentImageIndex = floor($seconds / 4);
    $currentBackgroundUrl = $backgroundUrls[$currentImageIndex];
    $previousBackgroundUrl = $backgroundUrls[($currentImageIndex == 0 ? 2 : $currentImageIndex - 1)];
  @endphp

  @auth
 
  @if (Auth::user()->role == 'admin')
  {
    @include('layouts.nbadmin')
  }
  @elseif (Auth::user()->role == 'vendor')
  {
    @include('layouts.nbvendor')
  }
  @elseif (Auth::user()->role == 'customer')
  {
    @include('layouts.nbcustomer')
  }
  @endif

  @endauth

  @guest

  @include('layouts.nbadmin')

  @endguest

  <div class="background" style="background-image: url('{{ asset($currentBackgroundUrl) }}');">
    <div class="logo-container">
        <div class="logo"></div>
        <div class="brand-name">Cowy Carnivory</div>
        <p class="slogan">Tasty for the Nasty</p>
        @guest
        <div class="login">
          <form method="GET" action="{{ url('/login') }}">
            @csrf
            <button class="btn-login" type="submit" type="button">Log In</button>
          </form>
          <form method="GET" action="{{ url('/register') }}">
            @csrf
            <button class="btn-register" type="submit" type="button">Register</button>
          </form>
        </div>
        @endguest
    </div>
  </div>

  <footer>
    <p class="footer">© 2021 Cowy Carnivory. All rights reserved.</p>
  </footer>

</body>

</html>