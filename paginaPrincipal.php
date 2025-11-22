<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

include("./Logica/db.php");
$consulta = "SELECT * FROM users";
$resultado = $conexion->query($consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link rel="stylesheet" href="./Vistas/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <header class="blue darken-4">
        <div class="row" style="margin-bottom: 0;">
            <div class="col s3">
                <section class="container center-align">
                    <img class="responsive-img" src="./Vistas/Image/Aragon.jpg" alt="Logo" style="width: 100px; height: 100px; margin-top: 10px;">
                </section>
            </div>
            <div class="col s6">
                <section class="container center-align">    
                    <h1 class="white-text" style="font-size: 3rem;">FES Aragon</h1> 
                </section>
            </div>
            <div class="col s3">
                <section class="container center-align">
                    <img class="responsive-img" src="./Vistas/Image/images.png" alt="Logo UNAM" style="width: 100px; height: 100px; margin-top: 10px;">
                </section>
            </div>
        </div>
    </header>

    <div class="container">
        <section>
            <h3 class="orange-text center-align">Gestión de Usuarios</h3>
        </section>

        <section>
            <table class="highlight responsive-table bordered z-depth-1">
                <thead class="orange lighten-4">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo isset($row['username']) ? $row['username'] : $row['name']; ?></td>
                        <td>
                            <a href="./Logica/update.php?id=<?php echo $row['id']; ?>" class="btn-small waves-effect waves-light green">
                                <i class="material-icons">edit</i>
                            </a>
                            <a href="./Logica/delete.php?id=<?php echo $row['id']; ?>" class="btn-small waves-effect waves-light red darken-2" onclick="return confirm('¿Eliminar usuario?');">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
        <br><br>

        <div class="center-align">
            <a href="./Logica/create.php" class="btn-large waves-effect waves-light orange darken-4">
                <i class="material-icons left">person_add</i>
                Agregar Nuevo Usuario
            </a>
        </div>
        <br>
        <div class="center-align">
             <a href="./Logica/logout.php" class="btn-flat waves-effect waves-red red-text">Cerrar Sesión</a>
        </div>

    </div>
    <footer class="page-footer deep-orange accent-3">
        <div class="footer-copyright center-align">
            <div class="container">© 2025 Derechos Reservados</div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>