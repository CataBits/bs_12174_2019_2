<?php
// PHP em UTF-8
header("Content-type: text/html; charset=utf-8");

// Seleção do servidor de banco de dados //
//if ($_SERVER['SERVER_NAME'] == 'localhost') :
    // Conexão com MySQL do XAMPP
    $conn = new mysqli('localhost', 'root', 'usbw', 'semnome');
// else :
//     // Conexão com MySQL do provedor de hospedagem
//     // Preencha os campos conforme os dados do provedor
//     $conn = new mysqli('', '', '', '');
// endif;

// Testando conexão
if ($conn->connect_error) die("Falha na conexão com o DB: " . $conn->connect_error);

// Correção para caracteres acentuados no MySQL
// ATENÇÃO! Não se esqueça de sempre criar bases de dados no formato "utf8_general_ci"
$conn->query('SET NAMES utf8');
$conn->query('SET character_set_connection=utf8');
$conn->query('SET character_set_client=utf8');
$conn->query('SET character_set_results=utf8');

// MySQL com nomes de dias da semana e meses em português
$conn->query('SET GLOBAL lc_time_names = pt_BR');
$conn->query('SET lc_time_names = pt_BR');

/***** Funções globais *****/

// Sanitiza uma string da melhor forma
function sanitiza($texto) {

    // Remove espaços do começo e do fim de $texto
    $texto = trim($texto);

    // Procura e remove espaços duplicados no meio de $texto
    while( strpos($texto, '  ') )
        $texto = str_replace('  ', ' ', $texto);

    // Retorna a string sanitizada
    return $texto;

}

?>