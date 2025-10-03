<?php
// conexion.php
// Conexión a la base de datos JABYD Minimarket

$host = "localhost";          // Servidor MySQL
$usuario = "root";            // Usuario MySQL
$password = "";               // Contraseña MySQL
$base_datos = "jabyd_market"; // Nombre de la base de datos

// Crear la conexión
$conexion = new mysqli($host, $usuario, $password, $base_datos);

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Configurar caracteres UTF-8 para evitar problemas con acentos
$conexion->set_charset("utf8mb4");

// Función opcional para cerrar la conexión
function cerrarConexion($conexion) {
    if($conexion) {
        $conexion->close();
    }
}