<?php
require_once '../dbx.php'; // Conexión a la base de datos
require_once '../classes/Pago.php'; // Clase para manejar los pagos

$pago = new Pago($conexion);  // Instanciar la clase
$pagos = $pago->leer();  // Leer todos los pagos desde la base de datos

$html = '';
foreach ($pagos as $p) {
    $html .= "<tr>";
    $html .= "<td>{$p['Id']}</td>";  // Mostrar ID del pago
    $html .= "<td>{$p['VentaId']}</td>";  // Mostrar ID de la venta asociada
    $html .= "<td>{$p['Fecha']}</td>";  // Mostrar la fecha del pago
    $html .= "<td>{$p['FormaPago']}</td>";  // Mostrar la forma de pago
    $html .= "<td>{$p['Monto']}</td>";  // Mostrar el monto pagado
    $html .= "<td>{$p['SaldoPendiente']}</td>";  // Mostrar el saldo pendiente
    $html .= "<td>{$p['BancoId']}</td>";  // Mostrar el ID del banco
    $html .= "<td>{$p['NumeroReferencia']}</td>";  // Mostrar el número de referencia
    $html .= "<td>{$p['UsuarioId']}</td>";  // Mostrar el ID del usuario que procesó el pago
    $html .= "<td>
                <button class='btn btn-primary btn-editar' 
                        data-id='{$p['Id']}'
                        data-ventaid='{$p['VentaId']}'
                        data-fecha='{$p['Fecha']}'
                        data-formapago='{$p['FormaPago']}'
                        data-monto='{$p['Monto']}'
                        data-saldopendiente='{$p['SaldoPendiente']}'
                        data-bancoid='{$p['BancoId']}'
                        data-numeroreferencia='{$p['NumeroReferencia']}'
                        data-usuarioid='{$p['UsuarioId']}'>Editar</button>
                <button class='btn btn-danger btn-eliminar' data-id='{$p['Id']}'>Eliminar</button>
              </td>";
    $html .= "</tr>";
}

echo $html;
?>
