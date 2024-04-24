<?php
require_once 'conexion.php';
class Usuarios
{
    
    public static function RegistrarUsuarios($nombre, $contraseña)
    {
        // Obtener los datos del formulario
        global $con; // Acceder a la variable global $con
        // Preparar la consulta
        $consulta = $con->prepare("INSERT INTO usuario (nombre, contraseña) VALUES (?, ?)");
        $consulta->bind_param("ss", $nombre,$contraseña);
        $consulta->execute();
        $consulta->close();
        
        return true;

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
}
