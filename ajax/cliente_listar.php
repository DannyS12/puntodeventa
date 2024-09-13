<?php
require_once '../dbx.php';
require_once '../classes/Cliente.php';

$cliente = new Cliente($conexion);
$clientes = $cliente->leer();

$html = '';
foreach ($clientes as $cli) {
    $html .= "<tr>";
    $html .= "<td>{$cli['Id']}</td>";
    $html .= "<td>{$cli['Nombre']}</td>";
    $html .= "<td>{$cli['Direccion']}</td>";
    $html .= "<td>{$cli['Telefono']}</td>";
    $html .= "<td>{$cli['Email']}</td>";
    $html .= "<td>{$cli['Sexo']}</td>";
    $html .= "<td>{$cli['NIT']}</td>";
    $html .= "<td>{$cli['CUI']}</td>";
    $html .= "<td>{$cli['SeguroMedico']}</td>";
    $html .= "<td>{$cli['NumeroPoliza']}</td>";
    $html .= "<td>
                <button class='btn btn-primary btn-editar' data-id='{$cli['Id']}' 
                        data-nombre='{$cli['Nombre']}' 
                        data-direccion='{$cli['Direccion']}' 
                        data-telefono='{$cli['Telefono']}' 
                        data-email='{$cli['Email']}' 
                        data-sexo='{$cli['Sexo']}' 
                        data-nit='{$cli['NIT']}' 
                        data-cui='{$cli['CUI']}' 
                        data-seguro='{$cli['SeguroMedico']}' 
                        data-poliza='{$cli['NumeroPoliza']}'>Editar</button>
                <button class='btn btn-danger btn-eliminar' data-id='{$cli['Id']}'>Eliminar</button>
              </td>";
    $html .= "</tr>";
}

echo $html;
?>
