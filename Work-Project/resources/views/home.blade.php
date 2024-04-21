<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cowy Carnivory</title>
<style>
  /* Estilos base */
  body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    color: #014E7A;
    font-family: 'Verdana', sans-serif;  
  }

  /* Estilos del menú */
  .navbar {
    display: flex;
    align-items: center;
    list-style: none;
    padding: 16px;
    margin: 0; 
    background-color: #fff;
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


/* Ensure that only the ::before element is visible initially */
.background.start::after {
    opacity: 1;
}
.background.start::before {
    opacity: 0;
}


  .logo-container {
    background-color: rgba(255, 255, 255, 0.3); /* Fondo blanco semitransparente */
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
    color: #fff;
    z-index: 1; 
    position: absolute;
    top: 70%;
    left: 50%;
    transform: translate(-50%, -50%); 
    font-family: 'Baskerville', serif;
  }

  
  .brand-name {
    font-weight: 900;
    font-size: 4em; 
    color: #fff;
    position: absolute;
    top: 65%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: 'Baskerville', serif;
  }
</style>
</head>
<body>
<head>
    <meta http-equiv="refresh" content="4"> <!-- Refresh page every 6 seconds -->
</head>
  @php
      Log::info("Debugging starts here");
      $seconds = now()->second % 12; // Cycle every 12 seconds

      $backgroundUrls = [
          '/images/backgrounds/fondo1.jpg',
          '/images/backgrounds/fondo2.png',
          '/images/backgrounds/fondo3.jpg'
      ];

      // Determine which backgrounds to display
      $currentImageIndex = floor($seconds / 4);
      $currentBackgroundUrl = $backgroundUrls[$currentImageIndex];
      $previousBackgroundUrl = $backgroundUrls[($currentImageIndex == 0 ? 2 : $currentImageIndex - 1)];
  @endphp

  <ul class="navbar">
    <li><a href="/" class="bold">Home</a></li>
    <li><a href="/vendor">Vendors</a></li>
    <li><a href="/product">Products</a></li>
    <li><a href="/customer">Customers</a></li>
    <li><a href="/order">Orders</a></li>
    <li><a href="/linorder">Linorders</a></li> 
  </ul>

  <div class="background" style="background-image: url('{{ asset($currentBackgroundUrl) }}');">
    <div class="logo-container">
        <div class="logo"></div>
        <div class="brand-name">Cowy Carnivory</div>
        <p class="slogan">Tasty for the Nasty</p>
    </div>
</div>

  <p class="footer">© 2021 Cowy Carnivory. All rights reserved.</p>

</body>
</html>



