<?php
session_start(); 
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto de Venta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/css/estilos.css"> -->
  </head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="dashboard.php">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Productos
        </a>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="productos.php">Productos</a>
          <a class="dropdown-item" href="#">Categoria</a>
          <a class="dropdown-item" href="#">Kardex</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Cientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Ventas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Devoluciones</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php">Cerrar Sesión</a>
      </li>
    </ul>
    
  </div>
</nav>
</div>

<img src="assets/img/logo.jpeg" class="rounded mx-auto d-block" alt="Logro Comercial">

<div class="container">
  <br><br>
  <div class="vstack gap-3">
  <div class="p-2">Datos de sesion</div>
  <div class="p-2"><?php echo "Id: " . $_SESSION['usuario_id'] . "<br>";?></div>
  <div class="p-2"><?php echo "Usuario: " . $_SESSION['nombreUsuario'] . "<br>";?></div>
  <div class="p-2"><?php echo "Rol: " . $_SESSION['rol'] . "<br>";?></div>
  </div>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <!-- <img class="mb-2" src="/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24"> -->
        <small class="d-block mb-3 text-muted">&copy; 2017-2024</small>
      </div>
      
    </div>
  </footer>
</div>
        

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
</body>
</html>
