<?php
require_once 'conexion.php';

class UsuarioModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getAllUsuarios() {
        $sql = "SELECT id, nombre, email, rol, fecha_registro FROM usuarios ORDER BY id";
        $resultado = $this->conexion->query($sql);
        $usuarios = [];
        if($resultado && $resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                $usuarios[] = $fila;
            }
        }
        return $usuarios;
    }

    public function getUsuarioById($id) {
        $stmt = $this->conexion->prepare("SELECT id, nombre, email, rol, fecha_registro FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = null;
        if($resultado && $resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
        }
        $stmt->close();
        return $usuario;
    }

    public function agregarUsuario($nombre, $email, $password, $rol = 'cliente') {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $email, $password_hashed, $rol);
        $resultado = $stmt->execute();
        $stmt->close();
        return $resultado;
    }

    public function actualizarUsuario($id, $nombre, $email, $rol) {
        $stmt = $this->conexion->prepare("UPDATE usuarios SET nombre=?, email=?, rol=? WHERE id=?");
        $stmt->bind_param("sssi", $nombre, $email, $rol, $id);
        $resultado = $stmt->execute();
        $stmt->close();
        return $resultado;
    }

    public function eliminarUsuario($id) {
        $stmt = $this->conexion->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->bind_param("i", $id);
        $resultado = $stmt->execute();
        $stmt->close();
        return $resultado;
    }

    public function login($email, $password) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->e