<?php
/*
Template Name: Leader Protected Blog Post Template 
 */
?>
<?php
include_once("cas-functions.php");
casInit(); 
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

    $is_leader = mayViewLeaderPage($username);

    if( $is_leader ){
?>

<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header class="main-content-header">
						
							<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'wpbs-featured' ); ?></a>
							
							<div class="page-header"><h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></div>
							
							<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('l, Y/m/d g:ia'); ?>" pubdate><?php the_date('l, Y/m/d \a\t g:ia'); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?>.</p>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix">
							<?php the_content( __("Read more &raquo;","bonestheme") ); ?>
						</section> <!-- end article section -->
						
						<footer>
			
							<p class="tags"><?php the_tags('<span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', ''); ?></p>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>
						
					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>		
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
        <?php get_sidebar('sidebarblog'); // sidebar 2 ?>
    
			</div> <!-- end #content -->



<?php
    } else {
?>
<p> Not a leader? Shoo! </p>
<?php
    } // is_leader
}
?>
            </div><!-- #content -->
        </div><!-- #primary -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>
