
<?php
/*
Template Name: Special Team Lookup Page
*/
?>
<?php
include_once('cas-functions.php');

casInit();
phpCAS::forceAuthentication();
$username = phpCAS::getUser();
//if ($username='tbelaire'){
//    $username = 'a24puri';
//}
$student = lookupStudent($username);
if ($student == null){
    get_header();
?>

It doesn't seem that we have you recognized as a student for orientation.
If this is in error, please send along an email and we'll get this straightended out right away.
<?php
} else { # Authenticated
    
    get_header();


    $fb_link = "https://www.facebook.com/groups/" . $student["facebook_id"] . "/";
?>
<p>
    Hello <?php echo $student["userid"]; ?>!  
    You are on team: <?php echo $student["teamname"]; ?>.
    Check out the <b><a href="<?php echo $fb_link?>">facebook page</a></b>.
</p>
<?php
}


