<?php
/*
Template Name: CAS Protected Page Template
*/
?>
<?php
include_once('cas-functions.php');
$is_leader = leaderProtectPage();

/*
$l = lookupLeader("rl2ye");
if ($l != null){
    die("not null");
} else if ($l == null){
    die("Null");
} else {
    die("other");
}*/
?>

<?php if ( !$is_leader ): ?>
    <div class="not-logged-in"> Only Math Orientation 2013 leaders are allowed to view this page. Please log in with your Quest id!</div>
<?php else: ?>

    <?php get_header(); ?>

      <?php while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

    	<?php endwhile; // end of the loop. ?>

    <?php get_footer(); ?>

<?php endif; ?>
