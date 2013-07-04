<?php
/*
Template Name: Database Test Page
*/
?>


<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

<?php

global $wpdb;
$table_name = $wpdb->prefix . "leaders";

// Useful pages.
// http://codex.wordpress.org/Creating_Tables_with_Plugins
// http://www.convertcsvtomysql.com/
/*$wpdb->query(
    "
    CREATE TABLE IF NOT EXISTS `$table_name` (
    `userid` VARCHAR(255) NOT NULL,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL
    )
    "
);*/

$leaders = $wpdb->get_results(
    "SELECT *
    FROM $table_name
    "
);

foreach ( $leaders as $leader)
{
    echo $leader->userid;
    echo "<br />";
}
?>

			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>
