<?php
require_once '../dbx.php';
require_once '../classes/Categoria.php';

$categoria = new Categoria($conexion);

if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    if ($categoria->actualizar($id, $nombre)) {
        echo '<div class="alert alert-success">Categoría actualizada exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al actualizar la categoría.</div>';
    }
}
?>