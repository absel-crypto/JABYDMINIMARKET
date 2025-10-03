<?php
require_once 'UsuarioController.php';
$usuarioController = new UsuarioController($conexion);

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email && $password) {
        $usuario = $usuarioController->login($email, $password);
        if ($usuario) {
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['usuario_rol'] = $usuario['rol'];
            header('Location: index.php?page=home');
            exit;
        } else {
            $mensaje = 'Usuario o contraseña incorrectos';
        }
    } else {
        $mensaje = 'Por favor completa todos los campos';
    }
}
?>

<?php include 'header.php'; ?>

<div style="max-width:400px;margin:50px auto;padding:20px;background:#fff;border-radius:10px;box-shadow:0 4px 10px rgba(0,0,0,0.2);">
    <h2>Login</h2>
    <?php if($mensaje): ?>
        <p style="color:red;"><?= $mensaje ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Correo electrónico" required style="width:100%;padding:10px;margin-bottom:10px;">
        <input type="password" name="password" placeholder="Contraseña" required style="width:100%;padding:10px;margin-bottom:10px;">
        <button type="submit" style="width:100%;padding:10px;background:#ff9800;border:none;color:#fff;border-radius:5px;">Ingresar</button>
    </form>
</div>

<?php include 'footer.php'; ?>