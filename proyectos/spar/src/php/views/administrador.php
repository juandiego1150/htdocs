<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador de Usuarios</title>
   
</head>

<body>
    <h1 id="administrador-h1">Panel de Administrador de Usuarios</h1>
    <table id="administrador-table">
        <tr>
            <th class="administrador-th">ID</th>
            <th class="administrador-th">Nombre</th>
            <th class="administrador-th">Contraseña</th>
            <th class="administrador-th">rol</th>
            <th class="administrador-th">Acciones</th>
        </tr>
        <!-- Aquí puedes agregar filas con información de usuarios -->
        <?php include 'templates/usuarios.php'; ?>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Eliminar usuario
            $(".administrador-delete-button").click(function() {
                // Obtener el ID del usuario
                var id = $(this).attr("id").split("_")[1];
                // Enviar petición para eliminar el usuario
                $.ajax({
                    type: "POST",
                    url: "controllers/usuarios.php",
                    data: {
                        option: 12,
                        id: id
                    },
                    success: function(a) {
                        if (a == 1) {
                            $("#adimistrador").trigger("click");
                        } else {
                            alert("Error al eliminar el usuario");
                        }
                    }
                });
            });

            // Editar usuario
            $(".administrador-edit-button").click(function() {
                // Obtener el ID del usuario
                var id = $(this).attr("id").split("_")[1];
                var nombre = $(this).parent().prev().prev().prev().text();
                var contraseña = $(this).parent().prev().prev().text();
                var rol = $(this).parent().prev().text();
                $(this).parent().prev().prev().prev().html("<input type='text' value='" + nombre + "' class='administrador-input-text'>");
                $(this).parent().prev().prev().html("<input type='text' value='" + contraseña + "' class='administrador-input-text'>");
                $(this).parent().prev().html("<input type='text' value='" + rol + "' class='administrador-input-text'>");

                // Ocultar los botones de eliminar y editar
                $(this).parent().children().hide();

                // Mostrar los botones de guardar y cancelar
                $(this).parent().append("<button id='administrador-save_" + id + "' class='administrador-save-button'>✅</button>");
                $(this).parent().append("<button id='administrador-cancel_" + id + "' class='administrador-cancel-button'>❌</button>");

                // Cancelar la edición
                $("#administrador-cancel_" + id).click(function() {
                    $("#adimistrador").trigger("click");
                });

                // Guardar los cambios
                $("#administrador-save_" + id).click(function() {
                    // Cambiar el value de los datos por los introducidos en los inputs
                    nombre = $(this).parent().prev().prev().prev().children().val();
                    contraseña = $(this).parent().prev().prev().children().val();
                    rol = $(this).parent().prev().children().val();

                    // Enviar los datos al servidor
                    $.ajax({
                        type: "POST",
                        url: "controllers/usuarios.php",
                        data: {
                            option: 13,
                            id: id,
                            nombre: nombre,
                            contraseña: contraseña,
                            rol: rol
                        },
                        success: function(a) {
                            if (a == 1 || a == "1") {
                                $("#adimistrador").trigger("click");
                            } else {
                                alert("Error al editar el usuario o usuario existente");
                            }
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>
