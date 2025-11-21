<?php
include("./Logica/db.php");

$consulta = "SELECT * FROM users";
$resultado = $conexion->query($consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    
</head>
<body>

    <div class="container">
        <div class="row center">
            <div class="col s12 m6 offset-m3">
                <div class="card login-card z-depth-3">

                    <h4 class="center">Iniciar Sesión</h4>
                    <br>

                    <form action="./Logica/validarlogin.php" method="POST">

                        <div class="input-field">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="nombre_usuario" type="text" name="nombre_usuario" required>
                            <label for="nombre_usuario">Nombre de Usuario</label>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" name="password" required>
                            <label for="password">Contraseña</label>
                        </div>

                        <button class="btn waves-effect waves-light blue darken-2" type="submit" style="width: 100%;">
                            Entrar
                            <i class="material-icons right">send</i>
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="center-align">
            <a href="./Logica/create.php" class="btn-large waves-effect waves-light orange darken-4">
                <i class="material-icons left">person_add</i>
                Agregar Nuevo Usuario
            </a>
        </div>
        <br><br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
