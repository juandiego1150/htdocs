<!-- Formulario de envío de mensajes -->
    <label for="nombre">Titulo</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="mensaje">Mensaje:</label>
    <textarea id="mensaje" name="mensaje" required></textarea>
    
    <input type="submit" value="Enviar mensaje" id="enviarMensaje">
    <p id="alerta"></p>
    <input type="hidden" value="9">
    <br>
    <p>Numero de mensajes: </p>
<!-- Tablón de mensajes -->
<div id="tablon">
    <!-- Aquí se mostrarán los mensajes -->
</div>
<style>
    /* Estilos para el formulario de envío de mensajes */
form {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

/* Estilos para el tablón de mensajes */
#tablon {
    border: 1px solid #ccc;
    padding: 10px;
    margin-top: 20px;
}
</style>
<script>
    // Código JavaScript para cargar los mensajes
    $(document).ready(function() {            
        // Cargar mensajes
        $.ajax({
            type: "POST",
            url: "controllers/usuarios.php",
            data: {
                option: 10
            },
            success: function(a) {
                $("#tablon").html(a)
            }
        });
    //enviar mensaje
    $("#enviarMensaje").click(function() {
        var nombre = $("#nombre").val();
        var mensaje = $("#mensaje").val();
        $.ajax({
            type: "POST",
            url: "controllers/usuarios.php",
            data: {
                option: 9,
                nombre: nombre,
                mensaje: mensaje
            },
            success: function(a) {
                $("#alerta").html(a);
                if(nombre != "" && mensaje != ""){
                    alert(a)
                    $("#tablonMensajes").trigger("click");
                }
            }
        });
    });
});
</script>