<?php
require_once '../dbx.php';
require_once '../classes/Categoria.php';

$categoria = new Categoria($conexion);
$categorias = $categoria->leer();

$html = '';
foreach ($categorias as $cat) {
    $html .= "<tr>";
    $html .= "<td>{$cat['Id']}</td>";
    $html .= "<td>{$cat['Nombre']}</td>";
    $html .= "<td>
                <button class='btn btn-primary btn-editar' data-id='{$cat['Id']}' data-nombre='{$cat['Nombre']}'>Editar</button>
                <button class='btn btn-danger btn-eliminar' data-id='{$cat['Id']}'>Eliminar</button>
              </td>";
    $html .= "</tr>";
}

echo $html;
?>