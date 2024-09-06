<?php
    include 'dbx.php';

    $sql = "SELECT Id, CodigoProducto, Nombre, Descripcion, Precio, 
    Impuestos, NumeroSerie, Stock, CategoriaId FROM productos ";
    $result = $conexion->query($sql);
?>