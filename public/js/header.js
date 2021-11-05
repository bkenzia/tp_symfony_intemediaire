$(document).ready(function () {
    // Clic du burger menu
    $('#burger-menu, .close-menu').click(function () {
        // Animation du menu
        animate_menu();
    });

    /**
     * Retourne le statut du menu
     */
    function menuIsOpen() {
        // Si le left est à 0 (menu ouvert)
        var menuIsOpen = $('nav').css('left') == '0px';
        return menuIsOpen;
    }

    /**
     *  Animation du menu
     */
    function animate_menu() {
        // Si le menu est ouvert
        if (menuIsOpen()) {
            // On ajoute la class clicked
            $('#burger-menu').addClass('clicked');
        }
        else {
            // On supprime la class clicked
            $('#burger-menu').removeClass('clicked');
        }

        // Animation du menu
        $('nav').animate({
            'left': menuIsOpen() ? '-330px' : 0
        }, 500);
    }
});