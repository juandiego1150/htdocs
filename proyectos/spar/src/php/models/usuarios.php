<?php
class Usuarios
{
    public static function RegistrarUsuarios($nombre, $contrasena)
    {
        require_once 'conexion.php';
        // Obtener los datos del formulario
      
        // Encriptar la contraseña
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        // Preparar la consulta
        $consulta = $con->prepare("INSERT INTO usuarios (nombre, contrasena) VALUES (?, ?)");
        $consulta->bind_param("ss", $nombre,$contrasena);
        $consulta->execute();
        $consulta->close();

        
    }
    public static function CargarVista()
    {
        $htmlContent = file_get_contents('../views/register.php');

        echo $htmlContent
        ;
    }
}
