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
