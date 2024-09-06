<?php

class ClienteController {

    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli('localhost', 'root', '', 'mi_base_de_datos');

        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);
        }
    }

    // Listar todos los clientes
    public function listarClientes() {
        $sql = "SELECT id, nombre, email, telefono FROM clientes";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            $clientes = [];
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
            return $clientes;
        } else {
            return [];
        }
    }

    // Obtener un cliente por ID
    public function obtenerCliente($id) {
        $id = $this->conexion->real_escape_string($id);
        $sql = "SELECT id, nombre, email, telefono FROM clientes WHERE id = '$id'";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Crear un nuevo cliente
    public function crearCliente($nombre, $email, $telefono) {
        $nombre = $this->conexion->real_escape_string($nombre);
        $email = $this->conexion->real_escape_string($email);
        $telefono = $this->conexion->real_escape_string($telefono);

        $sql = "INSERT INTO clientes (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";

        if ($this->conexion->query($sql) === TRUE) {
            return $this->conexion->insert_id; 
            return false;
        }
    }

    // Actualizar un cliente
    public function actualizarCliente($id, $nombre, $email, $telefono) {
        $id = $this->conexion->real_escape_string($id);
        $nombre = $this->conexion->real_escape_string($nombre);
        $email = $this->conexion->real_escape_string($email);
        $telefono = $this->conexion->real_escape_string($telefono);

        $sql = "UPDATE clientes SET nombre='$nombre', email='$email', telefono='$telefono' WHERE id='$id'";

        return $this->conexion->query($sql) === TRUE;
    }

    // Eliminar un cliente
    public function eliminarCliente($id) {
        $id = $this->conexion->real_escape_string($id);
        $sql = "DELETE FROM clientes WHERE id='$id'";

        return $this->conexion->query($sql) === TRUE;
    }

    // Cerrar la conexión
    public function __destruct() {
        $this->conexion->close();
    }
}
?>
