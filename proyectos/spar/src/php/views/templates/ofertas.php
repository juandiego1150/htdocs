<div id="vistaOfertas" class="productos-container">
    <?php foreach ($productos as $producto): ?>
        <div class="producto">
            <img src="<?php echo $producto['nombreimagen']; ?>" alt="<?php echo $producto['nombre']; ?>" class="producto-imagen">
            <h2 class="producto-nombre"><?php echo $producto['nombre']; ?></h2>
            <p class="producto-descripcion"><?php echo $producto['descripcion']; ?></p>
            <p class="producto-precio"> <?php echo $producto['precio']; ?>€</p>
            <p class="producto-descuento"><?php echo $producto['descuento']; ?>% de descuento</p>
            <p class="producto-precio-descuento"><?php echo number_format($producto['precio'] - ($producto['precio'] * $producto['descuento'] / 100), 2); ?>€</p>
            <p class="producto-descripcion-oferta"><?php echo $producto['descripcionOferta']; ?></p>
            <button class="boton-favorito">Añadir a Favoritos</button>
        </div>
    <?php endforeach; ?>
</div>
<style>
    /* Estructura general */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

.productos-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px;
}

/* Estilo de cada producto */
.producto {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 20px;
    width: 250px;
    transition: transform 0.2s, box-shadow 0.2s;
}

.producto:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.producto-imagen {
    width: 100%;
    height: auto;
    border-bottom: 1px solid #ddd;
    border-radius: 10px 10px 0 0;
    margin-bottom: 15px;
}

/* Tipografía y texto */
.producto-nombre {
    font-size: 1.5em;
    margin: 10px 0;
    color: #333;
    text-align: center;
}

.producto-descripcion,
.producto-descripcion-oferta {
    font-size: 1em;
    color: #666;
    margin: 10px 0;
}

.producto-precio,
.producto-precio-descuento,
.producto-descuento {
    font-size: 1.2em;
    font-weight: bold;
    color: #e74c3c;
    margin: 10px 0;
}

/* Descuentos y precios */
.producto-precio-descuento {
    color: #27ae60;
}

.producto-precio {
    text-decoration: line-through;
    color: #bdc3c7;
}

/* Botón de compra */
.boton-favorito {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 1em;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s;
}

.boton-favorito:hover {
    background-color: #2980b9;
}

/* Responsivo */
@media (max-width: 768px) {
    .producto {
        width: 45%;
    }
}

@media (max-width: 480px) {
    .producto {
        width: 100%;
    }
}

/* Animaciones */
@keyframes shake {
    0% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    50% { transform: translateX(5px); }
    75% { transform: translateX(-5px); }
    100% { transform: translateX(0); }
}

.producto:hover .producto-imagen {
    animation: shake 0.5s;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.producto {
    animation: fadeIn 1s;
}

/* Gradientes y sombras */
.boton-favorito {
    background: linear-gradient(to right, #3498db, #2980b9);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.boton-favorito:hover {
    background: linear-gradient(to right, #2980b9, #1c6ea4);
}

/* Pseudo-elementos */
.producto-precio::before {
    content: "Antes: ";
    color: #c0392b;
}

.producto-precio-descuento::before {
    content: "Ahora: ";
    color: #27ae60;
}

.boton-favorito::after {
    content: " ⭐";
}

/* Pseudo-clases */
.producto-nombre:first-letter {
    font-size: 1.5em;
    color: #3498db;
}

/* Uso de variables CSS */
:root {
    --main-bg-color: #f4f4f4;
    --main-text-color: #333;
    --accent-color: #3498db;
    --highlight-color: #27ae60;
}

body {
    background-color: var(--main-bg-color);
    color: var(--main-text-color);
}

.boton-favorito {
    background-color: var(--accent-color);
}

.producto-precio-descuento {
    color: var(--highlight-color);
}

</style>