<?php
include("conexion_db.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el producto de la base de datos
    $eliminarDatos = "DELETE FROM registro_produc WHERE id=$id";

    $ejecutarEliminar = mysqli_query($conn, $eliminarDatos);

    if ($ejecutarEliminar) {
        echo "<script>alert('Producto eliminado correctamente');</script>";
        echo "<script>window.location.href = 'segui_inven.php';</script>";
    } else {
        echo "Hubo un error en la consulta de eliminación: " . mysqli_error($conn);
    }
} else {
    echo "Error al procesar la solicitud.";
}

// Cerrar la conexión
mysqli_close($conn);
?>
