<?php
/*
Template Name: CAS Protected Page Template
*/
?>

<?php get_header(); ?>

<?php if ( ! is_leader() ): ?>
    <div class="not-logged-in"> Only Math Orientation 2013 leaders are allowed to view this page. Please log in with your Quest id!</div>
<?php else: ?>
    <?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

	<?php endwhile; // end of the loop. ?>
<?php endif; ?>

<?php get_footer(); ?>
