<?php
class Usuario {
    private $conexion;
    
    public function __construct($db) {
        $this->conexion = $db;
    }

    public function autenticar($nombreUsuario, $contrasena) {
        $query = "SELECT * FROM Usuarios WHERE NombreUsuario = ? LIMIT 1";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows == 1) {
            $usuario = $resultado->fetch_assoc();
            if (password_verify($contrasena, $usuario['Contrasena'])) {
                return $usuario; 
            }
        }
        return false; 
    }

    public function cerrarSesion()
    {
        session_start(); 
        session_unset(); 
        session_destroy(); 
    }
}
?>
