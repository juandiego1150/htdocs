<div id="vistaProductos" class="productos-container">
    <?php foreach ($productos as $producto): ?>
        <div class="producto">
            <!-- <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>" class="producto-imagen"> -->
            <h2 class="producto-nombre"><?php echo $producto['nombre']; ?></h2>
            <p class="producto-descripcion"><?php echo $producto['descripcion']; ?></p>
            <p class="producto-precio"><?php echo $producto['precio']; ?></p>
            <button class="boton-comprar">Comprar</button>
        </div>
    <?php endforeach; ?>
</div>
