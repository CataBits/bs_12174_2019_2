// Largura da tela para responsividade
var responsive = minWidth();

$(document).ready(runApp);  // Executa aplicação quando documento estiver pronto

// Largura da tela para responsividade
function minWidth() {
    return 640;
}

// Aplicação principal
function runApp() {

    $(document).on('click', '#menu', menuToggle);   // Monitora cliques no botão menu

    $(window).resize(menuChange);                   // Monitora mudanças na largura da tela

    $(document).mouseup(menuClose);                 // Fecha o menu ao clicar em qualquer lugar da página

}

// Mostra / oculta menu responsivo
function menuToggle() {

    if ( $('#menulinks').is(':visible') ) {     // Se o menu responsivo é visível:
        menuHide('fast');                           // Oculta o menu responsivo
    } else {                                    // Senão:
        menuShow('fast');                           // Mostra o menu responsivo
    }

    return false;                               // Retorna ao documento sem fazer mais nada
}

// Oculta o menu responsivo
function menuHide(vel) {

    $('#menulinks').slideUp(vel);               // Esconde o menu responsivo
    $('#menu i').addClass('fa-bars');           // Mostra o ícone "☰" no botão do menu
    $('#menu i').removeClass('fa-times');       // Oculta o ícone de "X" no botão do menu
    $('#menu').removeClass('active');           // Remove a classe 'active' do botão do menu

}

// Mostra o menu responsivo
function menuShow(vel) {

    $('#menulinks').slideDown(vel);             // Mostra o menu responsivo
    $('#menu i').addClass('fa-times');          // Mostra o ícone "X" no botão do menu
    $('#menu i').removeClass('fa-bars');        // Oculta o ícone "☰" no botão do menu
    $('#menu').addClass('active');              // Aplica a classe 'active' no botão do menu

}

// Ajusta o menu conforme a largura da viewport
function menuChange() {

    if (window.innerWidth > responsive) {       // Se a viewport for maior que 'responsive':
        $('#menulinks').css('display', 'flex');     // Muda 'display' do menu para 'flex'
        menuShow(0);                                // Mostra o menu responsivo
    } else {                                    // Senão:
        $('#menulinks').css('display', 'none');     // Muda 'display' do menu para 'none'
        menuHide(0);                                // Oculta o menu responsivo
    }

}

// Fecha o menu ao clicar em qualquer lugar da página
function menuClose(e) {

    var aEsconder = $('#menulinks');
    if (!aEsconder.is(e.target) && aEsconder.has(e.target).length == 0 && window.innerWidth < responsive + 1) {
        menuHide('fast');
    }
    
}