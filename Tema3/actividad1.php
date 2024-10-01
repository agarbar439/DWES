<?php
// Antonio Garcia Barrera
/* Escribe un fichero que reciba dos parámetros, num1 y num2 y muestre su suma. Hay que comprobar que los dos argumentos existan y sean números. */

// Función para calcular la suma
function calcularSuma($num1, $num2) {
    if (!empty($_GET[$num1]) || !empty($_GET[$num2])) { // Comprobar que los parámetros existen
        echo "Error, los parámetros deben existir";
    } elseif (!is_numeric($_GET[$num1]) || !is_numeric($_GET[$num2])) { // Comprobar que son numéricos
        echo "Error, deben de ser numéricos";
    } else {
        echo $_GET[$num1] + $_GET[$num2]; // Imprimir resultado
    }
}

?>