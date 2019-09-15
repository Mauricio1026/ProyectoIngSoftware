<?php
  session_start();
  require 'database.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT IdUsuario, nombre, apellido, cargo,nombreusuario, clave, correo, telefono FROM usuarios WHERE IdUsuario = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="Styles/Style.css">
	</head>

<body>
	<img src="Images/ImagenAdmin.jpg" width= "100%" height="400"/>	
		<?php if(!empty($user)): ?>
        <br> Bienvendio. <?= $user['correo']; ?>
        <br>Usted se encuentra logeado.
		<?php else: ?>
		<h2>LISTA DE DOCUMENTOS</h2>
		
        <a href= https://www.youtube.com/watch?v=oED2jnL8tec target=_blank><button>Presionar</button></a> 
		<a href="Salir.php"><button>Salir.</button></a>
		<?php endif; ?>
</body>
</html>