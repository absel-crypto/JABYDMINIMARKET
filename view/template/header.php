<?php
session_start();
require_once 'conexion.php';
require_once 'CarritoController.php';

// Inicializar controlador del carrito
$carritoController = new CarritoController($conexion);
$carrito = $carritoController->obtenerCarrito();
$totalItemsCarrito = array_sum(array_column($carrito, 'cantidad'));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JABYD Minimarket</title>
    
    <meta name="description" content="JABYD Minimarket: Tu tienda de confianza con productos frescos, ofertas y todo lo que necesitas para tu hogar.">
    <meta name="keywords" content="jabyd, minimarket, supermercado, compras, ofertas, productos, hogar, alimentos">
    <meta name="author" content="JABYD Minimarket">

    <link rel="icon" href="assets/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="top-bar">
            <!-- Logo -->
            <div class="logo">
                <a href="index.php">
                    <img src="assets/logo.png" alt="Logo JABYD">
                    JABYD Minimarket
                </a>
            </div>

            <!-- Barra de búsqueda -->
            <div class="search-bar">
                <form action="buscar.php" method="get">
                    <input type="text" name="q" placeholder="Buscar productos...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <!-- Acciones usuario -->
            <div class="user-actions">
                <a href="index.php?page=carrito">
                    <i class="fas fa-shopping-cart"></i> Carrito
                    <?php if($totalItemsCarrito > 0): ?>
                        <span class="carrito-count"><?= $totalItemsCarrito ?></span>
                    <?php endif; ?>
                </a>

                <?php if(isset($_SESSION['usuario_nombre'])): ?>
                    <span>Hola, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?></span>
                    <a href="index.php?page=logout"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
                <?php else: ?>
                    <a href="index.php?page=login"><i class="fas fa-user"></i> Ingresar</a>
                <?php endif; ?>

                <a href="index.php?page=ayuda"><i class="fas fa-circle-question"></i> Ayuda</a>
            </div>
        </div>

        <!-- Navegación -->
        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php?page=productos">Productos</a></li>
                <li><a href="index.php?page=ofertas">Ofertas</a></li>
                <li><a href="index.php?page=categorias">Categorías</a></li>
                <li><a href="index.php?page=contactos">Contacto</a></li>
            </ul>
        </nav>
    </header>