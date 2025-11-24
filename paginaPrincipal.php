<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
include("./Logica/db.php");

$modo_edicion = false;
$id_editar = "";
$username_val = "";
$email_val = "";
$telefono_val = "";
$password_val = "";

if (isset($_GET['editar'])) {
    $modo_edicion = true;
    $id_editar = $_GET['editar'];
    
    $stmt = $conexion->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id_editar);
    $stmt->execute();
    $res_edit = $stmt->get_result();
    if ($row_edit = $res_edit->fetch_assoc()) {
        $username_val = $row_edit['username'];
        $email_val = isset($row_edit['email']) ? $row_edit['email'] : '';
        $telefono_val = isset($row_edit['telefono']) ? $row_edit['telefono'] : '';
        $password_val = $row_edit['password'];
    }
}

$consulta = "SELECT * FROM users";
$resultado = $conexion->query($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios - FES Aragon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./Vistas/css/style.css">
</head>
<body>

    <nav>
        <div class="nav-wrapper container">
            <a href="https://www.unam.mx/" target="blank" class="brand-logo left">UNAM</a>
            <ul id="nav-mobile" class="right">
                <li><a href="https://www.aragon.unam.mx/fes-aragon/#!/inicio" target="blank">FES Aragon</a></li>
                <li><a href="./Logica/logout.php"><i class="material-icons">exit_to_app</i></a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        
        <div class="row" style="margin-top: 30px;">
            <div class="col s12">
                <div class="card white form-card z-depth-1">
                    <h5 class="orange-text text-darken-2" style="margin-bottom: 20px;">
                        <?php echo $modo_edicion ? 'Editar Usuario' : 'Agregar Usuario'; ?>
                    </h5>
                    
                    <form action="<?php echo $modo_edicion ? './Logica/update.php' : './Logica/create.php'; ?>" method="POST">
                        
                        <?php if($modo_edicion): ?>
                            <input type="hidden" name="id" value="<?php echo $id_editar; ?>">
                        <?php endif; ?>

                        <div class="row" style="margin-bottom: 0;">
                            <div class="input-field col s12 m3">
                                <i class="material-icons prefix">person</i>
                                <input id="username" name="username" type="text" value="<?php echo $username_val; ?>" required>
                                <label for="username">Nombre</label>
                            </div>
                            
                            <div class="input-field col s12 m3">
                                <i class="material-icons prefix">email</i>
                                <input id="email" name="email" type="email" value="<?php echo $email_val; ?>">
                                <label for="email">Email</label>
                            </div>

                            <div class="input-field col s12 m3">
                                <i class="material-icons prefix">phone</i>
                                <input id="telefono" name="telefono" type="text" value="<?php echo $telefono_val; ?>">
                                <label for="telefono">Teléfono</label>
                            </div>
                            
                            <div class="input-field col s12 m2">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="password" name="password" type="password" value="<?php echo $password_val; ?>" required>
                                <label for="password">Clave</label>
                            </div>

                            <div class="input-field col s12 m1 center-align">
                                <button class="btn-floating btn-large waves-effect waves-light <?php echo $modo_edicion ? 'green' : 'blue darken-4'; ?>" type="submit">
                                    <i class="material-icons"><?php echo $modo_edicion ? 'save' : 'add'; ?></i>
                                </button>
                            </div>
                        </div>
                        <?php if($modo_edicion): ?>
                            <div class="row">
                                <div class="col s12 right-align">
                                    <a href="paginaPrincipal.php" class="grey-text">Cancelar Edición</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <div class="row table-container">
            <div class="col s12">
                <h4 class="center-align orange-text text-darken-1">Lista de Usuarios</h4>
                <table class="highlight bordered white z-depth-1" style="margin-top: 20px;">
                    <thead class="grey lighten-4">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th class="center-align">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $resultado->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo isset($row['email']) ? $row['email'] : '-'; ?></td>
                            <td><?php echo isset($row['telefono']) ? $row['telefono'] : '-'; ?></td>
                            <td class="center-align">
                                <a href="paginaPrincipal.php?editar=<?php echo $row['id']; ?>" class="btn-floating btn-small waves-effect waves-light blue">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="./Logica/delete.php?id=<?php echo $row['id']; ?>" class="btn-floating btn-small waves-effect waves-light red" onclick="return confirm('¿Borrar usuario?');">
                                    <i class="material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <footer class="page-footer">
        <div class="container">
            <h5 class="white-text">FES Aragon</h5>
            <p class="grey-text text-lighten-4">Hecho en México, UNAM. Todos los derechos reservados 2025.</p>
        </div>
        <div class="footer-copyright">
            <div class="container">Creditos Materialize</div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
