<?php
include('./db.php');

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username']; // OJO: Aquí recibimos 'username'
    $password = $_POST['password']; 


    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    
    if ($conexion->query($sql) === TRUE) {
        echo "<script>
                alert('Usuario registrado correctamente');
                window.location.href = '../paginaPrincipal.php';
              </script>";
        exit();
    } else {
        $mensaje = "Error al registrar: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body { background-color: #f5f5f5; }
        .card { margin-top: 50px; padding: 20px; }
        .header-fes { background-color: #3e2723; padding: 10px; }
    </style>
</head>
<body>

    <header class="header-fes center-align z-depth-2">
        <h3 class="white-text" style="margin:0;">FES Aragón</h3>
    </header>

    <main class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card z-depth-3">
                    <div class="card-content">
                        <span class="card-title center-align orange-text text-darken-3">
                            <i class="material-icons large">person_add</i><br>
                            Nuevo Usuario
                        </span>

                        <?php if(!empty($mensaje)): ?>
                            <div class="card-panel red lighten-4 red-text text-darken-4">
                                <?php echo $mensaje; ?>
                            </div>
                        <?php endif; ?>

                        <form action="create.php" method="POST">
                            
                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" id="username" name="username" required>
                                <label for="username">Nombre de Usuario</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" id="password" name="password" required>
                                <label for="password">Contraseña</label>
                            </div>

                            <br>
                            <div class="center-align">
                                <button class="btn waves-effect waves-light light-blue darken-4 btn-large" type="submit">
                                    Guardar
                                    <i class="material-icons right">save</i>
                                </button>
                                <br><br>
                                <a href="../paginaPrincipal.php" class="btn-flat waves-effect red-text">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>