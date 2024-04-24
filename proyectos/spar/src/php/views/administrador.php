<head>
    <title>Panel de Administrador</title>
    <style>
        /* Estilos CSS para el panel de administrador */
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>Panel de Administrador de Usuarios</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <!-- Aquí puedes agregar filas con información de usuarios -->
        <?php for($i=0;$i<count($usuarios);$i++){ ?>
            <tr>
                <td><?php echo $usuarios[$i]['idUsuario']?></td>
                <td><?php echo $usuarios[$i]['nombre']?></td>
                <td>usuario1@example.com</td>
                <td>Administrador</td>
                <td>
                    <button>Editar</button>
                    <button>Eliminar</button>
                </td>
            </tr>
            
       <?php } ?>
        <!-- Fin de filas de usuarios -->
    </table>
</body>
