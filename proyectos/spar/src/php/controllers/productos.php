<?php
$options = filter_input(INPUT_POST, "option", FILTER_SANITIZE_NUMBER_INT);
switch ($options) {
    case 1:
        require_once '../models/productos.php';
        $productos = productos::listarProductos();
       
        ?>

<table class="tablaProductos">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['descripcion']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        break;
}

    
