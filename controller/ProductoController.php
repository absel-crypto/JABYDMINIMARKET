<?php
include 'ProductoModel.php';

class ProductoController {
    private $model;

    public function __construct($conexion) {
        $this->model = new ProductoModel($conexion);
    }

    public function obtenerTodos() {
        return $this->model->getAllProductos();
    }

    public function obtenerPorCategoria($categoria) {
        return $this->model->getProductosPorCategoria($categoria);
    }

    public function obtenerPorId($id) {
        return $this->model->getProductoById($id);
    }

    // Función opcional para buscar productos por nombre
    public function buscarPorNombre($nombre) {
        $sql = "SELECT * FROM productos WHERE nombre LIKE ?";
        $stmt = $this->model->conexion->prepare($sql);
        $likeNombre = "%".$nombre."%";
        $stmt->bind_param("s", $likeNombre);
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
}
?>
