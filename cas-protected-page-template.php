<?php
/*
Template Name: CAS Protected Page Template
*/
?>
<?php
//include_once('/users/mathorient/www/wp/wp-content/themes/mathorient/cas-functions.php');
include_once('cas-functions.php');  // I think relative path works
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


<?php get_header(); ?>

		<div id="primary">
            <div id="content" role="main">
            <?php if($is_leader){ ?>
                <?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
            <?php }else{ ?>
                <p> You are not a leader </p>
            <?php } ?>
			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>
