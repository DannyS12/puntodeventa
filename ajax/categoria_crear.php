<?php
require_once '../dbx.php';
require_once '../classes/Categoria.php';

$categoria = new Categoria($conexion); 

if (isset($_POST['crear'])) {
    $nombre = $_POST['nombre'];
    if ($categoria->crear($nombre)) {
        echo '<div class="alert alert-success">Categoría creada exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al crear la categoría.</div>';
    }
}
?>