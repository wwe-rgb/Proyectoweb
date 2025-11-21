<?php
$host = "127.0.0.1";
$user = "root";
$pass = "Fifapes19";
$puerto = "3306";

$conexion = new mysqli($host, $user, $pass, "login_db", $puerto);
if ($conexion->connect_error) {
    die("". $conexion->connect_error);
}



?>