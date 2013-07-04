$( document ).ready( function() {
    $('#nav-toggle').click( function() {
        $('.sidebar-nav').slideToggle();
        $('.site-sidebar').toggleClass('show-nav');
    });
});