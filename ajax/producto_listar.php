<?php
require_once '../dbx.php';
require_once '../classes/Producto.php';

$producto = new Producto($conexion);
$productos = $producto->leer();

$html = '';
foreach ($productos as $prod) {
    $html .= "<tr>";
    $html .= "<td>{$prod['CodigoProducto']}</td>";
    $html .= "<td>{$prod['Nombre']}</td>";
    $html .= "<td>{$prod['Descripcion']}</td>";
    $html .= "<td>{$prod['Precio']}</td>";
    $html .= "<td>{$prod['Impuestos']}</td>";
    $html .= "<td>{$prod['NumeroSerie']}</td>";
    $html .= "<td>{$prod['Stock']}</td>";
    $html .= "<td>{$prod['CategoriaId']}</td>";
    $html .= "<td>
                <button class='btn btn-primary btn-editar' 
                        data-codigoproducto='{$prod['CodigoProducto']}' 
                        data-nombre='{$prod['Nombre']}'
                        data-descripcion='{$prod['Descripcion']}'
                        data-precio='{$prod['Precio']}'
                        data-impuestos='{$prod['Impuestos']}'
                        data-numeroserie='{$prod['NumeroSerie']}'
                        data-stock='{$prod['Stock']}'
                        data-categoriaid='{$prod['CategoriaId']}'>Editar</button>
                <button class='btn btn-danger btn-eliminar' data-codigoproducto='{$prod['CodigoProducto']}'>Eliminar</button>
              </td>";
    $html .= "</tr>";
}

echo $html;
?>
