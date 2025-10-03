include 'header.php'; // Incluye el header
?>

<main>
    <section class="productos-page">
        <h1>Productos - JABYD Minimarket</h1>
        <p>Explora nuestro catálogo de productos frescos y a los mejores precios.</p>

        <!-- Frutas y Verduras -->
        <h2>Frutas y Verduras</h2>
        <div class="productos">
            <div class="producto">
                <img src="assets/frutas/banano.jpg" alt="Banano">
                <h3>Banano (Kg)</h3>
                <p class="precio">$3.200</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
            <div class="producto">
                <img src="assets/frutas/manzana.jpg" alt="Manzana Roja">
                <h3>Manzana Roja (Kg)</h3>
                <p class="precio">$6.500</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
            <div class="producto">
                <img src="assets/frutas/tomate.jpg" alt="Tomate Chonto">
                <h3>Tomate Chonto (Kg)</h3>
                <p class="precio">$4.200</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
            <div class="producto">
                <img src="assets/frutas/papa.jpg" alt="Papa Pastusa">
                <h3>Papa Pastusa (Kg)</h3>
                <p class="precio">$3.800</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
        </div>

        <!-- Lácteos -->
        <h2>Lácteos y Derivados</h2>
        <div class="productos">
            <div class="producto">
                <img src="assets/lacteos/leche.jpg" alt="Leche Entera">
                <h3>Leche Entera (1L)</h3>
                <p class="precio">$4.200</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
            <div class="producto">
                <img src="assets/lacteos/queso.jpg" alt="Queso Campesino">
                <h3>Queso Campesino (500g)</h3>
                <p class="precio">$8.500</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
            <div class="producto">
                <img src="assets/lacteos/yogurt.jpg" alt="Yogurt Fresa">
                <h3>Yogurt de Fresa (1L)</h3>
                <p class="precio">$7.000</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
        </div>

        <!-- Bebidas -->
        <h2>Bebidas</h2>
        <div class="productos">
            <div class="producto">
                <img src="assets/bebidas/coca_cola.jpg" alt="Coca Cola">
                <h3>Coca Cola (1.5L)</h3>
                <p class="precio">$5.500</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
            <div class="producto">
                <img src="assets/bebidas/jugo_hit.jpg" alt="Jugo HIT">
                <h3>Jugo HIT (1.5L)</h3>
                <p class="precio">$4.200</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
            <div class="producto">
                <img src="assets/bebidas/agua.jpg" alt="Agua Brisa">
                <h3>Agua Brisa (600ml)</h3>
                <p class="precio">$2.000</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
        </div>

        <!-- Aseo y Hogar -->
        <h2>Aseo y Hogar</h2>
        <div class="productos">
            <div class="producto">
                <img src="assets/aseo/jabon.jpg" alt="Jabón en Polvo">
                <h3>Jabón en Polvo (1Kg)</h3>
                <p class="precio">$10.500</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
            <div class="producto">
                <img src="assets/aseo/shampoo.jpg" alt="Shampoo Savital">
                <h3>Shampoo Savital (550ml)</h3>
                <p class="precio">$13.000</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
            <div class="producto">
                <img src="assets/aseo/papel.jpg" alt="Papel Higiénico Familia">
                <h3>Papel Higiénico Familia (4 rollos)</h3>
                <p class="precio">$8.000</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
        </div>

        <!-- Snacks -->
        <h2>Snacks y Otros</h2>
        <div class="productos">
            <div class="producto">
                <img src="assets/snacks/margarita.jpg" alt="Papas Margarita">
                <h3>Papas Margarita (25g)</h3>
                <p class="precio">$2.200</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
            <div class="producto">
                <img src="assets/snacks/chocoramo.jpg" alt="Chocoramo">
                <h3>Chocoramo</h3>
                <p class="precio">$3.000</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
            <div class="producto">
                <img src="assets/snacks/jet.jpg" alt="Chocolate Jet">
                <h3>Chocolate Jet (12g)</h3>
                <p class="precio">$1.000</p>
                <a href="carrito.php" class="btn">Agregar</a>
            </div>
        </div>
    </section>
</main>

<?php
include 'ProductoController.php';
$productoController = new ProductoController($conexion);
$productos = $productoController->obtenerTodos();

foreach($productos as $p): ?>
    <a href="editar_producto.php?id=<?= $p['id'] ?>">Editar</a> |
    <a href="eliminar_producto.php?id=<?= $p['id'] ?>" onclick="return confirm('¿Eliminar este producto?')">Eliminar</a>
<?php endforeach; ?>

<?php
include 'footer.php'; // Incluye el footer