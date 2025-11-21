<?php
include('db.php');

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET name='$name', password='$password' WHERE id=$id";
    
    if ($conexion->query($sql) === TRUE) {
        header('Location: ../index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../Vistas/css/2-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   
    <title>Editar usuario</title>
</head>
<header class="coffe">
     <section class="container centet-align">
       <h1 class="white-text">Fes Aragon</h1>
       </section>
   
    </header>
  
    <main>
    <section>
    <div>
      <form action="update.php" method="POST">
    <label for="name">Nombre:</label><br><br>
    <input type="text" id="name" name="name" required><br><br>
        
    <label for="password">Contraseña:</label><br><br>
    <input type="password" id="password" name="password" required><br><br>
    
        <section class="center-align"></section>
    <input class="input waves-effect waves-light light-blue darken-4" type="submit" value="Guardar Usuario">
    </form><br> 
     <button class="btm waves-effect waves-light"><a href="../index.php">Regresar a la lista</a></button>
      </div>
    </section>
    </main><br><br>
   <footer class="page-footer deep-coffe accent-3">
          <div class="container center-align">
            <div>
              <div>
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
            </div>
          </div>
          <div class="footer-copyright center-align">
            <div class="container">
            © 2025 Copyright Text
            </div>
          </div>
        </footer>
    
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    

</body>
</html>