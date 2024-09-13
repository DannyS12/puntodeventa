<?php
require_once '../dbx.php';
require_once '../classes/Banco.php';

$banco = new Banco($conexion);

if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    if ($banco->eliminar($id)) {
        echo '<div class="alert alert-success">Banco eliminado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar el banco.</div>';
    }
}
?>