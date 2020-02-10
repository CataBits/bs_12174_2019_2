<?php

// Configuração inicial da página
require ('_config.php');

// Define o título "desta" página
$titulo = "Artigo";

// Opção ativa no menu principal
// Valores possíveis: "", "artigos", "noticias", "contatos", "sobre", "procurar"
// Valores diferentes destes = ""
$menu = "artigos";

// Aponta para o CSS "desta" página. Ex.: /css/contatos.css
// Deixe vazio para não usar CSS adicional nesta página
$css = "/css/artigos.css";

// Aponta para o JavaScript "desta" página. Ex.: /js/contatos.js
// Deixe vazio para não usar JavaScript adicional nesta página
$js = "";

/*********************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA FICAM AQUI */
/*********************************************/

// Ler o id do artigo da URL
$id = ( isset($_GET['id']) ) ? intval($_GET['id']) : 0;

// Se não pediu um artigo (id não informado)
if ( $id == 0 ) header('Location: artigos.php');

// Pesquisando artigo no banco de dados
$sql = <<<SQL

SELECT id_artigo, data_artigo, titulo, texto, autor_id,
    thumb_autor, nome_autor, nome_tela, site, curriculo, nascimento
    FROM artigos
    INNER JOIN autores ON autor_id = id_autor
WHERE
    id_artigo = '{$id}'
    AND status_artigo = 'ativo'
    AND data_artigo <= NOW()
;

SQL;
exit($sql);

/************************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA TERMINAM AQUI */
/************************************************/

// Inclui o cabeçalho do template
require ('_header.php');

?>



<?php

// Inclui o rodapé do template
require ('_footer.php');

?>
