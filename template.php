<?php

// Configuração inicial da página
require ('_config.php');

// Define o título "desta" página
$titulo = "";

// Opção ativa no menu principal
// Valores possíveis: "", "artigos", "noticias", "contatos", "sobre", "procurar"
// Valores diferentes destes = ""
$menu = "";

// Aponta para o CSS "desta" página. Ex.: /css/contatos.css
// Deixe vazio para não usar CSS adicional nesta página
$css = "";

// Aponta para o JavaScript "desta" página. Ex.: /js/contatos.js
// Deixe vazio para não usar JavaScript adicional nesta página
$js = "";

/*********************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA FICAM AQUI */
/*********************************************/



/************************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA TERMINAM AQUI */
/************************************************/

// Inclui o cabeçalho do template
require ('_header.php');

?>

<h2>Lorem ipsum dolor</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget euismod nibh. Sed dictum, risus vel imperdiet semper, dolor nulla tristique elit, non pharetra quam purus non ligula. Donec a orci viverra, maximus urna a, blandit nunc. Nullam tincidunt tortor in porta aliquet. Phasellus consequat mauris nec leo aliquet bibendum. Donec in interdum risus. Vivamus feugiat quam at tortor venenatis rutrum. Vestibulum eget iaculis metus, et aliquam tellus.</p>
<p>In sollicitudin tincidunt erat, at vulputate urna convallis vel. Nulla finibus nec lorem a aliquet. Duis semper tempus nisi nec fringilla. Vestibulum ultricies dapibus libero sed porta. In purus nulla, rutrum vel imperdiet in, aliquet sed dui. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
<img class="responsiva" src="https://picsum.photos/400/200" alt="Imagem aleatória">
<p>Praesent justo ex, gravida eget nulla quis, volutpat feugiat nisl. Phasellus interdum sollicitudin justo, id interdum libero vulputate ac. Aliquam sed tristique libero, eu rutrum mauris. Mauris tincidunt nisl leo, efficitur dignissim quam tempus quis. Ut id ante quis nisi faucibus semper vel dignissim urna. Aenean at dapibus orci. Curabitur gravida lorem tortor, sed vehicula justo congue eu.</p>
<h2>Etiam molestie</h2>
<p>Etiam molestie, magna sed viverra aliquam, lorem est pellentesque mi, sit amet fermentum ante purus et justo. Duis sapien nulla, consectetur sit amet finibus nec, consectetur vitae metus. Cras vel vehicula est. Etiam dictum pretium lectus id ullamcorper. Suspendisse dapibus imperdiet risus nec pretium. Aenean condimentum ultricies enim. Duis laoreet at lacus non pharetra. Ut tempus, massa lobortis porttitor vulputate, risus elit convallis neque, sed auctor arcu lectus in nulla. Sed rhoncus aliquet velit malesuada scelerisque. In vel urna at lacus molestie finibus. Vestibulum at velit nec arcu luctus bibendum. Quisque at diam enim. Nullam condimentum est venenatis convallis vestibulum.</p>

<?php

// Inclui o rodapé do template
require ('_footer.php');

?>
