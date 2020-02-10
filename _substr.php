<?php

/*
    Para saber mais sobre substr(), acesse:
    https://www.php.net/manual/pt_BR/function.substr.php
    e
    https://www.w3schools.com/php/func_string_substr.asp
*/

$var = "Atirei o pau no gato, mas o gato não morreu.";

// Pegando só "Atirei"
echo substr($var, 0, 6);
echo '<br>';

// Pegando "gato" (1ª)
echo substr($var, 16, 4);
echo '<br>';

// Pegando "mas o gato não morreu"
echo substr($var, 22, 22);
echo '<br>';

// Removendo o ponto final
echo substr($var, 0, -7);
echo '<br>';

?>