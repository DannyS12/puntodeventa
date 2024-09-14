<?php
class Pago {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    // Crear un nuevo pago
    public function crear($ventaId, $fecha, $formaPago, $monto, $saldoPendiente, $bancoId, $numeroReferencia, $usuarioId) {
        $query = "INSERT INTO pagos (VentaId, Fecha, FormaPago, Monto, SaldoPendiente, BancoId, NumeroReferencia, UsuarioId) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);

        if ($stmt === false) {
            die("Error al preparar la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param("issddsis", $ventaId, $fecha, $formaPago, $monto, $saldoPendiente, $bancoId, $numeroReferencia, $usuarioId);

        if ($stmt->execute()) {
            return true;
        } else {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }
    }

    // Leer todos los pagos
    public function leer() {
        $query = "SELECT * FROM pagos";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // Leer un pago por Id
    public function leerPorId($id) {
        $query = "SELECT * FROM pagos WHERE Id = ? LIMIT 1";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    // Actualizar un pago
    public function actualizar($id, $ventaId, $fecha, $formaPago, $monto, $saldoPendiente, $bancoId, $numeroReferencia, $usuarioId) {
        $query = "UPDATE pagos SET VentaId = ?, Fecha = ?, FormaPago = ?, Monto = ?, SaldoPendiente = ?, BancoId = ?, NumeroReferencia = ?, UsuarioId = ? 
                  WHERE Id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("issddsis", $ventaId, $fecha, $formaPago, $monto, $saldoPendiente, $bancoId, $numeroReferencia, $usuarioId, $id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar un pago
    public function eliminar($id) {
        $query = "DELETE FROM pagos WHERE Id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
