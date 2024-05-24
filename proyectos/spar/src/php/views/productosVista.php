<div class="product-list">
    <h1>Productos</h1>

    <!-- Filtros de Búsqueda -->
    <div class="filter-container">
        <form id="filter-form">
            <div class="filter-group">
                <label for="search">Buscar:</label>
                <input type="text" id="search" name="search">
            </div>
        </form>
    </div>
    <br>
    <br>
    <!-- fin filtros de busqueda -->
    <div id="vistaProductos" class="productos-container">
    <?php include 'templates/productos.php'; ?>
    </div>
</div>
<script>
    // Función para filtrar productos según el término de búsqueda
    function filterProducts() {
        const search = document.getElementById('search').value.toLowerCase();
        const products = document.querySelectorAll('.producto');

        products.forEach(product => {
            const title = product.querySelector('.producto-nombre').textContent.toLowerCase();

            // Si el título del producto incluye el término de búsqueda, lo mostramos, de lo contrario, lo ocultamos.
            product.style.display = title.includes(search) ? 'block' : 'none';
        });
    }

    // Agregar evento de escucha al campo de búsqueda para que se actualice la búsqueda en cada cambio
    document.getElementById('search').addEventListener('input', filterProducts);
</script>
