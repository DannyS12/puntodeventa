<?php
require_once '../dbx.php';
require_once '../classes/Producto.php';

$producto = new Producto($conexion);

if (isset($_POST['eliminar'])) {
    $codigoProducto = $_POST['codigoProducto'];
    if ($producto->eliminar($codigoProducto)) {
        echo '<div class="alert alert-success">Producto eliminado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar el producto.</div>';
    }
}
?>
