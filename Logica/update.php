<?php
include('./db.php');

$id       = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email    = $_POST['email'];
$telefono = $_POST['telefono'];

$sql = "UPDATE users SET username='$username', password='$password', email='$email', telefono='$telefono' WHERE id=$id";

if ($conexion->query($sql) === TRUE) {
    header('Location: ../paginaPrincipal.php');
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}
?>
