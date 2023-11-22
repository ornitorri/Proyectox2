<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 align="center">Lista de Productos</h1>

    <?php
    include("conexion_db.php");

    // Verificar si la conexión fue exitosa
    if (!$conn) {
        die("La conexión ha fallado: " . mysqli_connect_error());
    }

    // Realizar la consulta a la base de datos
    $query = "SELECT * FROM registro_produc";
    $resultado = mysqli_query($conn, $query);

    // Verificar si hay resultados
    if ($resultado) {
        // Mostrar los resultados en una tabla HTML
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Fecha de Adquisición</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Proveedor</th>
                    <th>Detalle</th>
                    <th>Opción</th>
                </tr>";

        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>
                    <td>{$fila['id']}</td>
                    <td>{$fila['Nombre']}</td>
                    <td>{$fila['Cantidad']}</td>
                    <td>{$fila['fad']}</td>
                    <td>{$fila['fven']}</td>
                    <td>{$fila['precio']}</td>
                    <td>{$fila['Categoria']}</td>
                    <td>{$fila['proveedor']}</td>
                    <td>{$fila['detalle']}</td>
                    <td><a href='editar_produc.php?id={$fila['id']}'>Editar</a> <a href='eliminar_producto.php?id={$fila['id']}'>Eliminar</a> </td>
                    
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Hubo un error en la consulta: " . mysqli_error($conn);
    }

    // Cerrar la conexión
    mysqli_close($conn);
    ?>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
