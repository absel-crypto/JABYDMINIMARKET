<?php
session_start();

// Página por defecto
$default_page = 'home';
$page = $default_page;

// Lista de páginas permitidas
$allowed_pages = [
    'home',
    'productos',
    'contactos',
    'ofertas',
    'categorias',
    'login',
    'logout',
    '404'
];

// Páginas reservadas para administradores
$admin_pages = [
    'nuevo_producto',
    'usuarios'
];

// Revisar si se recibió el parámetro 'page' por URL
if (isset($_GET['page'])) {
    $requested_page = basename($_GET['page']); // Evita rutas maliciosas

    if (in_array($requested_page, $allowed_pages) || in_array($requested_page, $admin_pages)) {
        // Validar permisos si es página de admin
        if (in_array($requested_page, $admin_pages)) {
            if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin') {
                $file_path = $requested_page . '.php';
                $page = file_exists($file_path) ? $requested_page : '404';
            } else {
                // No tiene permisos → redirigir a home
                $page = 'home';
            }
        } else {
            $file_path = $requested_page . '.php';
            $page = file_exists($file_path) ? $requested_page : '404';
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