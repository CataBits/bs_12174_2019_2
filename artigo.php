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

// SQL da lista de recomendados
$sqlrec = "SELECT artigo_id FROM art_cat WHERE artigo_id != '{$art['id_artigo']}' AND (";

// Montando o HTML com a lista de categorias
while ( $cat = $res->fetch_assoc() ) :

    // View das categorias
    $categorias .= "<a href=\"\artigos.php?cat={$cat['id_categoria']}\">{$cat['categoria']}</a>, ";

    // SQL da lista de recomendados
    $sqlrec .= " categoria_id = '{$cat['id_categoria']}' OR";

endwhile;

// Atualizando artigo com as categorias
$artigo .= substr($categorias, 0, -2) . '.</div>';

// Lista de recomendados
$sqlrec = substr($sqlrec, 0, -2) . ") ORDER BY RAND() LIMIT 3;";

// Executa lista de recomendados
$res = $conn->query($sqlrec);

// View da lista de recomendados
$viewrec = '<div class="row">';

// Loop da lista de recomendados
while ( $rec = $res->fetch_assoc() ) :

    $sql = <<<SQL
    
SELECT id_artigo, thumb_artigo, titulo, resumo
FROM artigos
WHERE 
    id_artigo = '{$rec['artigo_id']}'
    AND status_artigo = 'ativo'
    AND data_artigo <= NOW()
;
    
SQL;

exit($sql);

    $viewrec .= <<<TEXTO

    <div class="col">
        <a href="/artigo.php?id={id_artigo}">
            <img src="{thumb_artigo}" alt="{titulo}">
            <h4>{titulo}</h4>
        </a>
        <span>{resumo}</span>
    </div>

TEXTO;

endwhile;

$viewrec .= "</div>";

exit($viewrec);

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
