<!-- Formulario de envío de mensajes -->
<form id="formularioMensaje">
    <label for="nombre">Titulo</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="mensaje">Mensaje:</label>
    <textarea id="mensaje" name="mensaje" required></textarea>

    <input type="submit" value="Enviar mensaje" id="enviarMensaje">
    <p id="alerta"></p>
    <input type="hidden" value="9">
    <br>
    <p>Numero de mensajes: </p>
</form>

<!-- Tablón donde se mostrarán los mensajes -->
<div id="tablon">
    <!-- Aquí se mostrarán los mensajes -->
</div>

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

    /* Form Styling */
    form {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    form:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
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
        display: inline-block;
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

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Animation Keyframes */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* Smooth Fade-in Animation */
    #tablon {
        animation: fadeIn 1s ease-in-out;
    }

    /* Enhanced Tooltip */
    [data-tooltip] {
        position: relative;
        cursor: pointer;
    }

    [data-tooltip]::before,
    [data-tooltip]::after {
        display: none;
        position: absolute;
    }

    [data-tooltip]::before {
        content: attr(data-tooltip);
        background: rgba(0, 0, 0, 0.8);
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        top: -40px;
        left: 50%;
        transform: translateX(-50%);
        white-space: nowrap;
        z-index: 10;
    }

    [data-tooltip]::after {
        content: '';
        border-style: solid;
        border-width: 5px 5px 0 5px;
        border-color: rgba(0, 0, 0, 0.8) transparent transparent transparent;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
    }

    [data-tooltip]:hover::before,
    [data-tooltip]:hover::after {
        display: block;
    }

    /* Transitions and Transformations */
    form,
    #tablon {
        transition: all 0.3s ease;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Código JavaScript para cargar los mensajes
    $(document).ready(function() {
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
                            $("#alerta").html("");
                            cargarMensajes();
                        });
                    }, 3000);
                }

            });
        });
    });
</script>