    <h1>Ofertas</h1>
     <!-- Filtros de Búsqueda -->
     <div class="filter-container">
        <form id="filter-form">
            <div class="filter-group">
                <label for="search">Buscar:</label>
                <input type="text" id="search" name="search">
            </div>
        </form>
    </div>
            <!--fin de filtros-->
    <br>
    <br>
    <div class="oferta-list">
    <?php include 'templates/ofertas.php'; ?>
    </div>
    <script>
        // JavaScript para la funcionalidad de búsqueda
        document.getElementById('search').addEventListener('keyup', function() {
            let searchTerm = this.value.toLowerCase();
            let products = document.querySelectorAll('.producto-oferta');

            products.forEach(function(product) {
                let productName = product.querySelector('.producto-nombre-oferta').textContent.toLowerCase();
                let productDescription = product.querySelector('.producto-descripcion-oferta').textContent.toLowerCase();
                if (productName.includes(searchTerm) || productDescription.includes(searchTerm)) {
                    product.style.display = '';
                } else {
                    product.style.display = 'none';
                }
            });
        });
cument.getElementById('search').addEventListener('input', filterProducts);
</script>