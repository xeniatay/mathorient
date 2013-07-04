<?php
/*
Leader Protected - Single Post
*/
?>

<?php
include_once('cas-functions.php');
$is_leader = leaderProtectPage();
?>

<?php get_header(); ?>

    <? if ( !$is_leader ): ?>
        <div class="not-logged-in"> Only Math Orientation 2013 leaders are allowed to view this page. Please log in with your Quest id!</div>
    <? else: ?>
        <section class="posts-container clearfix">
            <?php if (have_posts()): ?>
                <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" class="single-post" role="article">
                    <header class="post-header">
                        <p class="metadata">
                            <time datetime="<?php echo the_time('l, Y/m/d g:ia'); ?>" pubdate><?php the_date('d M, Y'); ?></time>
                            | By <?php the_author_posts_link(); ?>
                        </p>
                        <h3 class="post-title content-title">
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                    </header>
                    <div class="post-content clearfix">
                        <?php the_content( __("Read more &raquo;","bonestheme") ); ?>
                    </div>
                </article>
                <?php endwhile; ?>

            <?php else : ?>
                <article class="post-not-found" class="single-post" role="article">
                    <header class="post-header">
                        <h3 class="post-title content-title">
                            Post not found
                        </h3>
                    </header>
                    <div class="post-content-error">
                        Sorry, the requested content was not found.
                    </div>
                </article>
            <?php endif; ?>

        </section>

    <? endif; ?>

    <?php get_footer(); ?>
