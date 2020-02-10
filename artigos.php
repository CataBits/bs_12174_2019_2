<?php

// Configuração inicial da página
require ('_config.php');

// Define o título "desta" página
$titulo = "Artigos";

// Opção ativa no menu principal
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

// 'Declarar' variáveis
$artigos = '';      // Armazena a view de artigos
$categorias = '';   // Armazena a view de categorias
$titulopagina = $titulo;

// Ler o Id da categoria
$idcat = ( isset($_GET['cat']) ) ? intval( $_GET['cat'] ) : 0 ;

// Se idcat = 0 pediu todos os artigos
if ( $idcat == 0 ) :

    // Obtendo ids de todos os artigos
    $sql = <<<SQL

SELECT id_artigo FROM artigos
    WHERE status_artigo = 'ativo'
        AND data_artigo <= NOW()
    ORDER BY data_artigo DESC;

SQL;
    $res = $conn->query($sql);

    // Cria subtítulo com total de artigos
    $total = $res->num_rows;
    if ( $total > 1) $subtitulo = "{$total} artigos. Mais recentes primeiro.";
    else $subtitulo = "{$total} artigo.";

    // Obtendo cada artigo
    while ( $art = $res->fetch_assoc() ):

        // Listando os artigos em "$artigos" usando a função
        $artigos .= viewartigo( $art['id_artigo'] );

    endwhile;


// Se idcat > 0 pediu os artigos de uma categoria
else:

    // Lista os artigos de uma categoria
    $sql = <<<SQL

SELECT artigo_id 
    FROM art_cat
    INNER JOIN artigos ON artigo_id = id_artigo
WHERE 
    categoria_id = '{$idcat}'
    AND status_artigo = 'ativo'
    AND data_artigo <= NOW()
ORDER BY data_artigo DESC
;

SQL;

    // Executar a query
    $res = $conn->query($sql);

    // Cria subtítulo com total de artigos
    $total = $res->num_rows;
    if ( $total == 0) header('Location: artigos.php');
    elseif ( $total > 1) $subtitulo = "{$total} artigos. Mais recentes primeiro.";
    else $subtitulo = "{$total} artigo.";

    // Obtendo cada artigo
    while ( $art = $res->fetch_assoc() ):

        // Listando os artigos em "$artigos" usando a função
        $artigos .= viewartigo( $art['artigo_id'] );

    endwhile;

    // Título da página
    $sql = <<<SQL

SELECT categoria FROM categorias 
WHERE id_categoria = '{$idcat}';

SQL;

    // Executar a query
    $res = $conn->query($sql);

    // Obtendo o nome
    $catname = $res->fetch_assoc();

    // Títulos
    $titulo = "Artigos em {$catname['categoria']}";
    $titulopagina = $titulo;

endif;

// Obtendo os nomes das categorias
$sql = "SELECT * FROM categorias";
$res = $conn->query($sql);

// Preparação da view
$categorias .= <<<TEXTO

<ul>
    <!--
    <li><a href="/artigos.php">Todas as categorias</a></li>
    <hr>
    -->
TEXTO;

// Obtendo cada registro
while ( $cat = $res->fetch_assoc() ) :

    $sql2 = <<<SQL
SELECT COUNT(id_art_cat) AS totalart 
FROM art_cat
WHERE categoria_id = '{$cat['id_categoria']}';
SQL;
    $res2 = $conn->query($sql2);
    
    // Total de artigos nesta categoria
    $tot = $res2->fetch_assoc();
    $totalart = intval( $tot['totalart'] );

    // Se o total de artigos for maior que 0
    if ( $totalart > 0 ) {
        $categorias .= <<<TEXTO

    <li>
        <a href="/artigos.php?cat={$cat['id_categoria']}">{$cat['categoria']}</a>
        <sup>{$totalart}</sup>
    </li>
TEXTO;
    }

endwhile;

$categorias .= <<<TEXTO

</ul>
<hr>
<p class="center"><a href="/artigos.php">Todas as categorias</a></p>

TEXTO;

/************************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA TERMINAM AQUI */
/************************************************/

// Inclui o cabeçalho do template
require ('_header.php');

?>

<div class="row">
    <div class="col1">

        <h2><?php echo $titulopagina ?></h2>
        <p class="totalart"><?php echo $subtitulo ?></p>
        <?php echo $artigos ?>

    </div>
    <div class="col2">

        <h3>Categorias</h3>
        <?php echo $categorias ?>

    </div>
</div>

<?php

// Inclui o rodapé do template
require ('_footer.php');

// Função que gera a view de um artigo
function viewartigo($id) {

    // Obtém a variável $conn do escopo global
    global $conn;

    // Obtendo artigo do banco de dados
    $sql = <<<SQL

SELECT id_artigo, thumb_artigo, titulo, resumo
FROM artigos
WHERE id_artigo = '{$id}'
    AND status_artigo = 'ativo'
    AND data_artigo <= NOW()
;

SQL;
    $res = $conn->query($sql);

    // Se achou o artigo
    if ( $res->num_rows == 1 ):

        // Gerar a view do artigo
        $art = $res->fetch_assoc();

        $artigo = <<<TEXTO

<div class="artigo">
    <a href="/artigo.php?id={$art['id_artigo']}">
        <img src="{$art['thumb_artigo']}" alt="{$art['titulo']}">
        <h3>{$art['titulo']}</h3>
    </a>
    <span>{$art['resumo']}</span>
</div>

TEXTO;

        // Retorna com o artigo pronto
        return $artigo;

    // Se o artigo não existe ou é inválido
    else:

        // Retorna com false;
        return false;

    endif;

} 

?>