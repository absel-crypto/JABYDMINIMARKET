<?php
require_once 'ProductoController.php';
$productoController = new ProductoController($conexion);

// Obtener productos destacados (los 6 primeros)
$productosDestacados = array_slice($productoController->obtenerTodos(), 0, 6);

// Opcional: mensajes de bienvenida
$usuarioNombre = isset($_SESSION['usuario_nombre']) ? $_SESSION['usuario_nombre'] : null;
?>

<main>
    <!-- Banner principal -->
    <section class="banner-home" style="background:url('assets/banner.jpg') no-repeat center center; background-size:cover; height:400px; display:flex; align-items:center; justify-content:center; color:#fff; text-shadow: 2px 2px 5px rgba(0,0,0,0.5);">
        <div style="text-align:center;">
            <h1 style="font-size:3rem; margin-bottom:10px;">Bienvenido a JABYD Minimarket</h1>
            <p style="font-size:1.2rem;">Todo lo que necesitas para tu hogar y tu día a día, ¡a los mejores precios!</p>
            <a href="index.php?page=productos" style="padding:12px 25px; background:#ff9800; color:#fff; text-decoration:none; font-weight:bold; border-radius:5px; margin-top:15px; display:inline-block;">Ver Productos</a>
        </div>
    </section>

    <!-- Mensaje de bienvenida personalizado -->
    <?php if($usuarioNombre): ?>
        <section style="padding:20px; text-align:center; background:#f9f9f9; margin-top:20px; border-radius:8px;">
            <h2>Hola, <?= htmlspecialchars($usuarioNombre) ?> 👋</h2>
            <p>Gracias por visitarnos, descubre nuestras ofertas y productos frescos de hoy.</p>
        </section>
    <?php endif; ?>

    <!-- Sección de categorías -->
    <section class="categorias-home" style="padding:40px 20px; background:#fff;">
        <h2 style="text-align:center; font-size:2rem; margin-bottom:30px;">Explora nuestras categorías</h2>
        <div class="grid-categorias" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:20px;">
            <a href="index.php?page=productos&categoria=Frutas" style="text-decoration:none; color:#000; text-align:center;">
                <img src="assets/frutas/banano.jpg" alt="Frutas" style="width:100%; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.2);">
                <h3 style="margin-top:10px;">Frutas y Verduras</h3>
            </a>
            <a href="index.php?page=productos&categoria=Lácteos" style="text-decoration:none; color:#000; text-align:center;">
                <img src="assets/lacteos/leche.jpg" alt="Lácteos" style="width:100%; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.2);">
                <h3 style="margin-top:10px;">Lácteos y Derivados</h3>
            </a>
            <a href="index.php?page=productos&categoria=Bebidas" style="text-decoration:none; color:#000; text-align:center;">
                <img src="assets/bebidas/coca_cola.jpg" alt="Bebidas" style="width:100%; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.2);">
                <h3 style="margin-top:10px;">Bebidas</h3>
            </a>
            <a href="index.php?page=productos&categoria=Snacks" style="text-decoration:none; color:#000; text-align:center;">
                <img src="assets/snacks/margarita.jpg" alt="Snacks" style="width:100%; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.2);">
                <h3 style="margin-top:10px;">Snacks y Otros</h3>
            </a>
            <a href="index.php?page=productos&categoria=Aseo" style="text-decoration:none; color:#000; text-align:center;">
                <img src="assets/aseo/jabon.jpg" alt="Aseo" style="width:100%; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.2);">
                <h3 style="margin-top:10px;">Aseo y Hogar</h3>
            </a>
        </div>
    </section>

    <!-- Sección de productos destacados -->
    <section class="productos-destacados" style="padding:40px 20px; background:#f4f4f4;">
        <h2 style="text-align:center; font-size:2rem; margin-bottom:30px;">Productos Destacados</h2>
        <div class="grid-productos" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:20px;">
            <?php foreach($productosDestacados as $producto): ?>
                <div class="producto" style="background:#fff; border-radius:10px; padding:15px; text-align:center; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
                    <img src="assets/<?= htmlspecialchars($producto['categoria']) ?>/<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>" style="width:100%; border-radius:8px; margin-bottom:10px;">
                    <h3><?= htmlspecialchars($producto['nombre']) ?></h3>
                    <p style="font-weight:bold; color:#ff9800;">$<?= number_format($producto['precio'],0,",",".") ?></p>
                    <a href="carrito.php?id=<?= $producto['id'] ?>" style="padding:10px 20px; background:#ff9800; color:#fff; text-decoration:none; border-radius:5px; display:inline-block; margin-top:10px;">Agregar</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Sección de ofertas -->
    <section class="ofertas-home" style="padding:40px 20px; background:#fff;">
        <h2 style="text-align:center; font-size:2rem; margin-bottom:30px;">Ofertas de la Semana</h2>
        <div class="grid-ofertas" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:20px;">
            <div style="background:#ffeb3b; border-radius:10px; padding:15px; text-align:center;">
                <h3>Banano 2x1</h3>
                <p>Solo esta semana</p>
            </div>
            <div style="background:#ffeb3b; border-radius:10px; padding:15px; text-align:center;">
                <h3>Leche Entera $3.500</h3>
                <p>Precio especial</p>
            </div>
            <div style="background:#ffeb3b; border-radius:10px; padding:15px; text-align:center;">
                <h3>Chocoramo $2.500</h3>
                <p>Oferta limitada</p>
            </div>
        </div>
    </section>

    <!-- Sección de llamada a la acción -->
    <section style="padding:40px 20px; background:#ff9800; color:#fff; text-align:center; border-radius:10px; margin:40px 20px;">
        <h2 style="font-size:2rem; margin-bottom:10px;">¿Listo para comprar?</h2>
        <p style="margin-bottom:20px;">Explora todos nuestros productos y agrega al carrito lo que necesites</p>
        <a href="index.php?page=productos" style="padding:12px 25px; background:#fff; color:#ff9800; text-decoration:none; font-weight:bold; border-radius:5px;">Ver Productos</a>
    </section>
</main>