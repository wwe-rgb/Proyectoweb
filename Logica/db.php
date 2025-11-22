<?php
$host = "sql305.infinityfree.com";
$user = "if0_40478631";
$pass = "vg64tlFYA1Znga2";



$conexion = new mysqli($host, $user, $pass, "if0_40478631_login_db");

if ($conexion->connect_error) {
    die("". $conexion->connect_error);
}



?>