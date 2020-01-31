<?php

// Configuração inicial da página
require ('_config.php');

// Define o título "desta" página
$titulo = "Faça Contato";

// Aponta para o CSS "desta" página. Ex.: /css/contatos.css
// Deixe vazio para não usar CSS adicional nesta página
$css = "/css/contatos.css";

// Aponta para o JavaScript "desta" página. Ex.: /js/contatos.js
// Deixe vazio para não usar JavaScript adicional nesta página
$js = "";

// Inclui o cabeçalho do template
require ('_header.php');

?>

<div class="row">
    <div class="col1">

        <h2>Faça Contato</h2>
        <p>Preencha o formulário abaixo para entrar em contato com a equipe do site.</p>

        <form name="contatos" id="contatos" action="/processa.php" method="post" accept-charset="utf-8">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Seu nome completo">
            </p>
            <p>
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" placeholder="nome@provedor.com">
            </p>
            <p>
                <label for="assunto">Assunto:</label>
                <input type="text" name="assunto" id="assunto" placeholder="Assunto do contato">
            </p>
            <p>
                <label for="mensagem">Mensagem:</label>
                <textarea name="mensagem" id="mensagem" placeholder="Sua mensagem"></textarea>
            </p>
            <p>
                <label></label>
                <button type="submit">Enviar</button>
            </p>
        </form>

    </div>
    <div class="col2">

        <h3>Mais contatos</h3>
        <img src="/img/social01.png" alt="Mais contatos">
        <p>Você também pode falar conosco pelas redes sociais:</p>

        <ul>
            <li><a href="http://facebook.com/" target="_blank"><i class="fab fa-fw fa-facebook-square"></i> Facebook</a></li>
            <li><a href="http://youtube.com/" target="_blank"><i class="fab fa-fw fa-youtube-square"></i> Youtube</a></li>
            <li><a href="http://linkedin.com/" target="_blank"><i class="fab fa-fw fa-linkedin"></i> Linkedin</a></li>
            <li><a href="http://twitter.com/" target="_blank"><i class="fab fa-fw fa-twitter-square"></i> Twitter</a></li>
            <li><a href="http://instagram.com/" target="_blank"><i class="fab fa-fw fa-instagram"></i> Instagram</a></li>
        </ul>

    </div>
</div>









<?php

// Inclui o rodapé do template
require ('_footer.php');

?>