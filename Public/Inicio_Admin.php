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
		<title>Inicio Usuario</title>
		<link rel="stylesheet" href="Styles/Style.css">
	</head>

<body>

		<?php if(!empty($user)): ?>
        <br> Bienvendio. <?= $user['correo']; ?>
        <br>Usted se encuentra logeado.
    <?php else: ?>
    <center>
      <a href="Salir.php"><input type="button"class="btn btn-submit" value="salir"></a>
      </center>
    <img src="Images/ImagenAdmin.jpg" width= "100%" height="400"/>	
    
    <div style="width: 500px;margin: auto;border: 1px solid blue;padding: 30px;">
            <h4>Subir PDF</h4>
            <form method="post" action="" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label>Titulo</label></td>
                    </tr>
                    <tr>
                      <td><input type="text" name="titulo"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="file" name="archivo"></td>
                    <tr>
                        <td><input type="submit" value="subir" name="subir" ></td>
                    </tr>
                    <tr>
                      <td><a href="subir_archivos/lista.php"><input type="button" value="Lista" class="btn btn-submit"></a></td>
                    </tr>
                </table>
            </form>            
        </div>
        
    <?php endif; ?>
    <?php
  include_once 'subir_archivos/config_archivo.php';
  if (isset($_POST['subir'])) {
  $nombre = $_FILES['archivo']['name'];
  $tipo = $_FILES['archivo']['type'];
  $tamanio = $_FILES['archivo']['size'];
  $ruta = $_FILES['archivo']['tmp_name'];
  $destino = "archivos/" . $nombre;
  if ($nombre != "") {
      if (copy($ruta, $destino)) {
          $titulo= $_POST['titulo'];
          $db=new Conect_MySql();
          $sql = "INSERT INTO tbl_documentos(titulo,tamanio,tipo,nombre_archivo) VALUES('$titulo','$tamanio','$tipo','$nombre')";
          $query = $db->execute($sql);
          if($query){
              echo "Se guardo correctamente";
          }
      } else {
          echo "Error";
      }
  }
}
?>
</body>
</html>