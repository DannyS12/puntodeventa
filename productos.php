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
    <link rel="stylesheet" href="assets/css/estilo.css">
  </head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="dashboard.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Productos
                </a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Productos</a>
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
<div class="centro">
<h1 class="display-2 centro" >Productos</h1>
</div>


<h2>Listado de Productos</h2>
    <table class="table table-sm">
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Impuestos</th>
            <th>Serie</th>
            <th>Stock</th>
            <th>Categoria</th>
        </tr>

        
        <?php
        include 'consultaProductos.php';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<form action='operaciones.php' method='POST' disabled>";
                echo "<td><input type='text' name='CodigoProducto' value='" . $row["CodigoProducto"] . "' disabled></td>";
                echo "<td><input type='text' name='Nombre' value='" . $row["Nombre"] . "' disabled></td>";
                echo "<td><input type='text' name='Descripcion' value='" . $row["Descripcion"] . "' disabled></td>";
                echo "<td><input type='text' name='Precio' value='" . $row["Precio"] . "' disabled></td>";
                echo "<td><input type='text' name='Impuestos' value='" . $row["Impuestos"] . "' disabled></td>";
                echo "<td><input type='text' name='NumeroSerie' value='" . $row["NumeroSerie"] . "' disabled></td>";
                echo "<td><input type='text' name='Stock' value='" . $row["Stock"] . "' disabled></td>";
                echo "<td><input type='text' name='CategoriaId' value='" . $row["CategoriaId"] . "' disabled></td>";
                echo "<td>";
                echo "</td>";
                echo "</form>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' disabled>No hay datos disponibles</td></tr>";
        }
        ?>
    </table>


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
