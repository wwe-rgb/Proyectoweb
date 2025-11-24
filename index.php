<?php
include("./Logica/db.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNAM - Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./Vistas/css/1-style.css">
</head>
<body>

    <nav>
        <div class="nav-wrapper container">
            <a href="https://www.unam.mx/" target="blank" class="brand-logo left">UNAM</a>
            <ul id="nav-mobile" class="right">
                <li><a href="https://www.aragon.unam.mx/fes-aragon/#!/inicio" target="blank">FES Aragon</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card white login-card z-depth-2">
                    <div class="card-content center-align">
                        <span class="card-title" style="color: #1565c0; margin-bottom: 30px;">Iniciar Sesión</span>
                        
                        <form action="./Logica/validarlogin.php" method="POST">
                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="nombre_usuario" type="text" name="nombre_usuario" required>
                                <label for="nombre_usuario">Usuario</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" type="password" name="password" required>
                                <label for="password">Contraseña</label>
                            </div>

                            <br>
                            <button class="btn waves-effect waves-light blue darken-2 btn-entrar" type="submit">
                                ENTRAR
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="page-footer">
        <div class="container">
            <div class="row" style="margin-bottom: 0;">
                <div class="col s12">
                    <h5 class="white-text">FES Aragon</h5>
                    <p class="grey-text text-lighten-4" style="font-size: 0.9rem;">
                        Hecho en México, Universidad Nacional Autónoma de México (UNAM), todos los derechos reservados 2025.
                        Esta página puede ser reproducida con fines no lucrativos.
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container grey-text text-lighten-3">
                Creditos Materialize
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
