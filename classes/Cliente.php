<?php
class Cliente {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function crear($nombre, $direccion, $telefono, $email, $sexo, $nit, $cui, $seguroMedico, $numeroPoliza) {
        $query = "INSERT INTO clientes (Nombre, Direccion, Telefono, Email, Sexo, NIT, CUI, SeguroMedico, NumeroPoliza) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);

        if ($stmt === false) {
            die("Error al preparar la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param("sssssssss", $nombre, $direccion, $telefono, $email, $sexo, $nit, $cui, $seguroMedico, $numeroPoliza);

        if ($stmt->execute()) {
            return true;
        } else {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }
    }

    public function leer() {
        $query = "SELECT * FROM clientes";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function leerPorId($id) {
        $query = "SELECT * FROM clientes WHERE Id = ? LIMIT 1";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id); 
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function actualizar($id, $nombre, $direccion, $telefono, $email, $sexo, $nit, $cui, $seguroMedico, $numeroPoliza) {
        $query = "UPDATE clientes 
                  SET Nombre = ?, Direccion = ?, Telefono = ?, Email = ?, Sexo = ?, NIT = ?, CUI = ?, SeguroMedico = ?, NumeroPoliza = ? 
                  WHERE Id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssssssssi", $nombre, $direccion, $telefono, $email, $sexo, $nit, $cui, $seguroMedico, $numeroPoliza, $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function eliminar($id) {
        $query = "DELETE FROM clientes WHERE Id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id); 
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
