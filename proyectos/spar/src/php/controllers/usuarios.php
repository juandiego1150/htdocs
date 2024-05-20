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
                    $_SESSION['tipoUsuario'] = $datos['tipoUsuario'];
                    echo "1";
                } else {
                    echo "Error al iniciar sesión después del registro";
                }
            } else {
                echo "Error al registrar el usuario o el usuario ya existe";
            }
        }
        break;
    case 3:
        //carga la vista de administrador y lista los usuarios
        require_once '../models/usuarios.php';
        //controlamos que el usuario este registrado
        session_start();
        if (!isset($_SESSION['nombre']) || !isset($_SESSION['contraseña']) || !isset($_SESSION['id'])) {
            echo "No estas registrado";
            break;
        }
        //controlamos que el usuario sea administrador
        if ($_SESSION['tipoUsuario'] != 1) {
            echo "No eres administrador";
            break;
        }
        $usuarios = Usuarios::listarUsuarios();
        include '../views/administrador.php';
        break;
    case 4:
        //inicia sesion
        require_once '../models/usuarios.php';
        $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contraseña = filter_input(INPUT_POST, "contraseña", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($nombre == "" || $contraseña == "" || $nombre == null || $contraseña == null) {
            echo "1"; //faltan datos
        } else {
            $datos = Usuarios::login($nombre, $contraseña);
            if ($datos != false) {
                session_start();
                $_SESSION['nombre'] = $datos['nombre'];
                $_SESSION['contraseña'] = $datos;
                $_SESSION['id'] = $datos['idUsuario'];
                $_SESSION['tipoUsuario'] = $datos['tipoUsuario'];
                echo "2"; //bienvenido
            } else {
                echo "3"; //usuario o contraseña incorrectos
            }
        }
        break;
    case 5:
        session_start();
        //cierra sesion
        if (!isset($_SESSION['nombre']) || !isset($_SESSION['contraseña']) || !isset($_SESSION['id'])) {
            echo "No hay sesion iniciada";
        } else {
            session_unset();
            echo "Sesion cerrada";
        }
        session_destroy();
        break;
    case 6:
        session_start();
        if (!isset($_SESSION['nombre']) || !isset($_SESSION['contraseña']) || !isset($_SESSION['id'])) {
            echo 0;
        } else {
            echo 1;
        }
        break;
    case 7:
        session_start();
        if ($_SESSION['tipoUsuario'] == 2 || $_SESSION['tipoUsuario'] == '2') {
            echo 2;
        }
        break;
    case 8:
        //cargamos la vista de tablon de mensajes
        include '../views/tablonMensajes.php';
        break;
    case 9:
        //insertamos un mensaje
        require_once '../models/usuarios.php';
        $mensaje = filter_input(INPUT_POST, "mensaje", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        session_start();
        $idUsuario = $_SESSION['id'];
        if ($mensaje == "" || $mensaje == null) {
            echo "Mensaje vacio";
        } else {
            $mensajeInsertado = Usuarios::insertarMensajes($nombre, $mensaje, $idUsuario);
            if ($mensajeInsertado) {
                echo "Mensaje envidado";
            } else {
                echo "Error al insertar mensaje";
            }
        }
        break;
    case 10:
        //cargamos los mensajes
        require_once '../models/usuarios.php';
        session_start();
        if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == '1') {
            $mensajes = Usuarios::listarMensajes();
            include '../views/templates/mensajes.php';
        } else {
            $mensajes = Usuarios::listarMensajesEnviados();
            include '../views/templates/mensajes.php';
        }
        break;
    case 11:
        //llevamos el usuario a la vista si esta iniciada la sesion
        session_start();
        if (!isset($_SESSION['nombre']) || !isset($_SESSION['contraseña']) || !isset($_SESSION['id'])) {
            echo "";
        } else {
            echo $_SESSION['nombre'];
        }
        break;
    case 12:
        //eliminamos un usuario
        require_once '../models/usuarios.php';
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        $eliminado = Usuarios::eliminarUsuario($id);
        if ($eliminado) {
            echo 1;
        } else {
            echo 0;
        }
        break;
}
