<?php
// index.php
// Enrutador y controlador principal - Minimarket JABYD

// Página por defecto
$default_page = 'home';
$page = $default_page;

// Lista de páginas permitidas
$allowed_pages = ['home', 'productos', 'contactos', 'ofertas', 'categorias'];

// Revisar si se recibió el parámetro 'page' por URL
if (isset($_GET['page'])) {
    $requested_page = basename($_GET['page']); // Evita rutas maliciosas

    // Validar que la página esté permitida y el archivo exista
    if (in_array($requested_page, $allowed_pages) && file_exists($requested_page . '.php')) {
        $page = $requested_page;
    } else {
        // Página inválida → usar home como fallback
        $page = $default_page;
    }
}

// ===== Cargar la vista =====

// Incluir header
include 'header.php';

// Incluir página central (contenido dinámico)
include $page . '.php';

// Incluir footer
include 'footer.php';
?>
