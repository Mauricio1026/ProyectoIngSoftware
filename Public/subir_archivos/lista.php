<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
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
            <tr>
                <td><?php echo $datos['titulo']; ?></td>
                <td><?php echo $datos['tamanio']; ?></td>
                <td><?php echo $datos['tipo']; ?></td>
                <td><a href="archivo.php?id=<?php echo $datos['id_documento']?>"><?php echo $datos['nombre_archivo']; ?></a></td>
            </tr>
                
          <?php  } ?>
            
        </table>
    </body>
</html>
