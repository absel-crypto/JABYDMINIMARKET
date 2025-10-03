<?php
session_start();
include 'conexion.php';
include 'ProductoModel.php';

// Crear controlador
$productoController = new ProductoModel($conexion);

// Verificar que se reciba el ID del producto
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idProducto = intval($_GET['id']);

    // Obtener producto por ID
    $producto = $productoController->obtenerPorId($idProducto);

    if ($producto) {
        // Inicializar carrito si no existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Si el producto ya está en el carrito, aumentar cantidad
        if (isset($_SESSION['carrito'][$idProducto])) {
            $_SESSION['carrito'][$idProducto]['cantidad']++;
        } else {
            // Agregar producto al carrito
            $_SESSION['carrito'][$idProducto] = [
                'id' => $producto['id'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'imagen' => $producto['imagen'],
                'cantidad' => 1
            ];
        }

        // Redirigir al carrito o volver a productos
        header("Location: carrito.php");
        exit;
    } else {
        // Producto no encontrado
        echo "<h2>Producto no encontrado</h2>";
        echo "<a href='index.php?page=productos'>Volver a productos</a>";
    }
} else {
    // ID inválido
    echo "<h2>ID de producto inválido</h2>";
    echo "<a href='index.php?page=productos'>Volver a productos</a>";
}
?>