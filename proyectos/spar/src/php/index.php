<!DOCTYPE html>
<html>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
<head>
    <title>Mi página web</title>
    <style>
        /* CSS styles go here */
        header {
            background-color: #f2f2f2;
            padding: 10px;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        main {
            display: flex;
            justify-content: space-between;
        }

        aside {
            width: 30%;
            background-color: #f2f2f2;
            padding: 10px;
        }

        article {
            width: 60%;
            background-color: #fff;
            padding: 10px;
        }

        section {
            background-color: #f2f2f2;
            padding: 10px;
        }

        div {
            background-color: #fff;
            padding: 10px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
    </style>
</head>
<body>
    <header>
        encabezado
    </header>

    <nav>
         Menú de navegación 
    </nav>

    <main>
        <aside>
            Barra lateral
        </aside>

        <article>
            Contenido del artículo
        </article>

        <section>
            Contenido de la sección
        </section>

        <div>
            Contenido del div
        </div>
    </main>
        <div id="productos"></div>
    <footer>
        Pie de página
    </footer>
</body>
</html>
<script>
    // JavaScript code goes here
    $(document).ready(function() {
        $.ajax({
        type: "POST",
        url: "controllers/productos.php",
        dataType: "Text",
        data: {
          option: 1
        },

        success: function(a) {

            $("#productos").html(a);


        }

      });
    });
</script>