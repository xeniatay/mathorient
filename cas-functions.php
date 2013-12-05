<?php
function casInit()
{
    global $cas_configured;
    if( !$cas_configured ){
        $cas_configured = true;
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
}

function lookupLeader($username)
{
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
    return $leader;
}

function lookupStudent ($username)
{
    global $wpdb;
    $student_table = $wpdb->prefix . "_students";
    $team_table = $wpdb->prefix . "_teams";

    $info = $wpdb->get_row(
        $wpdb->prepare(
            "
            SELECT userid, teamname, facebook_id
            FROM `$student_table`
            INNER JOIN `$team_table`
            ON `$student_table`.teamid = `$team_table`.teamid
            WHERE userid = %s
            ",
            $username
        ), ARRAY_A
    );
    return $info;
}

function lookupAllLeaders()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "_shift_relation";

    $leaders = $wpdb->get_results(
            "SELECT DISTINCT userid
            FROM $table_name
            ORDER BY userid",
            ARRAY_N);
    return $leaders;
}
function lookupLeaderShift($username)
{
    global $wpdb;
    $shift_relation = $wpdb->prefix . "_shift_relation";
    $shift_header = $wpdb->prefix . "_shift_header";

    $info = $wpdb->get_results(
        $wpdb->prepare(
            "
            SELECT DISTINCT userid, day, event_name, shift_name, start_time, end_time
            FROM `$shift_relation`
            INNER JOIN `$shift_header`
            ON `$shift_relation`.shift_id = `$shift_header`.shift_id
            WHERE userid = %s
            ORDER BY date, start_time
            ",
            $username
        ), ARRAY_A
    );
    return $info;
}

function mayViewLeaderPage($username)
{
    // FOC special case.
    if( $username == "adeluca" || $username == "x288li" || $username == "sforstne" || $username == "x32he" ){
        return true;
    }
    $leader = lookupLeader($username);

    if( $leader != null ){
        return true;
    } else {
        return false;
    }
}

function leaderProtectPage()
{

  return true;
  // Disabled for 2014
  /*
    // This function could be called in the header to protect a page
    // and return true if the user may view it.
    casInit();
    phpCAS::forceAuthentication();
    $username = phpCAS::getUser();
    $is_leader = mayViewLeaderPage($username);
    return $is_leader;

    if (!$is_leader){
        die("You don't seem to be a leader.  Only leaders may view this page.  If this is in error, and you are a leader, the website volunteer team will be happy to fix it.");
    }
 */
}

function time_to_int($time){
    $result = intval($time[0] . $time[1] . $time[3] . $time[4]);
    if ($result <= 99){
        $result += 10000;
    }
    return $result;
}
