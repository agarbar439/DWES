<?php
// Antonio Garcia Barrera
/* Añade un vínculo para borrar la cookie del ejemplo del libro: "contador_visitas.php" */

if (!isset($_COOKIE['visitas'])) { // si no existe
    setcookie('visitas', 1, time() + 3600 * 24);
    echo "Bienvenido por primera vez";
} else { // si existe
    $visitas = (int) $_COOKIE['visitas'];
    $visitas++; // Se reescribe incrementada
    setcookie('visitas', $visitas, time() + 3600 * 24);
    echo "Bienvenido por $visitas vez";
}
if($visitas== 10){
  setcookie('visitas', '1', time() - 3600 * 24);
    echo "Has llegado al límite de visitas";
}
/*
if (isset($_GET['borrar'])) {
    setcookie('visitas', '', time() - 3600 * 24);
    echo "Visitas borradas";
}
?>
<a href="?borrar=true">Borrar cookie</a>
*/