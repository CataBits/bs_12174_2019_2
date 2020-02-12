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
$js = "/js/artigos.js";

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
        thumb_autor, nome_autor, nome_tela, email,
        site, curriculo, telefone, nascimento,
        DATE_FORMAT(data_artigo, '%d/%m/%Y às %H:%i') AS databr
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
    <a href="{$art['site']}" id="modalAutor" target="_blank">{$art['nome_tela']}</a>
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

// Se não tem artigos recomendados
if ( $res->num_rows < 1 ) :

    $viewrec = '';

else :

    // View da lista de recomendados
    $viewrec = <<<TEXTO

<div class="recomendados">    
    <h3>Leia também...</h3>
    <div class="row">

TEXTO;

    // Loop da lista de recomendados
    while ( $rec = $res->fetch_assoc() ) :

        // Query que obtém o artigo
        $sqlart = <<<SQL
        
    SELECT id_artigo, thumb_artigo, titulo, resumo
    FROM artigos
    WHERE 
        id_artigo = '{$rec['artigo_id']}'
        AND status_artigo = 'ativo'
        AND data_artigo <= NOW()
    ;
        
SQL;

        // Executa a query que obtém o artigo
        $resart = $conn->query($sqlart);

        // Obtem os campos do artigo
        $artrec = $resart->fetch_assoc();

        // Gerando o view
        $viewrec .= <<<TEXTO

        <div class="col3">
            <a href="/artigo.php?id={$artrec['id_artigo']}">
                <img src="{$artrec['thumb_artigo']}" alt="{$artrec['titulo']}">
                <h4>{$artrec['titulo']}</h4>
            </a>
            <span>{$artrec['resumo']}</span>
        </div>

TEXTO;

    endwhile;

    $viewrec .= "\n\t</div>\n</div>";

endif;

// Calcular idade do autor
$dataNascimento = $art['nascimento'];
$date = new DateTime($dataNascimento);
$interval = $date->diff( new DateTime( date('Y-m-d') ) );
$idadeautor = $interval->format( '%Y anos' );

// Modal com dados do autor
$mautor = <<<TEXTO

<div id="modal" class="modal">

    <a href="#fechar" class="fechamodal"><i class="fas fa-fw fa-times"></i></a>
    
    <div class="wrapmodal">

        <div class="autor">
            <div class="autortit">
                <span>Sobre o autor</span>
                <a href="#fechar" class="fechamodal"><i class="fas fa-fw fa-times"></i></a>
            </div>
            <div class="autorid">
                <img src="{$art['thumb_autor']}" alt="{$art['nome_tela']}">
                <h4>{$art['nome_tela']}</h4>
                <small>{$art['nome_autor']}</small>
                <div>{$idadeautor}</div>
            </div>
            <div class="curriculo">{$art['curriculo']}</div>
            <ul>
                <li>Site: <a href="{$art['site']}" target="_blank">{$art['site']}</a></li>
                <li>E-mail: <a href="mailto:{$art['email']}" target="_blank">{$art['email']}</a></li>
                <li>Telefone(s): {$art['telefone']}</li>
            </ul>
            <div class="autorft">
                <a href="#fechar" class="fechamodal">Fechar</a>
            </div>
        </div>
    </div>

</div>

TEXTO;

/************************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA TERMINAM AQUI */
/************************************************/

// Inclui o cabeçalho do template
require ('_header.php');

?>

<?php echo $artigo ?>

<?php echo $viewrec ?>

<?php echo $mautor ?>

<?php

// Inclui o rodapé do template
require ('_footer.php');

?>
