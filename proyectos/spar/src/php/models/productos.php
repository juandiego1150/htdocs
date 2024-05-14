<?php
class Productos
{
    public static function listarProductos()
    {
        require_once 'conexion.php';

        $consulta = $con -> prepare("SELECT * FROM productos");
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta -> close();
            // Array para almacenar los datos fuera del if por si no vienen productos
        $productos = array();
             // Verificar si se obtuvieron resultados
        if ($resultado->num_rows > 0) 
        {
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