$( document ).ready( function() {
    /* Set container height for background hack */
    $('#content-container').height( $(document).height() );

    /* Mobile nav flyout */
    $('#nav-toggle').click( function() {
        $('.sidebar-nav').fadeToggle();
        $('.site-sidebar').toggleClass('show-nav');
    });
});
