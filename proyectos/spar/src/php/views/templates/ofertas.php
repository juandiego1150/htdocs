<div id="vistaOfertas" class="productos-container">
    <?php foreach ($productos as $producto): ?>
        <div class="producto-oferta">
            <img src="<?php echo $producto['nombreimagen']; ?>" alt="<?php echo $producto['nombre']; ?>" class="producto-imagen">
            <h2 class="producto-nombre-oferta"><?php echo $producto['nombre']; ?></h2>
            <p class="producto-descripcion-oferta"><?php echo $producto['descripcion']; ?></p>
            <p class="producto-precio-oferta"> <?php echo $producto['precio']; ?>€</p>
            <p class="producto-descuento-oferta"><?php echo $producto['descuento']; ?>% de descuento</p>
            <p class="producto-precio-descuento-oferta"><?php echo number_format($producto['precio'] - ($producto['precio'] * $producto['descuento'] / 100), 2); ?>€</p>
            <p class="producto-descripcion-oferta-oferta"><?php echo $producto['descripcionOferta']; ?></p>
            <button class="boton-favorito-oferta">Añadir a Favoritos</button>
        </div>
    <?php endforeach; ?>
</div>
