<?php
require_once '../dbx.php';
require_once '../classes/Banco.php';

$banco = new Banco($conexion); 

if (isset($_POST['crear'])) {
    $nombre = $_POST['nombre'];
    if ($banco->crear($nombre)) {
        echo '<div class="alert alert-success">Banco creado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al crear el banco.</div>';
    }
}
?>