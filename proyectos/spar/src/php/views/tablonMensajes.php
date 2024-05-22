<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desplegable de Mensajes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    color: #333;
    line-height: 1.6;
}

/* Container */
.container {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

/* Dropdown Styling */
.dropdown {
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.dropdown-title {
    background-color: #4CAF50;
    color: white;
    padding: 15px;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.dropdown-content {
    display: none;
    background-color: #fff;
    padding: 20px;
}

/* Arrow Styling */
.arrow {
    transition: transform 0.3s ease;
}

/* Form Styling */
form {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 20px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
textarea:focus {
    border-color: #4CAF50;
    outline: none;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #45a049;
    transform: translateY(-3px);
}

input[type="submit"]:active {
    transform: translateY(1px);
}

/* Alert Styling */
#alerta {
    margin-top: 10px;
    color: red;
    font-weight: bold;
}

/* Tablón Styling */
#tablon {
    margin-top: 20px;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

#tablon:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

/* Responsive Design */
@media (max-width: 768px) {

    form,
    #tablon {
        padding: 15px;
    }

    label,
    input[type="text"],
    textarea,
    input[type="submit"] {
        font-size: 14px;
    }
}

</style>
<body>
    <div class="container">
    <form id="formularioMensaje">
                    <label for="nombre">Título</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" required></textarea>

                    <input type="submit" value="Enviar mensaje" id="enviarMensaje">
                    <p id="alerta"></p>
                </form>
        <div class="dropdown">
            <div class="dropdown-title" id="dropdownTitle">
                <span>Mensajes</span>
                <span class="arrow">&#9660;</span>
            </div>
            <div class="dropdown-content" id="dropdownContent">
                <!-- Formulario de envío de mensajes -->
               

                <!-- Tablón donde se mostrarán los mensajes -->
                <div id="tablon">
                    <!-- Aquí se mostrarán los mensajes -->
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
    // Función para alternar el contenido del desplegable
    $("#dropdownTitle").click(function() {
        $("#dropdownContent").slideToggle();
        $(".arrow").toggleClass("rotate");
    });

    // Cargar mensajes
    function cargarMensajes() {
        $.ajax({
            type: "POST",
            url: "controllers/usuarios.php",
            data: {
                option: 10
            },
            success: function(a) {
                $("#tablon").html(a);
            }
        });
    }

    // Cargar mensajes al cargar la página
    cargarMensajes();

    // Enviar mensaje
    $("#enviarMensaje").click(function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto
        var nombre = $("#nombre").val();
        var mensaje = $("#mensaje").val();
        if (nombre === "" || mensaje === "") {
            $("#alerta").html("Todos los campos son obligatorios.");
            return;
        }

        $.ajax({
            type: "POST",
            url: "controllers/usuarios.php",
            data: {
                option: 9,
                nombre: nombre,
                mensaje: mensaje
            },
            success: function(a) {
                // Mostrar el mensaje en la alerta y hacer que se desvanezca después de 3 segundos
                $("#alerta").html(a).fadeIn();
                setTimeout(function() {
                    $("#alerta").fadeOut("slow", function() {
                        // Una vez que la alerta se desvanezca, limpiar el contenido y cargar los mensajes
                        $("#alerta").html("").fadeIn();
                        cargarMensajes();
                    });
                }, 3000);
            }
        });
    });
});

    </script>

</body>

</html>
