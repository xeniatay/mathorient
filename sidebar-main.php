				<div class="sidebar-container" role="complementary">
                    <img class="mathorient-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png">

                    <?php get_search_form(); ?>

                    <?php
                    if ( is_home() && is_leader() ) {
                        get_sidebar('blog');
                    } else if ( is_front_page() ) {
                        get_sidebar('home');
                    }
                    ?>


                    <?php dynamic_sidebar( 'main' ); ?>
                </div>
