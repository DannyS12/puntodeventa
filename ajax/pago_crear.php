<?php
require_once '../dbx.php'; // Conexión a la base de datos
require_once '../classes/Pago.php'; // Clase de manejo de pagos

$pago = new Pago($conexion);

if (isset($_POST['crear'])) {
    // Obtener los valores del formulario
    $ventaId = $_POST['ventaId'];
    $fecha = $_POST['fecha'];
    $formaPago = $_POST['formaPago'];
    $monto = $_POST['monto'];
    $saldoPendiente = $_POST['saldoPendiente'];
    $bancoId = $_POST['bancoId'];
    $numeroReferencia = $_POST['numeroReferencia'];
    $usuarioId = $_POST['usuarioId'];

    // Llamar al método 'crear' con los parámetros obtenidos
    if ($pago->crear($ventaId, $fecha, $formaPago, $monto, $saldoPendiente, $bancoId, $numeroReferencia, $usuarioId)) {
        echo '<div class="alert alert-success">Pago creado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al crear el pago.</div>';
    }
}
?>
<?php
require_once '../dbx.php'; // Conexión a la base de datos
require_once '../classes/Banco.php'; // Clase para manejar bancos

$banco = new Banco($conexion); 
$bancos = $banco->leer(); // Método que recupera todas los bancos

// Generar las opciones de selección
$html = '<option value="">Seleccione un banco</option>';
foreach ($bancos as $b) {
    $html .= "<option value='{$b['Id']}'>{$b['Nombre']}</option>";
}

echo $html;  // Esto devolverá las opciones de banco
?>
