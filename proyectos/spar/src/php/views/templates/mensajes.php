<style>
  /* Estilos generales del contenedor del tablón */
#tablonInterior {
    max-height: 400px; /* Altura máxima del tablón */
    overflow-y: auto; /* Agregar barra de desplazamiento vertical cuando sea necesario */
    padding: 20px; /* Añadir un poco de espacio alrededor del tablón */
}

/* Estilos generales del contenedor del mensaje */
.mensaje {
    background-color: #f9f9f9;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 30px;
}

/* Estilo del nombre del remitente */
.autor {
    font-size: 14px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

/* Estilo del nombre del mensaje */
.nombre {
    font-size: 18px;
    font-weight: bold;
    color: #222;
    margin-bottom: 10px;
}

/* Estilo del contenido del mensaje */
.contenido {
    font-size: 16px;
    color: #555;
    line-height: 1.6;
}

</style>

<div id="tablonInterior">
    <?php 
    $contador = 0;
    foreach ($mensajes as $mensaje): 
        ?>
        <div class="mensaje" id="mensaje">
            <p class="autor">Enviado por: <?php echo $mensaje['nombre_usuario']; ?></p>
            <p class="nombre"><?php echo $mensaje['nombre_mensaje']; ?></p>
            <p class="contenido"><?php echo $mensaje['mensaje']; ?></p>
        </div>
        <?php 
    endforeach; 
    ?>
</div>
