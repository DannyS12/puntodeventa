<<<<<<< HEAD
<?php
    session_start();
    require_once 'classes/Usuario.php';
    require_once 'dbx.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST['nombreUsuario'];
    $contrasena = $_POST['contrasena'];
    
     $usuario = new Usuario($conexion);
    $resultado = $usuario->autenticar($nombreUsuario, $contrasena);
    
    if ($resultado) {
        $_SESSION['usuario_id'] = $resultado['Id'];
        $_SESSION['nombreUsuario'] = $resultado['NombreUsuario'];
        $_SESSION['rol'] = $resultado['Rol'];
        header("Location: vista/dashboard.php");
    } else {
        echo "Usuario o contraseña incorrectos.";
        header("Location: login.php?error=1");
    }
}
?>

=======
<?php
    session_start();
    require_once 'classes/Usuario.php';
    require_once 'dbx.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST['nombreUsuario'];
    $contrasena = $_POST['contrasena'];
    
     $usuario = new Usuario($conexion);
    $resultado = $usuario->autenticar($nombreUsuario, $contrasena);
    
    if ($resultado) {
        $_SESSION['usuario_id'] = $resultado['Id'];
        $_SESSION['nombreUsuario'] = $resultado['NombreUsuario'];
        $_SESSION['rol'] = $resultado['Rol'];

        header("Location: dashboard.php");
    } else {
        echo "Usuario o contraseña incorrectos.";
        header("Location: login.php?error=1");
    }
}
?>

>>>>>>> 6e13e1150ac0c14b4fa99ae48d033476d5eb4fb9
