				<div class="sidebar-container" role="complementary">
                    <a title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
                        <div class="circle hide-mobile">
                            <img class="mathorient-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
                        </div>
                    </a>

                    <div class="sidebar-nav">
                        <?php
                        // If page is a subpage of/is the Leader (blogpost) page
                        if ( is_home() || is_topmost_parent(39) || is_single() ) {
                            dynamic_sidebar( 'leader' );
                        } else if ( is_front_page() ) {
                            dynamic_sidebar( 'home' );
                        } else if ( is_topmost_parent(5) ) {
                            dynamic_sidebar( 'new-students' );
                        } else {
                            dynamic_sidebar( 'main' );
                        }
                        ?>

                        <div class="social-icons-container">
                            <h4 class="widgettitle">Stay Updated</h3>
                            <ul class="social-icons">
                                <li><a href="https://www.facebook.com/MathOrientation">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/facebook.jpg" alt="Facebook"/>
                                </a></li>
                                <li><a href="https://twitter.com/MATHOrientation">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="Twitter"/>
                                </a></li>
                            </ul>
                        </div>

                        <?php get_search_form(); ?>
                    </div>

                    <div id="nav-toggle" class="show-mobile border-menu pull-right"></div>
                </div>
