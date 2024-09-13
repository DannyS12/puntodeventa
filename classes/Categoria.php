<?php
class Categoria {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function crear($nombre) {

        $query = "INSERT INTO categorias (Nombre) VALUES (?)";
        $stmt = $this->conexion->prepare($query);

        if ($stmt === false) {
            die("Error al preparar la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param("s", $nombre);

        if ($stmt->execute()) {
            return true;
        } else {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }
    }

    public function leer() {
        $query = "SELECT * FROM categorias";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function leerPorId($id) {
        $query = "SELECT * FROM categorias WHERE Id = ? LIMIT 1";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id); 
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function actualizar($id, $nombre) {
        $query = "UPDATE categorias SET Nombre = ? WHERE Id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("si", $nombre, $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function eliminar($id) {
        $query = "DELETE FROM categorias WHERE Id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id); 
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
