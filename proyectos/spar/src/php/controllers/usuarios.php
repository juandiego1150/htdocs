<?php
$options = filter_input(INPUT_POST, "option", FILTER_SANITIZE_NUMBER_INT);

switch ($options) {
    case 1:
        require_once '../models/usuarios.php';
        $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contrasena = filter_input(INPUT_POST, "contrasena", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        Usuarios::RegistrarUsuarios($nombre, $contrasena);

        $htmlContent = file_get_contents('views/register.php');
        return $htmlContent;
        break;
    case 2:
        require_once '../models/usuarios.php';
        Usuarios::CargarVista();
        
    
}
