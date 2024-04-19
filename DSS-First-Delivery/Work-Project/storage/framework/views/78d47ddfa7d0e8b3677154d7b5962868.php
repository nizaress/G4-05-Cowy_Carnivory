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
    font-family: Arial, sans-serif; /* o cualquier fuente que prefieras */
  }

  /* Estilos del menú de navegación */
  .navbar {
    display: flex;
    align-items: center;
    list-style: none;
    padding: 16px;
    margin: 0; /* elimina el margen por defecto */
    background-color: #fff;
  }

  .navbar li {
    margin-right: 20px; /* Espaciado entre los elementos del menú */
  }

  .navbar a {
    text-decoration: none;
    color: #333;
    padding: 8px 16px;
    font-size: 16px; /* Tamaño de la fuente */
  }

  .navbar a.bold {
    font-weight: bold; /* Hace que el texto sea en negrita */
  }

  /* Fondo fijo y estilos del contenedor del logo */
  .background {
    background-image: url('fondo.png');
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
    padding: 50px 0;
  }

  .logo-container {
    text-align: center;
    position: relative; /* Ajusta el posicionamiento del nombre del logo */
  }

  .logo {
    background-image: url('logo.png');
    height: 200px; /* Altura del logo */
    width: 200px; /* Anchura del logo */
    background-size: contain;
    background-repeat: no-repeat;
    margin: auto; /* Centra el logo horizontalmente */
    position: relative; /* Relativo al texto que estará bajo él */
    z-index: 2; /* Asegura que el logo esté sobre el texto */
  }

  .slogan {
    font-size: 1.5em; /* Tamaño de la fuente del eslogan */
    color: #555;
    margin-top: -20px; /* Ajusta la posición del eslogan si es necesario */
    z-index: 1; /* Coloca el eslogan debajo del logo */
    position: relative; /* Importante para el z-index */
  }

  /* Nombre del restaurante bajo el logo */
  .brand-name {
    font-size: 2em; /* Tamaño de la fuente del nombre */
    color: #333;
    margin-top: 20px; /* Espaciado por encima del nombre */
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
  <li><a href="#linorders">Linorders</a></li> <!-- Añadido nuevo elemento al menú -->
</ul>

<div class="background">
  <div class="logo-container">
    <div class="logo"></div>
    <div class="brand-name">COWY CARNIVORY</div>
    <p class="slogan">Tasty for the Nasty</p>
  </div>
</div>

</body>
</html>



<?php /**PATH C:\Users\nur29\OneDrive\Escritorio\Laravel\G4-05-Cowy_Carnivory\DSS-First-Delivery\Work-Project\resources\views/home.blade.php ENDPATH**/ ?>