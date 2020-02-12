// Executa a aplicação quando o documento estiver pronto
$(document).ready(modalRun);

// aplicação principal
function modalRun() {

    // Quando clicar no nome do autor
    $(document).on('click', '#modalAutor', viewModal);

}

// Mostra modal
function viewModal() {

    // Exibe o modal
    $('#modal').fadeIn('fast');

    // Bloqueia a ação normal da tag <a>...</a>
    return false;

}
