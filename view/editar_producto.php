<?php
include 'conexion.php';
include 'ProductoController.php';
$productoController = new ProductoController($conexion);

$mensaje = '';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php?page=productos');
    exit;
}

$id = intval($_GET['id']);
$producto = $productoController->obtenerPorId($id);

if (!$producto) {
    echo "Producto no encontrado.";
    exit;
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
        $sql = $conexion->prepare("DELETE FROM productos WHERE id=?");
        $sql->bind_param("i", $id);
        if ($sql->execute()) {
            header('Location: index.php?page=productos');
            exit;
        } else {
            $mensaje = "Error al eliminar el producto.";
        }
        $sql->close();
    } else {
        $nombre = trim($_POST['nombre']);
        $categoria = trim($_POST['categoria']);
        $precio = floatval($_POST['precio']);
        $imagen = trim($_POST['imagen']);

        if ($nombre && $categoria && $precio > 0 && $imagen) {
            $sql = $conexion->prepare("UPDATE productos SET nombre=?, categoria=?, precio=?, imagen=? WHERE id=?");
            $sql->bind_param("ssdsi", $nombre, $categoria, $precio, $imagen, $id);
            if ($sql->execute()) {
                $mensaje = "Producto actualizado correctamente.";
                $producto = $productoController->obtenerPorId($id);
            } else {
                $mensaje = "Error al actualizar el producto.";
            }
            $sql->close();
        } else {
            $mensaje = "Por favor completa todos los campos correctamente.";
        }
    }
}
?>

<?php include 'header.php'; ?>

<div style="max-width:500px;margin:50px auto;padding:20px;background:#fff;border-radius:10px;box-shadow:0 4px 10px rgba(0,0,0,0.2);">
    <h2>Editar Producto</h2>

    <?php if($mensaje): ?>
        <p style="color:<?= strpos($mensaje,'Error')!==false?'red':'green' ?>;"><?= $mensaje ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required style="width:100%;padding:10px;margin-bottom:10px;">
        <select name="categoria" required style="width:100%;padding:10px;margin-bottom:10px;">
            <option value="">Selecciona categoría</option>
            <option value="Frutas y Verduras" <?= $producto['categoria']=='Frutas y Verduras'?'selected':'' ?>>Frutas y Verduras</option>
            <option value="Lácteos y Derivados" <?= $producto['categoria']=='Lácteos y Derivados'?'selected':'' ?>>Lácteos y Derivados</option>
            <option value="Bebidas" <?= $producto['categoria']=='Bebidas'?'selected':'' ?>>Bebidas</option>
            <option value="Aseo y Hogar" <?= $producto['categoria']=='Aseo y Hogar'?'selected':'' ?>>Aseo y Hogar</option>
            <option value="Snacks y Otros" <?= $producto['categoria']=='Snacks y Otros'?'selected':'' ?>>Snacks y Otros</option>
        </select>
        <input type="number" step="0.01" name="precio" placeholder="Precio" value="<?= $producto['precio'] ?>" required style="width:100%;padding:10px;margin-bottom:10px;">
        <input type="text" name="imagen" placeholder="URL imagen" value="<?= htmlspecialchars($producto['imagen']) ?>" required style="width:100%;padding:10px;margin-bottom:10px;">
        <button type="submit" style="width:100%;padding:10px;background:#ff9800;border:none;color:#fff;border-radius:5px;margin-bottom:10px;">Actualizar Producto</button>
        <button type="submit" name="accion" value="eliminar" style="width:100%;padding:10px;background:#f44336;border:none;color:#fff;border-radius:5px;" onclick="return confirm('¿Eliminar este producto?')">Eliminar Producto</button>
    </form>
</div>

<?php include 'footer.php'; ?>

<?php
// Editar producto
function editarProducto($conexion, $id, $nombre, $categoria, $precio, $imagen) {
    $sql = $conexion->prepare("UPDATE productos SET nombre=?, categoria=?, precio=?, imagen=? WHERE id=?");
    $sql->bind_param("ssdsi", $nombre, $categoria, $precio, $imagen, $id);
    $resultado = $sql->execute();
    $sql->close();
    return $resultado;
}

// Eliminar producto
function eliminarProducto($conexion, $id) {
    $sql = $conexion->prepare("DELETE FROM productos WHERE id=?");
    $sql->bind_param("i", $id);
    $resultado = $sql->execute();
    $sql->close();
    return $resultado;
}
?>