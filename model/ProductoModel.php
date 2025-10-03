<?php
include 'conexion.php';

class ProductoModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getAllProductos() {
        $sql = "SELECT * FROM productos ORDER BY categoria, nombre";
        $resultado = $this->conexion->query($sql);

        $productos = [];
        if($resultado && $resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                $productos[] = $fila;
            }
        }
        return $productos;
    }

    public function getProductosPorCategoria($categoria) {
        $stmt = $this->conexion->prepare("SELECT * FROM productos WHERE categoria = ? ORDER BY nombre");
        $stmt->bind_param("s", $categoria);
        $stmt->execute();
        $resultado = $stmt->get_result();

        $productos = [];
        if($resultado && $resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                $productos[] = $fila;
            }
        }
        $stmt->close();
        return $productos;
    }

    public function getProductoById($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $producto = null;

        if($resultado && $resultado->num_rows > 0) {
            $producto = $resultado->fetch_assoc();
        }
        $stmt->close();
        return $producto;
    }

    // ======================================================
    // NUEVA FUNCIÓN: Insertar un nuevo producto
    // ======================================================
    public function insertarProducto($nombre, $categoria, $precio, $imagen) {
        $stmt = $this->conexion->prepare("INSERT INTO productos (nombre, categoria, precio, imagen) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $nombre, $categoria, $precio, $imagen);
        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado; // Devuelve true si se insertó correctamente
    }
}
?>