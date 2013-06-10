<?php
function casInit()
{
    global $cas_configured;
    if( !$cas_configured ){
        $cas_configured = true;
        $_cas_directory = '/users/mathorient/util/cas/';
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

function mayViewLeaderPage($username)
{
    // FOC special case.
    if( $username == "adeluca" || $username == "x288li" || $username = "sforstne" || $username == "x32he" ){
        return true;
    }
    $leader = lookupLeader($username);
    $is_leader = false;

    if( $leader == NULL ){
        $is_leader = false;
    }else{
        $is_leader = true;
    }
    return $is_leader;
}

function leaderProtectPage()
{
    // This function could be called in the header to protect a page
    // and return true if the user may view it.
    // Not used right now
    casInit();
    phpCAS::forceAuthentication();
    $username = phpCAS::getUser();
    $is_leader = mayViewLeaderPage($username);
    return $is_leader;
}
?>
