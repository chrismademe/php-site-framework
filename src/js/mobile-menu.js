var menu = {
        src: '.primary-menu .wrapper',
        container: '.mobile-menu',
        open: 'is-open',
        toggle: '.menu-toggle'
    }

$(document).ready(function() {

    // Populate menu
    $(menu.container).html($(menu.src).html());

    // Open menu
    $(menu.toggle).on('click', function(e) {
        e.preventDefault();
        $(menu.container).toggleClass(menu.open);
    });

});
