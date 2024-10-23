<?php
/*Comprueba que el usuario haya abierto sesión o redirige */
require_once 'bd.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de categorías</title>
    </head>
    <body>
        <?php require 'cabecera.php';?>
        <!--Listar categorias-->

        <?php
        $categorias = cargar_categorias($bd);
        if($categorias===FALSE){
            echo "<p class='error'>Error al conectar con la base de datos</p>";
        } else{
            echo "<ul>"; // abrir la lista
            foreach($categorias as $cat){
                /* $cat['nombre] $cat['codCat'] */
                $url = "productos.php?categoria=".$cat['codCat'];
                echo "<li><a href='$url'>".$cat['nombre']."</a></li>";
            }
            echo "</ul>";
        }


        ?>
    </body>
</html>