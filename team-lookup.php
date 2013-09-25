
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
//if ($username='xzytay'){
//    $username = 'a24puri';
//}
$student = lookupStudent($username);
if ($student == null){
    get_header();
?>

It doesn't seem that we have you recognized as a student for Math Orientation.
If this is in error, please send us an email and we'll get this straightened out right away.
<?php
} else { # Authenticated
    
    get_header();

    $fb_link = "https://www.facebook.com/groups/" . $student["facebook_id"] . "/";
?>

<h2>Hello, <?php echo $student["userid"]; ?>!</h2>
<p>
    <h3>You are on team: <span class='pink'><?php echo $student["teamname"]; ?></span>.</h3>
    <h3>Check out <a class='pink' href="<?php echo $fb_link?>"><?php echo $student["teamname"]; ?>'s Facebook page</a></b>.</h3>
</p>

<?php
}
get_footer();

