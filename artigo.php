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

SELECT id_artigo, titulo, texto, autor_id,
        thumb_autor, nome_autor, nome_tela, site, curriculo,
        DATE_FORMAT(data_artigo, '%d/%m/%Y às %H:%i') AS databr,
        DATE_FORMAT(nascimento, '%d/%m/%Y') AS nascautor
    FROM artigos
    INNER JOIN autores ON autor_id = id_autor
WHERE
    id_artigo = '{$id}'
    AND status_artigo = 'ativo'
    AND data_artigo <= NOW()
;

SQL;

    // Executar a query
    $res = $conn->query($sql);

    // Se o artigo não exite
    if ( $res->num_rows != 1 ) header('Location: artigos.php');

    // Obtendo campos do artigo
    $art = $res->fetch_assoc();

    // View do artigo
    $artigo = <<<TEXTO

<h2>{$art['titulo']}</h2>
<p class="totalart">
    Por
    <a href="{$art['site']}" target="_blank">{$art['nome_tela']}</a>
    em
    {$art['databr']}.
</p>
{$art['texto']}

TEXTO;

// Obtendo as categorias deste artigo
$sql = <<<SQL

SELECT id_categoria, categoria FROM art_cat
INNER JOIN categorias ON categoria_id = id_categoria
WHERE artigo_id = '{$art['id_artigo']}'
ORDER BY categoria;

SQL;

// Executando a query
$res = $conn->query($sql);

// Listando cada categoria
$categorias = '<div class="catlist"><strong>Categorias:</strong> ';

// Montando o HTML com a lista de categorias
while ( $cat = $res->fetch_assoc() ) :

    // View das categorias
    $categorias .= "<a href=\"\artigos.php?cat={$cat['id_categoria']}\">{$cat['categoria']}</a>, ";

endwhile;

// Atualizando artigo com as categorias
$artigo .= substr($categorias, 0, -2) . '.</div>';

/************************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA TERMINAM AQUI */
/************************************************/

// Inclui o cabeçalho do template
require ('_header.php');

?>

<?php echo $artigo ?>

<h3>Artigos recomendados</h3>

<?php

// Inclui o rodapé do template
require ('_footer.php');

?>
