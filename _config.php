<?php

// PHP em UTF-8
header("Content-type: text/html; charset=utf-8");

///// Conexão com o MySQL /////

// Se estou acessando a página pelo XAMPP
if ($_SERVER['SERVER_NAME'] == 'localhost') {

    $servidor = 'localhost';    // endereço do servidor MySQL no XAMPP 
    $usuario = 'root';          // usuário do MySQL no XAMPP
    $senha = '';                // senha do MySQL no XAMPP
    $banco = 'semnome';         // banco de dados no XAMPP

} else {

    // * ATENÇÃO! Dados 'fake' só de exemplo
    $servidor = '200.100.10.1';     // endereço do servidor no provedor 
    $usuario = 'semnome12124448';   // usuário do MySQL no provedor
    $senha = 'senhasemnome123';     // senha do MySQL no provedor
    $banco = 'semnome12124448';     // banco de dados no provedor

}

// Conecta com MySQL
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Caso dê erro de conexão
if ($conn->connect_error) {
    die("Erro grave: " . $conn->connect_error);
}

<?php
// PHP em UTF-8
header("Content-type: text/html; charset=utf-8");

// Seleção do servidor de banco de dados //
if($_SERVER['SERVER_NAME'] == 'localhost'):
   // Conexão com MySQL do XAMPP
    $conn = new mysqli('localhost', 'root', '', 'empereza');
else:
    // Conexão com MySQL do provedor de hospedagem
   // Preencha os campos conforme os dados do provedor
   $conn = new mysqli('', '', '', '');
endif;

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

?>