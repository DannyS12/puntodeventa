<?php
require_once 'classes/Usuario.php'; 
$usuario = new Usuario($db);
$usuario->cerrarSesion(); 

header("Location: login.php");
exit();
?>
