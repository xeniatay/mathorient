$( document ).ready( function() {
    $('#nav-toggle').click( function() {
        $('.sidebar-nav').fadeToggle();
        $('.site-sidebar').toggleClass('show-nav');
    });
});
