<?php
require_once '../dbx.php';
require_once '../classes/Cliente.php';

$cliente = new Cliente($conexion);

if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $nit = $_POST['nit'];
    $cui = $_POST['cui'];
    $seguroMedico = $_POST['seguroMedico'];
    $numeroPoliza = $_POST['numeroPoliza'];

    if ($cliente->actualizar($id, $nombre, $direccion, $telefono, $email, $sexo, $nit, $cui, $seguroMedico, $numeroPoliza)) {
        echo '<div class="alert alert-success">Cliente actualizado exitosamente.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al actualizar el cliente.</div>';
    }
}
?>
