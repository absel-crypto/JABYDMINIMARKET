<?php
// index.php
// Enrutador y controlador principal - Minimarket JABYD

session_start();

// Página por defecto
$default_page = 'inicio';
$page = $default_page;

// Lista de páginas permitidas
$allowed_pages = [
    'inicio',           // Página de inicio
    'home',             // Alias opcional
    'productos',        // Lista de productos
    'contactos',        // Contacto
    'ofertas',          // Ofertas
    'categorias',       // Categorías
    'nuevo_producto',   // Formulario para agregar productos
    'editar_producto',  // Editar productos
    'login',            // Inicio de sesión
    'logout',           // Cerrar sesión
    'carrito',          // Carrito de compras
    '404'               // Página de error
];

// Revisar si se recibió el parámetro 'page' por URL
if (isset($_GET['page'])) {
    $requested_page = basename($_GET['page']); // Evita rutas maliciosas

    if (in_array($requested_page, $allowed_pages)) {

        // Validar permisos para páginas de administración
        if (in_array($requested_page, ['nuevo_producto','editar_producto'])) {
            if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
                // No tiene permisos → redirigir a login
                header('Location: index.php?page=login');
                exit;
            }
        }

        $file_path = $requested_page . '.php';
        if (file_exists($file_path)) {
            $page = $requested_page;
        } else {
            $page = '404';
        }

    } else {
        $page = '404';
    }
}

// ===== Cargar la vista =====
include 'header.php';
include $page . '.php';
include 'footer.php';
?>