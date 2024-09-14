<?php
require_once '../dbx.php'; // Conexión a la base de datos
require_once '../classes/Pago.php'; // Clase de manejo de pagos

$pago = new Pago($conexion);

if (isset($_POST['actualizar'])) {
    // Obtener los valores del formulario
    $id = $_POST['id'];
    $ventaId = $_POST['ventaId'];
    $fecha = $_POST['fecha'];
    $formaPago = $_POST['formaPago'];
    $monto = $_POST['monto'];
    $saldoPendiente = $_POST['saldoPendiente'];
    $bancoId = $_POST['bancoId'];
    $numeroReferencia = $_POST['numeroReferencia'];
    $usuarioId = $_POST['usuarioId'];
    
    // Llamar al método 'actualizar' con los parámetros obtenidos
    if ($pago->actualizar($id, $ventaId, $fecha, $formaPago, $monto, $saldoPendiente, $bancoId, $numeroReferencia, $usuarioId)) {
        echo '<div class="alert alert-success">Pago actualizado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al actualizar el pago.</div>';
    }
}
?>
<?php
require_once '../dbx.php'; // Conexión a la base de datos
require_once '../classes/Banco.php'; // Clase para manejar bancos

$banco = new Banco($conexion);
$bancos = $banco->leer(); // Método que recupera todos los bancos

// Generar las opciones de selección
$html = '<option value="">Seleccione un banco</option>';
foreach ($bancos as $b) {
    $html .= "<option value='{$b['Id']}'>{$b['Nombre']}</option>";
}

echo $html;  // Esto devolverá las opciones de banco
?>
