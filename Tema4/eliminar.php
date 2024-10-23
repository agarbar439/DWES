<?php
/*comprueba que el usuario haya abierto sesion o redirige*/
require_once 'sesiones.php';
comprobar_sesion();
$cod = $_POST['cod'];
$unidades = $_POST['unidades'];
/*si existe el codigo restamos las unidades */
if(isset($_SESSION['carrito'][$cod])){
    $_SESSION['carrito'][$cod] -= $unidades;
    if($_SESSION['carrito'][$cod]<=0){
        unset($_SESSION['carrito'][$cod]);
    }
}
header("location: carrito.php");