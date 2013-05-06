<?php
/*
Template Name: Leader Protected Page
 */
?>
<?php
if( !$cas_configured ){
    $cas_configured;
    $_cas_directory = '/users/mathorient/util/cas/';
    require_once( $_cas_directory . 'CAS.php' );

    phpCAS::client(
        CAS_VERSION_2_0,
        'cas.uwaterloo.ca',
        443,
        '/cas'
    );
    phpCAS::setCasServerCACert( '/var/lib/cas/globalsignchain.crt' );
}
phpCAS::forceAuthentication();
?>


<?php get_header(); ?>

        <div id="primary">
            <div id="content" role="main">
<?php

// If user isn't authenticated, tell them they need to login to check
if( ! phpCAS::isAuthenticated() ) {

?>

<div>
Please Log In to view this page.

It really should be impossible to get here, to be honest.
</div>


<?php

    // User is already logged in
} else {
    $username = phpCAS::getUser();
    echo '<p>You are ' . $username . '</p>';


    global $wpdb;
    $table_name = $wpdb->prefix . "leaders";

    $leader = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT *
            FROM $table_name
            WHERE userid = %s
            ",
            $username
        )
    );
    $is_leader = false;

    if( $leader == NULL ){
        $is_leader = false;
    }else{
        $is_leader = true;
    }

    if( $is_leader ){
?>
<p> You are a leader </p>
<p> <?php echo $leader->first_name . " " . $leader->last_name ?> </p>

<?php // The following loop isn't working, and I don't know why ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'page' ); ?>

                    <?php comments_template( '', true ); ?>

                <?php endwhile; // end of the loop. ?>

<?php
    } else {
?>
Not a leader, shoo!
<?php
    } // is_leader
}
?>
            </div><!-- #content -->
        </div><!-- #primary -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>
