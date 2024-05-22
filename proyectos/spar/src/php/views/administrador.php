<link rel="stylesheet" type="text/css" href="css/administrador.css">
    <h1>Panel de Administrador de Usuarios</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>rol</th>
            <th>Acciones</th>
        </tr>
        <!-- Aquí puedes agregar filas con información de usuarios -->
        <?php for($i=0;$i<count($usuarios);$i++){ ?>
            <tr>
                <td><?php echo $usuarios[$i]['idUsuario']?></td>
                <td><?php echo $usuarios[$i]['nombre']?></td>
                <td><?php echo $usuarios[$i]['contraseña']?></td>
                <td><?php echo $usuarios[$i]['tipoUsuario']?></td>
                <td>
                    <button id="editar_<?php echo $usuarios[$i]['idUsuario']?>">Editar</button>
                    <button id="eliminar_<?php echo $usuarios[$i]['idUsuario']?>">Eliminar</button>
                </td>
            </tr>
            
      
        <!-- Fin de filas de usuarios -->
<script>
    // Código JavaScript para editar y eliminar usuarios
    $(document).ready(function() {
        // Eliminar usuario
        $("#eliminar_<?php echo $usuarios[$i]['idUsuario']?>").click(function() {
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
        //editar usuarios
        $("#editar_<?php echo $usuarios[$i]['idUsuario']?>").click(function() {
            // Obtener el ID del usuario
            var id = $(this).attr("id").split("_")[1];
            var nombre = $(this).parent().prev().prev().prev().text();
            var contraseña = $(this).parent().prev().prev().text();
            var rol = $(this).parent().prev().text();
            $(this).parent().prev().prev().prev().html("<input type='text' value='"+nombre+"'>");
            $(this).parent().prev().prev().html("<input type='text' value='"+contraseña+"'>");
            $(this).parent().prev().html("<input type='text' value='"+rol+"'>");

          //ocultamos los botones de eliminar y de guardar
            $(this).parent().children().hide();
            $(this).parent().children().next().hide();
            //mostramos el boton de guardar y de cancelar
            $(this).parent().append("<button id='guardar_"+id+"'>✅</button>");
            
            $(this).parent().append("<button id='cancelar_"+id+"'>❌</button>");
            //cancelar la edicion
            $("#cancelar_"+id).click(function(){
                $("#adimistrador").trigger("click");
            });
            
            

            //guardar los cambios
            $("#guardar_"+id).click(function(){
              //cambia el value de los datos por los introducido en los inputs
                nombre = $(this).parent().prev().prev().prev().children().val();
                contraseña = $(this).parent().prev().prev().children().val();
                rol = $(this).parent().prev().children().val();

                //enviamos los datos al servidor
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
<?php } ?>