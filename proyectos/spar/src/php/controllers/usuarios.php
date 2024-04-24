<?php
$options = filter_input(INPUT_POST, "option", FILTER_SANITIZE_NUMBER_INT);

switch ($options) {
  
    case 1:
        //carga la vista de registro sin pasar por el modelo
        include '../views/register.php';
        break;
    case 2:
        //registra un usuario
        // Registra un usuario
        require_once '../models/usuarios.php';
        $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contraseña = filter_input(INPUT_POST, "contraseña", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($nombre == "" || $contraseña == "" || $nombre == null || $contraseña == null) {
            echo "Faltan datos o son incorrectos";
        } else {
            // Intenta registrar el usuario
            $registroExitoso = Usuarios::RegistrarUsuarios($nombre, $contraseña);
            if ($registroExitoso) {
                 // Si el registro fue exitoso, intenta iniciar sesión automáticamente
            $datos = Usuarios::login($nombre, $contraseña);
            if ($datos != false) {
                // Iniciar sesión
                session_start();
                $_SESSION['nombre'] = $datos['nombre'];
                $_SESSION['id'] = $datos['idUsuario'];
                $_SESSION['contraseña'] = $datos['contraseña'];
                echo "Usuario registrado y sesión iniciada";
            } else {
                echo "Error al iniciar sesión después del registro";
            }
            } else {
                echo "Error al registrar el usuario";
            }
        }
    break;
    case 3:
        //carga la vista de administrador y lista los usuarios
        require_once '../models/usuarios.php';
        $usuarios= Usuarios::listarUsuarios();
        include '../views/administrador.php';
        break;
    case 4:
        //inicia sesion
        require_once '../models/usuarios.php';
        $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contraseña = filter_input(INPUT_POST, "contraseña", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($nombre == "" || $contraseña == "" || $nombre == null || $contraseña == null) {
            echo "Faltan datos o son incorrectos";;
        }else{
            $datos = Usuarios::login($nombre, $contraseña);
            if($datos != false){
                session_start();
                $_SESSION['nombre'] = $datos['nombre'];
                $_SESSION['contraseña'] = $datos;
                $_SESSION['id'] = $datos['idUsuario'];
                echo "Bienvenido";
            }else{
                echo "Usuario o contraseña incorrectos";
            }
        }
        break;
    case 5:
        session_start();
        //cierra sesion
        if (!isset($_SESSION['nombre']) || !isset($_SESSION['contraseña']) || !isset($_SESSION['id'])){
            echo "No hay sesion iniciada";
        }else{
            session_unset();
            echo "Sesion cerrada";
        }
        session_destroy();
        break;
        
}