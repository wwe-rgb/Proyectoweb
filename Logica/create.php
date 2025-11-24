<?php
include('./db.php');

$username = $_POST['username'];
$password = $_POST['password'];
$email    = $_POST['email'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO users (username, password, email, telefono) VALUES ('$username', '$password', '$email', '$telefono')";

if ($conexion->query($sql) === TRUE) {
    header("Location: ../paginaPrincipal.php");
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}
?>
