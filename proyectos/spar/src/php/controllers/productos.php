<?php
$options = filter_input(INPUT_POST, "option", FILTER_SANITIZE_NUMBER_INT);
switch ($options) {
    case 1:
        //listamos los productos
        require_once '../models/productos.php';
        $productos = Productos::listarProductos();
        include '../views/productosVista.php'; 
        break;
    case 2:
        //listamos las ofertas
        require_once '../models/productos.php';
        //listamos las ofertas
        $productos = Productos::listarOfertas();
        include '../views/ofertasVista.php';
        
}

    
