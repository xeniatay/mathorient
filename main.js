$( document ).ready( function() {
    /* Set container height for background hack */
    $('#content-container').height( getDocHeight() + 70 );
    $('.container-fluid').height( getDocHeight() + 70 );

    /* Mobile nav flyout */
    $('#nav-toggle').click( function() {
        $('.sidebar-nav').fadeToggle();
        $('.site-sidebar').toggleClass('show-nav');
    });
});

function getDocHeight() {

  var D = document;
  return Math.max(
    D.body.scrollHeight, D.documentElement.scrollHeight,
    D.body.offsetHeight, D.documentElement.offsetHeight,
    D.body.clientHeight, D.documentElement.clientHeight
  );

}
