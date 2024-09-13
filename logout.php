<<<<<<< HEAD
<?php
require_once 'classes/Usuario.php'; 
$usuario = new Usuario($db);
$usuario->cerrarSesion(); 

header("Location: login.php");
exit();
?>
=======
<?php
require_once 'classes/Usuario.php';

 
$usuario = new Usuario($db);
$usuario->cerrarSesion(); 

header("Location: login.php");
exit();
?>
>>>>>>> 6e13e1150ac0c14b4fa99ae48d033476d5eb4fb9
