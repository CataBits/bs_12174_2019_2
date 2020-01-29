<?php

// Tratamento do título da página
if ($titulo == "") {
    $titulo = "Sem Nome - O melhor de todos.";
} else {
    $titulo = "{$titulo} - Sem Nome";
}

// Tratamento do CSS da página
if ($css != "") {
    $css = "<link rel=\"stylesheet\" href=\"{$css}\">\n";
} else {
    $css = null;
}

?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo ?></title>
    <link rel="shortcut icon" href="/img/logo01.png">
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <?php echo $css ?>
</head>
<body>
<a id="topo"></a>

<div class="wrap">

    <header class="header">
        <a href="/" title="Sem Nome - O melhor de todos"><img src="img/logo01.png" alt="Sem Nome"></a>
        <h1>Sem Nome<small>O melhor de todos.</small></h1>
    </header>

    <nav class="nav">
        <a href="/"><i class="fas fa-fw fa-home"></i></a>
        <div id="menulinks">
            <a href="/artigos.php"><i class="fas fa-fw fa-pen-nib"></i> Artigos</a>
            <a href="/noticias.php"><i class="fas fa-fw fa-newspaper"></i> Notícias</a>
            <a href="/contatos.php"><i class="fas fa-fw fa-mail-bulk"></i> Contatos</a>
            <a href="/sobre.php"><i class="fas fa-fw fa-info-circle"></i> Sobre</a>
            <a href="/procurar.php" id="procurar" title="Procurar no site"><i class="fas fa-fw fa-search"></i><span> Procurar</span></a>
        </div>
        <a href="#menu" id="menu"><i class="fas fa-fw fa-bars"></i></a>
    </nav>

    <main class="main">