<?php
require_once 'conexion.php';
class Usuarios
{
    
    public static function RegistrarUsuarios($nombre, $contraseña)
    {
        // Obtener los datos del formulario
        global $con; // Acceder a la variable global $con
        //recorre los usuarios para verificar que no se repitan
        $consulta = $con->prepare("SELECT * FROM usuario WHERE nombre = ? ");
        $consulta->bind_param("s", $nombre);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        if ($resultado->num_rows == 0) {
        // Preparar la consulta
            $consulta = $con->prepare("INSERT INTO usuario (nombre, contraseña, tipoUsuario) VALUES (?, ?, 2)");
            $consulta->bind_param("ss", $nombre,$contraseña);
            $consulta->execute();
            $consulta->close();
            
            return true;
        }else{
            return false;
        }
       

    }
    public static function listarUsuarios()
    {
        global $con; // Acceder a la variable global $con
        $consulta = $con->prepare("SELECT * FROM usuario");
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        $usuarios = array();
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $usuarios[] = $row;
            }
        }
        return $usuarios;
    }
    public static function login($nombre, $contraseña)
    {
        global $con; 
        $consulta = $con->prepare("SELECT * FROM usuario WHERE nombre = ? AND contraseña = ?");
        $consulta->bind_param("ss", $nombre, $contraseña);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();

        if ($resultado->num_rows > 0) {
            $datos = $resultado->fetch_assoc(); // Obtener la fila de resultados
            return $datos;
        } else {
            return false;
        }
    }
    public static function insertarMensajes($nombre, $mensaje, $idUsuario)
    {
        global $con; // Acceder a la variable global $con
        $consulta = $con->prepare("INSERT INTO mensajes (nombre, mensaje, idUsuario) VALUES (?, ?, ?)");
        $consulta->bind_param("ssi", $nombre, $mensaje, $idUsuario);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }
    //lista todos los mensajes para el administrador
    public static function listarMensajes()
    {
        global $con; // Acceder a la variable global $con
        $consulta = $con->prepare("SELECT mensajes.id, mensajes.IdUsuario, mensajes.nombre AS nombre_mensaje, mensajes.mensaje, usuario.nombre AS nombre_usuario, usuario.tipoUsuario FROM mensajes INNER JOIN usuario ON mensajes.IdUsuario = usuario.idUsuario;");
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        $mensajes = array();
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $mensajes[] = $row;
            }
        }
        return $mensajes;
    }
    // Listar mensajes enviados por el usuario
    public static function listarMensajesEnviados()
    {
        global $con; // Acceder a la variable global $con
        $consulta = $con->prepare("SELECT mensajes.id, mensajes.IdUsuario, mensajes.nombre AS nombre_mensaje, mensajes.mensaje, usuario.nombre AS nombre_usuario, usuario.tipoUsuario 
            FROM mensajes 
            INNER JOIN usuario ON mensajes.IdUsuario = usuario.idUsuario 
            WHERE usuario.idUsuario = ?");
        $consulta->bind_param("i", $_SESSION['id']);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        $mensajes = array();
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $mensajes[] = $row;
            }
        }
        return $mensajes;
    }
    public static function eliminarUsuario($id)
    {
        global $con; // Acceder a la variable global $con
        //BORRA EL USUARIO DE LA TABLA USUARIO
        $consulta = $con->prepare("DELETE FROM usuario WHERE idUsuario = ?");
        $consulta->bind_param("i", $id);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }
}
