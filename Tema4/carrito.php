<?php
/*comprueba que el usuario haya abierto sesion o <redirige>*/
require_once 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Carrito de la compraº</title>
</head>

<body>
    <?php
    require 'cabecera.php';
    echo "<h2>Carrito de la compra</h2>";
    $productos = cargar_productos(array_keys($_SESSION['carrito']));
    if ($productos === false) {
        echo "<p>No hay productos en el pedido</p>";
        exit;
    }
    echo "<h2>Carrito de la compra</h2>";
    echo "<table>"; // abrir la tabla
    echo "<tr><th>Nombre</th><th>Descripcion</th><th>Peso</th>
            <th>Unidades</th><th>Eliminar</th></tr>";

    foreach ($productos as $producto) {
        $cod = $producto['CodProd'];
        $nom = $producto['Nombre'];
        $des = $producto['Descripcion'];
        $peso = $producto['Peso'];
        $unidades = $_SESSION['carrito'][$cod];

        echo "<tr><td>$nom</td><td>$des</td><td>$peso</td><td>$unidades</td>
            <td>
                <form action = 'eliminar.php.php' method='POST'>
                     <input name ='unidades' type='number' min='1' value='1'>
                    <input type='submit' value='Eliminar'>
                    <input name='cod' type='hidden' value = '$cod'>
              </form>
            </td>
        </tr>";
    }
    echo "</table>";
    ?>
    <hr>
    <za href="procesar_pedido.php">Realizar pedido</a>
</body>

</html>