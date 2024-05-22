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
            <style>
                /* Estilos del encabezado */
h1 {
    text-align: center;
    font-size: 2em;
    color: #333;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    padding: 20px 0;
    background-color: #f4f4f9;
}

/* Estilos de la tabla */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    border: 1px solid #ccc;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #4CAF50;
    color: white;
}

/* Estilos de las celdas de la tabla */
td {
    background-color: #f9f9f9;
}

/* Estilos de los botones de acción */
button {
    padding: 8px 16px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    background-color: #4CAF50;
    color: white;
    font-size: 14px;
    margin-right: 5px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;
}

/* Estilos del menú desplegable */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 120px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    border-radius: 4px;
}

.dropdown-content button {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    background-color: #f9f9f9;
    border: none;
    width: 100%;
    text-align: left;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.dropdown-content button:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

/* Estilos de los inputs */
input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Estilos de los botones de guardar y cancelar con php */
#guardar_<?php echo $usuarios[$i]['idUsuario']?>,
#cancelar_<?php echo $usuarios[$i]['idUsuario']?> {
    padding: 8px 16px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    font-size: 14px;
    margin-right: 5px;
    transition: background-color 0.3s ease;
}

#guardar_<?php echo $usuarios[$i]['idUsuario']?>:hover,
#cancelar_<?php echo $usuarios[$i]['idUsuario']?>:hover {
    background-color: #45a049;
}

            </style>
      
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