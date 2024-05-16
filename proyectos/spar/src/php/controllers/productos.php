<?php
$options = filter_input(INPUT_POST, "option", FILTER_SANITIZE_NUMBER_INT);
switch ($options) {
    case 1:
        require_once '../models/productos.php';
        $productos = Productos::listarProductos();
        include '../views/templates/productos.php'; 
        break;
    case 2:
        
}

    
