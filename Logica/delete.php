<?php
   include("./db.php");

   $id = $_GET["id"];
   $sql= "DELETE FROM users WHERE id=$id";
    if($conexion->query($sql)== true) {
     header("Location:../index.php");

    }else{
        echo"Error", $conexion->error;
    }
?>