<?php
require_once '../dbx.php';
require_once '../classes/Producto.php';

$producto = new Producto($conexion);

if (isset($_POST['crear'])) {
    // Obtener los valores del formulario
    $codigoProducto = $_POST['codigoProducto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $impuestos = $_POST['impuestos'];
    $numeroSerie = $_POST['numeroSerie'];
    $stock = $_POST['stock'];
    $categoriaId = $_POST['categoriaId'];

    // Llamar al método 'crear' con los parámetros obtenidos
    if ($producto->crear($codigoProducto, $nombre, $descripcion, $precio, $impuestos, $numeroSerie, $stock, $categoriaId)) {
        echo '<div class="alert alert-success">Producto creado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al crear el producto.</div>';
    }
}
?>
