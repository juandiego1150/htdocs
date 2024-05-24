
    <div id="unique-container">
        <form id="unique-form">
            <label for="unique-nombre" class="unique-label">Título</label>
            <input type="text" id="unique-nombre" name="nombre" class="unique-input" required>

            <label for="unique-mensaje" class="unique-label">Mensaje:</label>
            <textarea id="unique-mensaje" name="mensaje" class="unique-textarea" required></textarea>

            <input type="submit" value="Enviar mensaje" id="unique-enviarMensaje" class="unique-submit">
            <p id="unique-alert"></p>
        </form>
        <div id="unique-dropdown">
            <div id="unique-dropdown-title">
                <span>Mensajes</span>
                <span class="unique-arrow">&#9660;</span>
            </div>
            <div id="unique-dropdown-content">
                <!-- Tablón donde se mostrarán los mensajes -->
                <div id="unique-tablon">
                    <!-- Aquí se mostrarán los mensajes -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Función para alternar el contenido del desplegable
            $("#unique-dropdown-title").click(function () {
                $("#unique-dropdown-content").slideToggle();
                $(".unique-arrow").toggleClass("rotate");
            });

            // Cargar mensajes
            function cargarMensajes() {
                $.ajax({
                    type: "POST",
                    url: "controllers/usuarios.php",
                    data: {
                        option: 10
                    },
                    success: function (a) {
                        $("#unique-tablon").html(a);
                    }
                });
            }

            // Cargar mensajes al cargar la página
            cargarMensajes();

            // Enviar mensaje
            $("#unique-enviarMensaje").click(function (event) {
                event.preventDefault(); // Evitar el envío del formulario por defecto
                var nombre = $("#unique-nombre").val();
                var mensaje = $("#unique-mensaje").val();
                if (nombre === "" || mensaje === "") {
                    $("#unique-alert").html("Todos los campos son obligatorios.");
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
                    success: function (a) {
                        // Mostrar el mensaje en la alerta y hacer que se desvanezca después de 3 segundos
                        $("#unique-alert").html(a).fadeIn();
                        setTimeout(function () {
                            $("#unique-alert").fadeOut("slow", function () {
                                // Una vez que la alerta se desvanezca, limpiar el contenido y cargar los mensajes
                                $("#unique-alert").html("").fadeIn();
                                cargarMensajes();
                            });
                        }, 3000);
                    }
                });
            });
        });
    </script>
