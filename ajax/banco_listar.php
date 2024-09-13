<?php
require_once '../dbx.php';
require_once '../classes/Banco.php';

$banco = new Banco($conexion);
$bancos = $banco->leer();

$html = '';
foreach ($bancos as $b) {
    $html .= "<tr>";
    $html .= "<td>{$b['Id']}</td>";
    $html .= "<td>{$b['Nombre']}</td>";
    $html .= "<td>
                <button class='btn btn-primary btn-editar' data-id='{$b['Id']}' data-nombre='{$b['Nombre']}'>Editar</button>
                <button class='btn btn-danger btn-eliminar' data-id='{$b['Id']}'>Eliminar</button>
              </td>";
    $html .= "</tr>";
}

echo $html;
?>