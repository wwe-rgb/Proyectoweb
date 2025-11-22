<?php
session_start(); // Siempre va al inicio absoluto
include("./db.php"); 

// Activar errores para ver qué pasa (quítalo cuando ya funcione)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$usuario  = $_POST['nombre_usuario'];  
$password = $_POST['password'];

$usuario_id = $_POST['id'];

$stmt = $conexion->prepare("SELECT password FROM users WHERE username = ?");

if (!$stmt) {
    die("Error en la consulta SQL: " . $conexion->error);
}

$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($passwordBD);
    $stmt->fetch();

    if ($password === $passwordBD) {
        $_SESSION['usuario'] = $usuario;
        header("Location: ../paginaPrincipal.php");
        exit;
    } else {
        // Contraseña incorrecta
        echo "<script>alert('Contraseña incorrecta'); window.location.href='../index.php';</script>";
        exit;
    }
} else {
    // Usuario no existe (Antes esto daba pantalla blanca)
    echo "<script>alert('El usuario no existe'); window.location.href='../index.php';</script>";
    exit;
}
?>