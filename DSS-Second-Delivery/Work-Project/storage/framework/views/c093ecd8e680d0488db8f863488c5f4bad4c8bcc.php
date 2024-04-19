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


  .background {
    background-color: #000000; 
    background-image: url('images/fondo.png');
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
    padding: 50px 0;
    height: 75%;
  }

  .logo-container {
    background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco semitransparente */
    padding: 0;
    text-align: center;
    position: relative; 
    z-index: 1; 
    height: 100%;
  }

  .logo {
    background-image: url('images/logo.png');
    height: 200px; 
    width: 200px; 
    background-size: contain;
    background-repeat: no-repeat;
    margin: auto; 
    position: relative; 
    z-index: 2; 
    padding-top: 5%; 
  }

  .slogan {
    font-size: 1.5em; 
    color: #014E7A;
    margin-top: 15px; 
    z-index: 1; 
    position: relative; 
    font-family: Copperplate, Papyrus, fantasy;
  }

  
  .brand-name {
    font: bold;
    font-size: 2em; 
    color: #013756;
    margin-top: 30px; 
    font-family: Copperplate, Papyrus, fantasy;
  }
</style>
</head>
<body>

<ul class="navbar">
  <li><a href="#home" class="bold">Home</a></li>
  <li><a href="#vendors">Vendors</a></li>
  <li><a href="#products">Products</a></li>
  <li><a href="#customers">Customers</a></li>
  <li><a href="#orders">Orders</a></li>
  <li><a href="#linorders">Linorders</a></li> 
</ul>

<div class="background">
  <div class="logo-container">
    <div class="logo"><img src="images/logo.png" alt="Logo"></div>
    <div class="brand-name">COWY CARNIVORY</div>
    <p class="slogan">Tasty for the Nasty</p>
  </div>
</div>

</body>
</html>



<?php /**PATH C:\Users\nur29\OneDrive\Escritorio\Laravel\G4-05-Cowy_Carnivory\DSS-Second-Delivery\Work-Project\resources\views/home.blade.php ENDPATH**/ ?>