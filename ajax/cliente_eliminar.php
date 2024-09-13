<?php
require_once '../dbx.php';
require_once '../classes/Cliente.php';

$cliente = new Cliente($conexion);

if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    if ($cliente->eliminar($id)) {
        echo '<div class="alert alert-success">Cliente eliminado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar el cliente.</div>';
    }
}
?>
