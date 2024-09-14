<?php
require_once '../dbx.php';
require_once '../classes/Usuario.php';

$usuario = new Usuario($conexion);

// Obtener todos los usuarios
$query = "SELECT Id, NombreUsuario FROM Usuarios";
$resultado = $conexion->query($query);

$html = '<option value="">Seleccione un usuario</option>';
while ($fila = $resultado->fetch_assoc()) {
    $html .= "<option value='{$fila['Id']}'>{$fila['NombreUsuario']}</option>";
}

echo $html;
?>
