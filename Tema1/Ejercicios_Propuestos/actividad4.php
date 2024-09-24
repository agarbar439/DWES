<?php

//4. Escribe una funcion que reciba una cadena y comprueba si es un palindromo.

function comprobarPalindromo($cadena)
{
    $pasarMinusculasReemplazar = strtolower(str_replace(
        ["á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú"], // Caracteres con acento
        ["a", "e", "i", "o", "u", "a", "e", "i", "o", "u"], // Caracteres sin acento
        $cadena
    ));

    $procesado = strrev($pasarMinusculasReemplazar);

    if ($cadena === $procesado ) {
        echo "Es un palindromo";
    } else {
        echo "No es un palindromo";
    }
}

comprobarPalindromo("as");
