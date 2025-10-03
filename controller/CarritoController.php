<?php
require_once 'ProductoModel.php';

class CarritoController {
    private $productoModel;

    public function __construct($conexion) {
        $this->productoModel = new ProductoModel($conexion);
        if (!isset($_SESSION)) {
            session_start();
        }
        // Inicializar carrito en sesión si no existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
    }

    // Agregar producto al carrito
    public function agregarProducto($productoId, $cantidad = 1) {
        $producto = $this->productoModel->getProductoById($productoId);
        if ($producto) {
            // Si ya está en el carrito, sumamos cantidad
            if (isset($_SESSION['carrito'][$productoId])) {
                $_SESSION['carrito'][$productoId]['cantidad'] += $cantidad;
            } else {
                $_SESSION['carrito'][$productoId] = [
                    'id' => $producto['id'],
                    'nombre' => $producto['nombre'],
                    'precio' => $producto['precio'],
                    'cantidad' => $cantidad,
                    'imagen' => $producto['imagen'],
                    'categoria' => $producto['categoria']
                ];
            }
            return true;
        }
        return false;
    }

    // Eliminar producto del carrito
    public function eliminarProducto($productoId) {
        if (isset($_SESSION['carrito'][$productoId])) {
            unset($_SESSION['carrito'][$productoId]);
            return true;
        }
        return false;
    }

    // Actualizar cantidad de un producto
    public function actualizarCantidad($productoId, $cantidad) {
        if (isset($_SESSION['carrito'][$productoId])) {
            if ($cantidad > 0) {
                $_SESSION['carrito'][$productoId]['cantidad'] = $cantidad;
            } else {
                // Si cantidad <= 0, eliminar producto
                $this->eliminarProducto($productoId);
            }
            return true;
        }
        return false;
    }

    // Obtener todo