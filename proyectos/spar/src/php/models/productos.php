<?php
class productos
{
    public static function listarProductos()
    {
        require_once 'conexion.php';

        $consulta = $con -> prepare("SELECT * FROM productos");
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta -> close();

             // Verificar si se obtuvieron resultados
        if ($resultado->num_rows > 0) 
        {
            // Array para almacenar los datos
            $productos = array();

            // Iterar sobre los resultados usando fetch_assoc()
            while ($row = $resultado->fetch_assoc()) 
            {
            // Guardar cada fila en el array $productos
                $productos[] = $row;
            }  
        }
        return $productos;

    }
}