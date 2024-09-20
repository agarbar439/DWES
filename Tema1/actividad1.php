
   
    <?php
    /*Escribe un programa que calcule el factorial de un número.
     Recuerda que el factorial solo está definido para números enteros mayores o iguales que cero*/

    $factorial = 1;
    $numero = 5;

    for ($i = 1; $i <= $numero; $i++) {
        $factorial = $factorial * $i;
    }

    echo "El factorial de " . $numero . " es " . $factorial;
    ?>
