<style>
        .filter-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .filter-container form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .filter-group {
            flex: 1 1 30%;
            margin: 10px 0;
            padding: 0 10px;
        }

        .filter-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .filter-group input,
        .filter-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>

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