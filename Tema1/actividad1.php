
   <?php
    /*Escribe un programa que calcule el factorial de un número.
     Recuerda que el factorial solo está definido para números enteros mayores o iguales que cero*/

    // Inicializar la variable factorial 
    $factorial = 1;

    // Definir el número del que queremos calcular el factorial
    $numero = 5;

    for ($i = 1; $i <= $numero; $i++) {
        // En cada iteración se multiplica el valor acumulado de factorial por el valor actual de $i
        $factorial = $factorial * $i;
    }

    // Mostrar el resultado concantenando las variables
    echo "El factorial de " . $numero . " es " . $factorial;
    ?>
