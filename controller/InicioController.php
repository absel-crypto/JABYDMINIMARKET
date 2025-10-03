<?php
require_once 'ProductoModel.php';

class InicioController {
    private $productoModel;

    public function __construct($conexion) {
        $this->productoModel = new ProductoModel($conexion);
    }

    // Obtener productos destacados (ej: los primeros N productos)
    public function obtenerProductosDestacados($cantidad = 6) {
        $todos = $this->productoModel->getAllProductos();
        return array_slice($todos, 0, $cantidad);
    }

    // Obtener productos por categoría (opcional)
    public function obtenerProductosPorCategoria($categoria) {
        return $this->productoModel->getProductosPorCategoria($categoria);
    }

    // Obtener ofertas de la semana (ejemplo hardcodeado, luego puede venir de BD)
    public function obtenerOfertas() {
        return [
            ['nombre' => 'Banano 2x1', 'descripcion' => 'Solo esta semana'],
            ['nombre' => 'Leche Entera $3.500', 'descripcion' => 'Precio especial'],
            ['nombre' => 'Chocoramo $2.500', 'descripcion' => 'Oferta limitada']
        ];
    }

    // Función opcional para buscar productos desde el inicio
    public function buscarProductos($nombre) {
        return $this->productoModel->buscarPorNombre($nombre);
    }
}