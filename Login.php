<?php
include("conexion_db.php");

if(isset($_POST['registro'])) {
    $user = $_POST['user'];
    $pass = $_POST['Pass'];

    // Utiliza la cláusula WHERE para comparar el nombre de usuario y la contraseña
    $insertarDatos = "SELECT * FROM registro WHERE user='$user' AND Pass='$pass'";
    
    // Ejecuta la consulta
    $ejecutarInsertar = mysqli_query($conn, $insertarDatos);

    // Verifica si se encontraron resultados
    if ($ejecutarInsertar) {
        $filas = mysqli_num_rows($ejecutarInsertar);

        if ($filas > 0) {
            echo "Inicio de sesión exitoso";
            echo "<script>window.location.href = 'index.html';</script>";
        } else {
            echo "Credenciales incorrectas";
        }
    } else {
        echo "Hubo algún error en la consulta: " . mysqli_error($conn);
    }
}
?>