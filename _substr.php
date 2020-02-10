<?php

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

?>