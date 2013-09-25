<?php
/*
Template Name: Shift Print Page
 */
?>
<?php
include_once('cas-functions.php');

echo("Time:".time_to_int("44:55"));
$leaders = lookupAllLeaders();
foreach ($leaders as $leader){
    $username = $leader[0];
    $leader_shifts = lookupLeaderShift($username);
    if ($leader_shifts == null){
        //die("Broke something on leader " . $username);
        continue;
    }
?>
    <h2 class='shift-lookup-title'>Shift schedule for: <?php echo $username ?></h2>
    <table class='shift-lookup'>
    <tr><th>Day</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Event Name</th>
        <th>Shift Name</th>
    </tr>
<?php
    $day = "";
    $end = 0;
        foreach( $leader_shifts as $shift ){
            if ($shift['day'] != $day){
                $day = $shift['day'];
                $end = 0;
            }else{
                $start_time = time_to_int($shift['start_time']);
                $end_time = time_to_int($shift['end_time']);
                if($start_time < $end
                    && $shift['event_name'] != "Warrior Welcome" 
                    && $shift['event_name'] != "Math Leader Party" 
                    && (stristr($shift['shift_name'], "Float") == FALSE)
                ){
                    //echo("ERROR: Overlap. Day:$day, Start:$start_time, prev:$end");
                }
                $end = $end_time;
            }
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
    </table> <br />
<?php
}

