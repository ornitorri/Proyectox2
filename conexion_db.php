<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tienda"; 

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}
?>
