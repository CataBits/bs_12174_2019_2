$(document).ready(runApp);




function runApp() {

    $(document).on('click', '#menu', menuToggle);

}

function menuToggle() {

    if ( $('#menulinks').is(':visible') ) {
        menuHide();
    } else {
        menuShow();
    }

    return false;
}

function menuHide() {

    $('#menulinks').slideUp('fast');

}

function menuShow() {

    $('#menulinks').slideDown('fast');

}