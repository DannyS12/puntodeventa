<?php
class Producto {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    // Crear un nuevo producto
    public function crear($codigoProducto, $nombre, $descripcion, $precio, $impuestos, $numeroSerie, $stock, $categoriaId) {
        $query = "INSERT INTO productos (CodigoProducto, Nombre, Descripcion, Precio, Impuestos, NumeroSerie, Stock, CategoriaId) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);

        if ($stmt === false) {
            die("Error al preparar la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param("sssddsss", $codigoProducto, $nombre, $descripcion, $precio, $impuestos, $numeroSerie, $stock, $categoriaId);

        if ($stmt->execute()) {
            return true;
        } else {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }
    }

    // Leer todos los productos
    public function leer() {
        $query = "SELECT * FROM productos";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // Leer un producto por CodigoProducto
    public function leerPorCodigo($codigoProducto) {
        $query = "SELECT * FROM productos WHERE CodigoProducto = ? LIMIT 1";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $codigoProducto); 
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    // Actualizar un producto
    public function actualizar($codigoProducto, $nombre, $descripcion, $precio, $impuestos, $numeroSerie, $stock, $categoriaId) {
        $query = "UPDATE productos SET Nombre = ?, Descripcion = ?, Precio = ?, Impuestos = ?, NumeroSerie = ?, Stock = ?, CategoriaId = ? 
                  WHERE CodigoProducto = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssddssss", $nombre, $descripcion, $precio, $impuestos, $numeroSerie, $stock, $categoriaId, $codigoProducto);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar un producto
    public function eliminar($codigoProducto) {
        $query = "DELETE FROM productos WHERE CodigoProducto = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $codigoProducto); 
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
