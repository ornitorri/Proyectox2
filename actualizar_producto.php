<?php
include("conexion_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $Nombre = $_POST['Nombre'];
    $Cantidad = $_POST['Cantidad'];
    $fad = $_POST['fad'];
    $fven = $_POST['fven'];
    $precio = $_POST['precio'];
    $Categoria = $_POST['Categoria'];
    $proveedor = $_POST['proveedor'];
    $detalle = $_POST['detalle'];

    // Actualizar los datos en la base de datos
    $actualizarDatos = "UPDATE registro_produc SET Nombre='$Nombre', Cantidad='$Cantidad', fad='$fad', fven='$fven', precio='$precio', Categoria='$Categoria', proveedor='$proveedor', detalle='$detalle' WHERE id=$id";

    $ejecutarActualizar = mysqli_query($conn, $actualizarDatos);

    if ($ejecutarActualizar) {
        echo "<script>alert('Producto actualizado correctamente');</script>";
        echo "<script>window.location.href = 'segui_inven.php';</script>";
    } else {
        echo "Hubo un error en la consulta de actualización: " . mysqli_error($conn);
    }
} else {
    echo "Error al procesar la solicitud.";
}

// Cerrar la conexión
mysqli_close($conn);
?>
