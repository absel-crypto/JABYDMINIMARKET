<?php
require_once 'UsuarioModel.php';
require_once 'conexion.php';

class UsuarioController {
    private $model;

    public function __construct($conexion) {
        $this->model = new UsuarioModel($conexion);
    }

    // Obtener todos los usuarios
    public function obtenerTodos() {
        return $this->model->getAllUsuarios();
    }

    // Obtener usuario por ID
    public function obtenerPorId($id) {
        return $this->model->getUsuarioById($id);
    }

    // Agregar nuevo usuario
    public function agregar($nombre, $email, $password, $rol = 'cliente') {
        return $this->model->agregarUsuario($nombre, $email, $password, $rol);
    }

    // Actualizar usuario
    public function actualizar($id, $nombre, $email, $rol) {
        return $this->model->actualizarUsuario($id, $nombre, $email, $rol);
    }

    // Eliminar usuario
    public function eliminar($id) {
        return $this->model->eliminarUsuario($id);
    }

    // Validar login
    public function login($email, $password) {
        return $this->model->login($email, $password);
    }
}
?>