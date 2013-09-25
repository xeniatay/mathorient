<?php
/*
Template Name: Shift Lookup Page
*/
?>
<?php
include_once('cas-functions.php');

casInit();
phpCAS::forceAuthentication();
$username = phpCAS::getUser();
$leader_shifts = lookupLeaderShift($username);
get_header();
if ($leader_shifts == null){
?>

Oh no your shifts are broken.  Contact FOC, that'll tell the website team to get back to work.
<?php
} else { # Authenticated
?>
<h2 class='shift-lookup-title'>Shift schedule for: <?php echo $username ?></h2>
<div class='shift-lookup-content'>
  <?php while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>

  <?php endwhile; // end of the loop. ?>
</div>
<table class='shift-lookup'>
<tr><th>Day</th>
    <th>Start Time</th>
    <th>End Time</th>
    <th>Event Name</th>
    <th>Shift Name</th>
</tr>
<?php
    foreach( $leader_shifts as $shift ){
?>
  <tr> 
      <td><?php echo $shift['day'] ?></td>
      <td><?php echo $shift['start_time'] ?></td>
      <td><?php echo $shift['end_time'] ?></td>
      <td><?php echo $shift['event_name'] ?></td>
      <td><?php echo $shift['shift_name'] ?></td>
  </tr>
<?php
    }
?>
</table>
<?php
get_footer();
}
