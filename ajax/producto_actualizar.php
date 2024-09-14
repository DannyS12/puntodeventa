<?php
require_once '../dbx.php';
require_once '../classes/Producto.php';

$producto = new Producto($conexion);

if (isset($_POST['actualizar'])) {
    $codigoProducto = $_POST['codigoProducto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $impuestos = $_POST['impuestos'];
    $numeroSerie = $_POST['numeroSerie'];
    $stock = $_POST['stock'];
    $categoriaId = $_POST['categoriaId'];
    
    if ($producto->actualizar($codigoProducto, $nombre, $descripcion, $precio, $impuestos, $numeroSerie, $stock, $categoriaId)) {
        echo '<div class="alert alert-success">Producto actualizado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al actualizar el producto.</div>';
    }
}
?>

<?php
require_once '../dbx.php'; // Conexión a la base de datos
require_once '../classes/Categoria.php';

$categoria = new Categoria($conexion);
$categorias = $categoria->leer(); // Método que recupera todas las categorías

// Generar las opciones de selección
$html = '<option value="">Seleccione una categoría</option>';
foreach ($categorias as $cat) {
    $html .= "<option value='{$cat['Id']}'>{$cat['Nombre']}</option>";
}

echo $html;  // Esto devolverá las opciones de categoría
?>

