include 'header.php'; // Incluye el encabezado
?>

<main>
    <!-- Banner principal -->
    <section class="banner">
        <h1>Bienvenido a JABYD Minimarket</h1>
        <p>Todo lo que necesitas para tu hogar, al mejor precio.</p>
        <a href="productos.php" class="btn">Comprar Ahora</a>
    </section>

    <!-- Sección de productos destacados -->
    <section class="destacados">
        <h2>Productos Destacados</h2>
        <div class="productos">
            <div class="producto">
                <img src="assets/arroz.jpg" alt="Arroz">
                <h3>Arroz 5kg</h3>
                <p>$19.900</p>
            </div>
            <div class="producto">
                <img src="assets/leche.jpg" alt="Leche">
                <h3>Leche Entera 1L</h3>
                <p>$3.800</p>
            </div>
            <div class="producto">
                <img src="assets/jabon.jpg" alt="Jabón">
                <h3>Jabón en Polvo 1kg</h3>
                <p>$9.900</p>
            </div>
        </div>
    </section>
</main>

<?php
include 'footer.php'; // Incluye el pie de página