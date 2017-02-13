jQuery( '.sub-menu' ).css("opacity", "1");


jQuery('.expandingNav').on('click', function (e) {
    if (jQuery(e.target).closest('ul').parent('#primary-nav-container').length) {
        if (jQuery(this).hasClass('expanded')) {
            jQuery(this).children('.hidden').slideUp();
            jQuery(this).removeClass('expanded');
        } else {
            jQuery(this).children('.hidden').slideDown();
            jQuery(this).addClass('expanded');
        }
    }
});
