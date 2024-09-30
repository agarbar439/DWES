<?php
// Antonio Garcia Barrera
/*Escribe un fichero que reciba dos parámetros, num1 y num2 y muestre su suma. Hay que comprobar que lo dos argumentos existan y sean números.*/

// Funcion para calcular la suma
function calcularSuma($num1, $num2){
    if(!is_numeric($num1) || !is_numeric($num2)){ // Comprobar que son numericos
       echo "Error, deben de ser numéricos";
    } elseif (empty($num1) || empty($num2)){ // Comprobar que los campos no esten vacios
       echo "Error, el campo no puede estar vacío";
    } else{
        echo $num1 + $num2; // Imprimir resultado
    }
}

// Comprobación
calcularSuma(2, 1);
echo "\n";
echo calcularSuma("a", 3) . "\n";
?>