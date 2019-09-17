<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de archivos</title>
    </head>
    <body>
        <?php
        include 'config_archivo.php';
        $db=new Conect_MySql();
            $sql = "SELECT * FROM tbl_documentos WHERE id_documento=".$_GET['id'];
            $query = $db->execute($sql);
            if($datos=$db->fetch_row($query)){
                if($datos['nombre_archivo']==""){?>
        <p>NO tiene archivos</p>
                <?php }else{ ?>
        <iframe src="archivos/<?php echo $datos['nombre_archivo']; ?>"></iframe>
                <?php } } ?>
    </body>
</html>
