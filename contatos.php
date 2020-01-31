<?php

// Configuração inicial da página
require ('_config.php');

/*********************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA FICAM AQUI */
/*********************************************/

// Declarando variáveis
$nome = $email = $assunto = $mensagem = $erro = $msgErro = $msgOk = '';

// Se o formulário foi enviado
if ( isset($_POST['enviado']) ) :

    // Obtém o nome do form
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    // Obtém o e-mail do form
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // Obtém o nome do form
    $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);

    // Obtém o nome do form
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
    

    echo ("{$nome} , {$email}, {$assunto}, {$mensagem}");
    exit();

endif;

/************************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA TERMINAM AQUI */
/************************************************/

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

        <form name="contatos" id="contatos" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8">
            <input type="hidden" name="enviado" value="ok">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Seu nome completo" value="Joca da Silva">
            </p>
            <p>
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" placeholder="nome@provedor.com" value="joca@silva.com">
            </p>
            <p>
                <label for="assunto">Assunto:</label>
                <input type="text" name="assunto" id="assunto" placeholder="Assunto do contato" value="Assunto do Joca">
            </p>
            <p>
                <label for="mensagem">Mensagem:</label>
                <textarea name="mensagem" id="mensagem" placeholder="Sua mensagem">Mensagem do Joca</textarea>
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