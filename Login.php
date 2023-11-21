<?php
include("conexion_db.php");

if(isset($_POST['registro'])) {
    $user = $_POST['user'];
    $pass = $_POST['Pass'];

    // Utiliza la cláusula WHERE para comparar el nombre de usuario y la contraseña
    $insertarDatos = "SELECT * FROM registro WHERE user='$user' AND Pass='$pass'";
    
    // Ejecuta la consulta
    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

    // Verifica si se encontraron resultados
    if ($ejecutarInsertar) {
        $filas = mysqli_num_rows($ejecutarInsertar);

        if ($filas > 0) {
            echo "Inicio de sesión exitoso";
        } else {
            echo "Credenciales incorrectas";
        }
    } else {
        echo "Hubo algún error en la consulta: " . mysqli_error($enlace);
    }
}
?>
