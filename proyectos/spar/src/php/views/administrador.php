<link rel="stylesheet" type="text/css" href="css/administrador.css">
    <h1>Panel de Administrador de Usuarios</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Rol</th>
        </tr>
        <!-- Aquí puedes agregar filas con información de usuarios -->
        <?php for($i=0;$i<count($usuarios);$i++){ ?>
            <tr>
                <td><?php echo $usuarios[$i]['idUsuario']?></td>
                <td><?php echo $usuarios[$i]['nombre']?></td>
                <td>
                    <button id="editar_<?php echo $usuarios[$i]['idUsuario']?>">Editar</button>
                    <button id="eliminar_<?php echo $usuarios[$i]['idUsuario']?>">Eliminar</button>
                </td>
            </tr>
            
      
        <!-- Fin de filas de usuarios -->
<script>
    // Código JavaScript para editar y eliminar usuarios
    $(document).ready(function() {
        // Editar usuario
        $("#editar_<?php echo $usuarios[$i]['idUsuario']?>").click(function() {
           
        });
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
        //
    });
</script>
<?php } ?>