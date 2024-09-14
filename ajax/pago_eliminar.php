<?php
require_once '../dbx.php'; // Conexión a la base de datos
require_once '../classes/Pago.php'; // Clase de manejo de pagos

$pago = new Pago($conexion);

if (isset($_POST['eliminar'])) {
    // Obtener el valor del ID del pago a eliminar
    $id = $_POST['id']; 
    
    // Llamar al método 'eliminar' con el ID del pago
    if ($pago->eliminar($id)) {
        echo '<div class="alert alert-success">Pago eliminado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar el pago.</div>';
    }
}
?>
