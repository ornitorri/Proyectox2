<?php
include("conexion_db.php");

if(isset($_POST['resin'])) {
    $Nombre = $_POST['Nombre'];
    $Cantidad = $_POST['Cantidad'];
    $fad = $_POST['fad'];
    $fven = $_POST['fven'];
    $precio = $_POST['precio'];
    $Categoria = $_POST['Categoria'];
    $proveedor = $_POST['proveedor'];
    $detalle = $_POST['detalle'];

    // Asegúrate de especificar las columnas en las que estás insertando los datos
    $insertarDatos = "INSERT INTO registro_produc (nombre, cantidad, fad, fven, precio, categoria, proveedor, detalle) VALUES ('$Nombre', '$Cantidad', '$fad', '$fven', '$precio', '$Categoria', '$proveedor', '$detalle')";

    // Ejecutar la consulta usando la conexión establecida en conexion_db.php
    $ejecutarInsertar  = mysqli_query($conn, $insertarDatos);

    if ($ejecutarInsertar) {
        // Datos insertados correctamente, muestra una alerta y redirige a la página de inicio de sesión
        echo "<script>alert('Producto registrado correctamente');</script>";
        echo "<script>window.location.href = 'index.html';</script>";
    } else {
        echo "Hubo un error en la consulta: " . mysqli_error($conn);
    }
} else {
    echo "No se recibieron datos del formulario";
}
?>


