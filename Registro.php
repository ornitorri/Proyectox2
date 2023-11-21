<?php
include("conexion_db.php");

if(isset($_POST['datos'])) {
    $nom = $_POST['nom'];
    $ape = $_POST['ape'];
    $cc = $_POST['cc'];
    $telp = $_POST['telp'];
    $nomn = $_POST['nomn'];
    $nit = $_POST['nit'];
    $teln = $_POST['teln'];
    $ubi = $_POST['ubi'];
    $user = $_POST['user'];
    $pass = $_POST['Pass'];

    $insertarDatos = "INSERT INTO registro VALUES('$nom','$ape','$cc','$telp','$nomn','$nit','$teln','$ubi','$user', '$pass')";
    
    $ejecutarInsertar  = mysqli_query($enlace, $insertarDatos);
   
    if ($ejecutarInsertar) {
        // Datos insertados correctamente, muestra una alerta y redirige a la página de inicio de sesión
        echo "<script>alert('Usuario registrado correctamente');</script>";
        echo "<script>window.location.href = 'login.html';</script>";
    } else {
        echo "Hubo un error en la consulta: " . mysqli_error($enlace);
    }
}
?>

}
?>