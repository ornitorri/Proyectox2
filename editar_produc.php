<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 align="center">Editar Producto</h1>

    <?php
    include("conexion_db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Realizar consulta para obtener los datos del producto con el ID proporcionado
        $query = "SELECT * FROM registro_produc WHERE id = $id";
        $resultado = mysqli_query($conn, $query);

        if ($resultado) {
            $fila = mysqli_fetch_assoc($resultado);

            // Mostrar un formulario prellenado con los datos actuales del producto
            echo "<form action='actualizar_producto.php?id={$fila['id']}' method='post'>
                    <div class='form-group'>
                        <label for='nombre_producto'>Nombre del Producto:</label>
                        <input type='text' class='form-control' id='nombre_producto' name='Nombre' value='{$fila['Nombre']}' required>
                    </div>
                    <div class='form-group'>
                        <label for='cantidad_producto'>Cantidad del Producto:</label>
                        <input type='number' class='form-control' id='cantidad_producto' name='Cantidad' value='{$fila['Cantidad']}' required>
                    </div>
                    <div class='form-group'>
                        <label for='fecha_adquisicion'>Fecha de Adquisición:</label>
                        <input type='date' class='form-control' id='fecha_adquisicion' name='fad' value='{$fila['fad']}' required>
                    </div>
                    <div class='form-group'>
                        <label for='fecha_vencimiento'>Fecha de Vencimiento:</label>
                        <input type='date' class='form-control' id='fecha_vencimiento' name='fven' value='{$fila['fven']}' required>
                    </div>
                    <div class='form-group'>
                        <label for='precio_unidad'>Precio por Unidad:</label>
                        <input type='number' step='0.01' class='form-control' id='precio_unidad' name='precio' value='{$fila['precio']}' required>
                    </div>
                    <div class='form-group'>
                        <label for='categoria'>Categoría:</label>
                        <input type='text' class='form-control' id='categoria' name='Categoria' value='{$fila['Categoria']}' required>
                    </div>
                    <div class='form-group'>
                        <label for='proveedor'>Proveedor:</label>
                        <input type='text' class='form-control' id='proveedor' name='proveedor' value='{$fila['proveedor']}' required>
                    </div>
                    <div class='form-group'>
                        <label for='informacion_producto'>Información del Producto:</label>
                        <textarea class='form-control' id='informacion_producto' name='detalle' rows='3'>{$fila['detalle']}</textarea>
                    </div>
                    <button type='submit' class='btn btn-primary'>Guardar Cambios</button>
                </form>";
        } else {
            echo "Hubo un error en la consulta: " . mysqli_error($conn);
        }
    } else {
        echo "ID de producto no proporcionado.";
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

