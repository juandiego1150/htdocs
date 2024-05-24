<?php for($i=0;$i<count($usuarios);$i++){ ?>
<tr>
    <td class="administrador-td"><?php echo $usuarios[$i]['idUsuario']?></td>
    <td class="administrador-td"><?php echo $usuarios[$i]['nombre']?></td>
    <td class="administrador-td"><?php echo $usuarios[$i]['contraseña']?></td>
    <td class="administrador-td"><?php echo $usuarios[$i]['tipoUsuario']?></td>
    <td class="administrador-td">
        <button id="administrador-edit_<?php echo $usuarios[$i]['idUsuario']?>" class="administrador-button administrador-edit-button">Editar</button>
        <button id="administrador-delete_<?php echo $usuarios[$i]['idUsuario']?>" class="administrador-button administrador-delete-button">Eliminar</button>
    </td>
</tr>
<?php } ?>
