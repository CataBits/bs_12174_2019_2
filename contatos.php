<?php

// Define o título "desta" página
$titulo = "Faça Contato";

// Aponta para o CSS "desta" página. Ex.: /css/contatos.css
// Deixe vazio para não usar CSS adicional nesta página
$css = "";

// Aponta para o JavaScript "desta" página. Ex.: /js/contatos.js
// Deixe vazio para não usar JavaScript adicional nesta página
$js = "";

// Inclui o cabeçalho do template
require ('_header.php');

?>

<form name="contatos" id="contatos" action="/processa.php" method="post">

    <p>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Seu nome completo">
    </p>
    <p>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="nome@provedor.com">
    </p>


</form>

<?php

// Inclui o rodapé do template
require ('_footer.php');

?>