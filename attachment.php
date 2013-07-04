<?
/* Needs rearchitecting */
?>

<?php get_header(); ?>

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
                	<?php the_content(); ?>
                </div>
            </article>
            <?php endwhile; ?>

            <section class="pagination pull-right">

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

<?php get_footer(); ?>
