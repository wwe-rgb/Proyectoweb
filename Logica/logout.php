<?php
session_start(); // Iniciar la sesión para poder destruirla
session_unset(); // Limpiar todas las variables de sesión
session_destroy(); // Destruir la sesión completamente

// Redirigir al login (index.php)
// Usamos "../" porque estamos dentro de la carpeta Logica y queremos salir a la raíz
header("Location: ../index.php");
exit;
?>
