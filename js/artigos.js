// Executa a aplicação quando o documento estiver pronto
$(document).ready(modalRun);

// aplicação principal
function modalRun() {

    // Quando clicar no nome do autor
    $(document).on('click', '#modalAutor', viewModal);

    // Quando fechar o modal
    $(document).on('click', '.fechamodal', hideModal);

}

// Mostra modal
function viewModal() {

    // Exibe o modal
    $('#modal').fadeIn('fast');

    // Bloqueia a ação normal da tag <a>...</a>
    return false;

}

// Oculta modal
function hideModal() {

    // Oculta o modal
    $('#modal').fadeOut('fast');

    // Bloqueia a ação normal da tag <a>...</a>
    return false;

}
