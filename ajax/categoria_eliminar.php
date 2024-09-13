<?php
require_once '../dbx.php';
require_once '../classes/Categoria.php';

$categoria = new Categoria($conexion);

if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    if ($categoria->eliminar($id)) {
        echo '<div class="alert alert-success">Categoría eliminada exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar la categoría.</div>';
    }
}
?>