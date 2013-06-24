<?php
/*
Template Name: Leader Protected Blog Post Template
 */
?>
<?php
    $logged_in = TRUE;
    $is_leader = TRUE;

/* UNCOMMENT ON LIVE SITE */
/*
    $logged_in = FALSE;
    $is_leader = FALSE;
    if( !$cas_configured ){
        $cas_configured;
        $_cas_directory = get_template_directory_uri() . '/cas/';
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

    // User is logged in
    if ( phpCAS::isAuthenticated() ) {
        $logged_in = TRUE;
        $username = phpCAS::getUser();

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

        $is_leader == ( $leader == NULL ) ? false : true;

        // Special cases
        if ( $username == "adeluca" || $username == "x288li" ||
             $username = "sforstne" || $username == "x32he" ||
             $username == "xzytay" ) {
            $is_leader = true;
        }
    }
//*/
?>


<?php get_header(); ?>

    <? if (!$logged_in): ?>
        <div class="not-logged-in"> Please Log In to view this page. </div>
    <? elseif ($logged_in && $is_leader): ?>
        <section class="posts-container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" class="single=post" role="article">
                <header class="single-post-header">
                    <h3 class="post-title">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h1>

                    <p class="metadata">
                        Posted
                        <time datetime="<?php echo the_time('l, Y/m/d g:ia'); ?>" pubdate><?php the_date('l, Y/m/d \a\t g:ia'); ?></time>
                        by <?php the_author_posts_link(); ?>.
                    </p>
                </header>
                <p class="single-post-content">
                    <?php the_content( __("Read more &raquo;","bonestheme") ); ?>
                </p>
            </article>
            <?php endwhile; ?>

            <section class="pagination">

                <?php if (function_exists('page_navi')): // if expirimental feature is active ?>
                <?php page_navi(); // use the page navi function ?>
                <?php else: // if it is disabled, display regular wp prev & next links ?>
                <nav class="wp-prev-next">
                    <ul class="clearfix">
                        <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
                        <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
                    </ul>
                </nav>
                <?php endif; ?>

            </section>

            <?php else : ?>
            <article class="post-not-found" class="single=post" role="article">
                <header class="single-post-header">
                    <h3 class="post-title">
                        Post not found
                    </h1>
                </header>
                <p class="single-post-content">
                    Sorry, the requested content was not found.
                </p>
            </article>
            <?php endif; ?>

        </section>

        <?php get_sidebar('sidebarblog'); // sidebar 2 ?>
        <?php get_sidebar(); ?>
        <?php get_footer(); ?>
    <? endif; ?>
