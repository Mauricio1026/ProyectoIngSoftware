<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Styles/Style.css">
        <title>Lista de Documentos</title>
    </head>
    <body>
    <center>
    <input type="button" value="Regresar" onClick="history.back()"  style='width:100px; height:30px'>
    </center>
        <table align="center" border="1" width="1000" cellspacing="2" cellpadding="2">
            <tr>
                <td align="center">titulo</td>
                <td align="center">tamaño</td>
                <td align="center">tipo</td>
                <td align="center">nombre</td>
            </tr>
        <?php
        include 'config_archivo.php';
        $db=new Conect_MySql();
        $sql = "select*from tbl_documentos";
        $query = $db->execute($sql);
        while($datos=$db->fetch_row($query)){?>
            <tr align="center">
                <td><?php echo $datos['titulo']; ?></td>
                <td><?php echo $datos['tamanio']; ?></td>
                <td><?php echo $datos['tipo']; ?></td>
                <td><a href="archivo.php?id=<?php echo $datos['id_documento']?>"><?php echo $datos['nombre_archivo']; ?></a></td>
            </tr>
               
          <?php  } ?>
            
        </table>
    </body>
</html>
