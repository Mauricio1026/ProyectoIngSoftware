<?php
    require'database.php';
    $message ='';
    if(!empty($_POST['nombre'])&& !empty($_POST['apellido'])&& !empty($_POST['cargo'])
        && !empty($_POST['nombreusuario'])&& !empty($_POST['clave'])
        && !empty($_POST['correo'])&& !empty($_POST['telefono'])){
            $sql= "INSERT INTO usuarios (nombre,apellido,cargo,nombreusuario,clave,correo,telefono) VALUES (:nombre,:apellido,:cargo,:nombreusuario,:clave,:correo,:telefono)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nombre', $_POST['nombre']);
            $stmt->bindParam(':apellido', $_POST['apellido']);
            $stmt->bindParam(':cargo', $_POST['cargo']);
            $stmt->bindParam(':nombreusuario', $_POST['nombreusuario']);
            $stmt->bindParam(':correo', $_POST['correo']);
            $stmt->bindParam(':telefono', $_POST['telefono']);
            $clave = password_hash($_POST['clave'], PASSWORD_BCRYPT);
            $stmt ->bindParam(':clave', $clave);

                if($stmt->execute()){
                    $message ='Se creo el Usuario Correctamente';
                }else{
                    $message = 'No se pudo realizar la creacion de la cuenta ';
                }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="Images/Icono.ico">
    <link rel="stylesheet" href="Styles/style.css">
    <title>Registro Usuario</title>
</head>
<body>
    <header>
        <center>
    <nav class="navegacion">
            <ul class="Menu">
                <li><a href="Index.php">Inicio</a></li>
                <li><a href="Registro.php">Registro</a></li>
                <li><a href="Ingreso.php">Acceso</a></li>
                <li><a href="Help.php">Ayuda</a></li>
            </ul>
        </nav>
        </center>
    </header>
    <h2>REGISTRO PARA USUARIOS</h2>
    <h2>Los campos con (*) son obligatorios.</h2>
    <section>
    <center>
        <form action="Registro.php" method="POST">
            <b>*Nombre</b><input name="nombre" type="text" placeholder="Ingrese su nombre">
            <b>*Apellido</b><input name="apellido" type="text" placeholder="Ingrese su apellido">
            <b>*Cargo </b><input name="cargo" type="text" placeholder="Ingrese su cargo">
            <b>*Nombre de usuario </b><input name="nombreusuario" type="text" placeholder="Ingrese su nombre de usuario">
            <b>*Clave</b><input name="clave" type="password" placeholder="Ingrese su clave">
            <b>*Confirmar CLave</b><input name="confirmarclave" type="password" placeholder="confirme su clave">
            <b>*Correo</b><input name="correo" type="email" placeholder="Ingrese su correo">
            <b>*Telefono</b><input name="telefono" type="text" placeholder="Ingrese su telefono">
            <br>
            <input type="submit" value="Registrar" class="btn btn-submit"/><br>
            <input type="reset" class="btn btn-submit" /> 
        </form>
    </center>
    </section>
    <?php
        if(!empty($message)):
    ?>
    <p><?= $message ?></p>
        <?php endif; ?>
</body>

</html>