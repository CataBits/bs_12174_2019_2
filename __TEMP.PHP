// Monta query que obtém a lista de artigos
$sql = <<<SQL

SELECT id_artigo, thumb_artigo, titulo, resumo
FROM artigos
WHERE
    status_artigo = 'ativo'
    AND
    data_artigo <= NOW()
ORDER BY data_artigo DESC;

SQL;

// Executar a query
$res = $conn->query($sql);

// Cria subtítulo com total de artigos
$total = $res->num_rows;
if ( $total > 1) $subtitulo = "Total de {$total} artigos. Mais recentes primeiro.";
else $subtitulo = "Total de {$total} artigo. Mais recentes primeiro.";

// Obter cada registro e gerar a view
while ( $art = $res->fetch_assoc() ):

    $artigos .= <<<TEXTO

<div class="artigo">
    <a href="/artigo.php?id={$art['id_artigo']}">
        <img src="{$art['thumb_artigo']}" alt="{$art['titulo']}">
        <h3>{$art['titulo']}</h3>
    </a>
    <span>{$art['resumo']}</span>
</div>

TEXTO;

endwhile;