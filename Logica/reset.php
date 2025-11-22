<?php
    include("./db.php");
    
    if ($conexion->query("TRUNCATE TABLE users") === TRUE) {
        echo "La tabla 'users' ha sido reiniciada.";
        
        header(header: "Location: ../index.php");
    } else {
        echo "Error: " . $conexion->error;
    }
?>