<?php
    $nombre         = $_POST['nombre'];
    $apellido       = $_POST['apellido'];
    $cargo          = $_POST['cargo'];
    $nombreusuario  = $_POST['nombreusuario'];
    $clave          = $_POST['clave'];
    $confirmarclave = $_POST['confirmarclave'];
    $correo         = $_POST['correo'];
    $telefono       = $_POST['telefono'];
    $error_message = "";
    $reqlen         =strlen($clave) * strlen($telefono) * strlen($confirmarclave);
    if ($reqlen > 0){
        require("database.php");
        $result = mysqli_query($conn,"INSERT INTO usuarios VALUES ('','$nombre','$apellido','$cargo','$nombreusuario','$clave','$confirmarclave', '$correo','$telefono')"); 
        mysqli_close($conn);
       
    if (strlen($clave) < 6) {
        $error_message = "La contraseña es demasiado corta. Por favor, introduzca al menos 6 caracteres.";
    
    } else if( $clave == $_POST["confirmarclave"]){
        $error_message = "Las contraseñas coinciden";
        
    }else if ( $clave != $_POST["confirmarclave"]) {
        $error_message = "Las contraseñas no coinciden. Por favor, inténtelo de nuevo";
        
    } 
        echo $error_message;
        echo "El registro se ha hecho satisfactoriamente";            
    }else {
        echo "Por favor, rellene todos los campos requeridos";
    }
?>
