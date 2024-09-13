<?php
require_once '../dbx.php';
require_once '../classes/Banco.php';

$banco = new Banco($conexion);

if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    if ($banco->actualizar($id, $nombre)) {
        echo '<div class="alert alert-success">Banco actualizado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al actualizar el banco.</div>';
    }
}
?>