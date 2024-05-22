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
    background-color: #fafcff;
    font-family: 'Verdana', sans-serif;
  }

  .background {
    position: relative;
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
    padding: 50px 0;
    height: 79%;
    transition: background-image 1s ease-in-out;
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
    color: #fafcff;
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
    color: 	#Fafcff;
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
    background-color: #411acc;
    color: #fafcff;
    padding: 12px 24px;
    border: none;
    border-radius: 5px;
  }

  .btn-login:hover {
    float: left;
    background-color: #fafcff;
    color: #07080c;
  }

  .btn-login:active {
    transform: translateY(2px);
  }

  .btn-register {
    font-family: 'Verdana', sans-serif;
    font-size: 16px;
    float: right;
    background-color: rgba(243, 246, 255, 0.3);
    color: #fafcff;
    padding: 11px 24px;
    border: 1px solid rgba(243, 246, 255, 0);
    border-radius: 5px;
  }

  .btn-register:hover {
    float: right;
    background-color: rgba(243, 246, 255, 0.5);
    color: #fafcff;
   
  }

  .btn-register:active {
    float: right;
    background-color: rgba(243, 246, 255, 0.5);
    transform: translateY(2px);
  }

  .section {
    padding: 60px 20px;
    text-align: center;
    background-color: #07080c;
    color: #fafcff;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
  }

  .section:nth-child(even) {
    background-color: #fafcff;
    color: #07080c;
  }

  .section h2 {
    font-size: 2.5em;
    margin-bottom: 20px;
    color: #411acc;
  }

  .section p {
    font-size: 1.2em;
    max-width: 800px;
    margin: 0 auto;
    margin-bottom: 20px;
  }

  .section img {
    max-width: 40%;
    height: auto;
    border-radius: 8px;
  }

  .section .content {
    max-width: 45%;
  }

  .btn-explore {
    font-family: 'Verdana', sans-serif;
    font-size: 20px;
    font-weight: bold;
    background-color: #411acc;
    color: #fafcff;
    padding: 12px 24px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    margin-top: 20px;
  }

  .btn-explore:hover {
    background-color: #07080c;
    color: #fafcff;
  }

  .btn-explore:active {
    transform: translateY(2px);
  }

</style>

</head>

<body>
  @php
    Log::info("Debugging starts here");
    $backgroundUrls = [
        '/images/backgrounds/fondo1.jpg',
        '/images/backgrounds/fondo2.jpg',
        '/images/backgrounds/fondo3.png',
        '/images/backgrounds/fondo4.jpg',
        '/images/backgrounds/fondo5.jpg',
        '/images/backgrounds/fondo6.jpg',
        '/images/backgrounds/fondo7.jpg'
    ];
  @endphp

  @auth
  @if (Auth::user()->role == 'admin')
    @include('layouts.nbadmin')
  @elseif (Auth::user()->role == 'vendor')
    @include('layouts.nbvendor')
  @elseif (Auth::user()->role == 'customer')
    @include('layouts.nbcustomer')
  @endif
  @endauth

  @guest
    @include('layouts.nbguest')
  @endguest

  <div class="background" id="background">
    <div class="logo-container">
        <div class="logo"></div>
        <div class="brand-name">Cowy Carnivory</div>
        <p class="slogan">Tasty for the Nasty</p>
        @guest
        <div class="login">
          <form method="GET" action="{{ url('/login') }}">
            @csrf
            <button class="btn-login" type="submit">Log In</button>
          </form>
          <form method="GET" action="{{ url('/register') }}">
            @csrf
            <button class="btn-register" type="submit">Register</button>
          </form>
        </div>
        @endguest
    </div>
  </div>

  <div class="section">
    <img src="/images/home/section1.jpg" alt="Delicious Food">
    <div class="content">
      <h2>Welcome to Cowy Carnivory</h2>
      <p>Your one-stop destination for the most delicious meals from a variety of local restaurants. We bring your favorite dishes right to your doorstep.</p>
    </div>
  </div>

  <div class="section">
    <div class="content">
      <h2>Why Choose Us?</h2>
      <p>At Cowy Carnivory, we are dedicated to providing fast, reliable, and tasty food delivery service. Enjoy a seamless ordering experience with our user-friendly platform.</p>
    </div>
    <img src="/images/home/section2.jpg" alt="Happy Customers">
  </div>

  <div class="section">
    <img src="/images/home/section3.jpg" alt="Variety of Cuisines">
    <div class="content">
      <h2>Explore a Wide Range of Cuisines</h2>
      <p>From American classics to exotic Asian flavors, our selection of restaurants has something for everyone. Satisfy your cravings with just a few clicks.</p>
      <a href="/vendor" class="btn-explore">Explore our Restaurants</a>
    </div>
  </div>

  @include('layouts.footer')

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const backgroundUrls = [
        '/images/backgrounds/fondo1.jpg',
        '/images/backgrounds/fondo2.jpg',
        '/images/backgrounds/fondo3.png',
        '/images/backgrounds/fondo4.jpg',
        '/images/backgrounds/fondo5.jpg',
        '/images/backgrounds/fondo6.jpg',
        '/images/backgrounds/fondo7.jpg'
      ];

      let currentImageIndex = 0;
      const backgroundElement = document.getElementById('background');

      function changeBackground() {
        currentImageIndex = (currentImageIndex + 1) % backgroundUrls.length;
        backgroundElement.style.backgroundImage = `url(${backgroundUrls[currentImageIndex]})`;
      }

      setInterval(changeBackground, 4000);
    });
  </script>
</body>

</html>
