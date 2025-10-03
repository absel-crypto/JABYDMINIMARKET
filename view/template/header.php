 <?php
// header.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JABYD Minimarket</title>
    
    <!-- Descripción y SEO -->
    <meta name="description" content="JABYD Minimarket: Tu tienda de confianza con productos frescos, ofertas y todo lo que necesitas para tu hogar.">
    <meta name="keywords" content="jabyd, minimarket, supermercado, compras, ofertas, productos, hogar, alimentos">
    <meta name="author" content="JABYD Minimarket">

    <!-- Favicon -->
    <link rel="icon" href="assets/favicon.png" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Archivo de estilos externo -->
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
                <a href="carrito.php"><i class="fas fa-shopping-cart"></i> Carrito</a>
                <a href="login.php"><i class="fas fa-user"></i> Ingresar</a>
                <a href="ayuda.php"><i class="fas fa-circle-question"></i> Ayuda</a>
            </div>
        </div>

        <!-- Navegación -->
        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="ofertas.php">Ofertas</a></li>
                <li><a href="categorias.php">Categorías</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>