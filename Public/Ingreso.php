<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
    header('Location: /Public');
  }
  require 'database.php';

  if (!empty($_POST['nombre'])&& !empty($_POST['apellido'])&& !empty($_POST['cargo'])
        && !empty($_POST['nombreusuario'])&& !empty($_POST['clave'])
        && !empty($_POST['correo'])&& !empty($_POST['telefono'])) {
    $records = $conn->prepare('SELECT IdUsuario, nombre, apellido, cargo,nombreusuario, clave, correo, telefono FROM usuarios WHERE correo = :correo');
    $records->bindParam(':correo', $_POST['correo']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (count($results) > 0 && password_verify($_POST['clave'], $results['clave'])) {
      $_SESSION['user_id'] = $results['IdUsuario'];
      header("Location: Usuario//Public/Index.php");
    } else {
      $message = 'Lo lamentamos, los datos ingresados son erroneos';
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Styles/Admin.css">
    <link rel="stylesheet" href="Styles/Style.css">
    <link rel="shortcut icon" type="image/x-icon" href="Images/Icono.ico">
    <title>Administrador</title>
</head>
<header>
    <center>
    <nav class="navegacion">
        <ul class="Menu">
            <li><a href="Index.php">Inicio</a></li>
            <li><a href="Help.php">Ayuda</a></li>
        </ul>
    </nav>
    </center>
</header>

<body>

<?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>
    <center>
    <div class="login-box">
        <img src="Images/inicio.jpg" class="avatar" alt="Avatar Image">
        <h1>Iniciar Sesion</h1>
        <form action="Inicio_Admin.php" method="POST">
            <!-- USERNAME INPUT -->
            <b>Correo</b><input name="correo" type="email" placeholder="Ingresar Usuario">
            <!-- PASSWORD INPUT -->
            <b>Contraseña</b><input name="clave" type="password" placeholder="Ingresar Contraseña">
            <input type="submit" value="Iniciar"></a>
            <a href="Registro.php">¿No tienes una Cuenta?</a>
        </form>
    </div>
    </center>
</body>

</html>

</html>