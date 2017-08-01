<?php

include_once('header.htm');

if (isset($_POST['sub'])) { // Not to do with checking form!!!
$candoit = 'y';
$pss = $_POST['pss'];
$cpss = $_POST['cpss'];
require_once('set.php');
$pub = $_POST['pub'];
$np = $_POST['newposts'];

if (empty($_POST['usr'])) {
echo '<p>Sorry, you did not enter your username</p>';
$candoit = 'n';
}

if (empty($_POST['email'])) {
echo '<p>Sorry, you did not enter your email</p>';
$candoit = 'n';
}

if (empty($_POST['pss'])) {
echo '<p>Sorry, you did not enter your password</p>';
$candoit = 'n';
}

if (empty($_POST['cpss'])) {
echo '<p>Sorry, you did not repeat your password in the confirm box, please enter your password in the cofirm password box as well</p>';
$candoit = 'n';
}

if ($pss == $cpss) {
$hi = "HELLO ORFED";
} else {
echo '<p>Sorry, your password did not match</p>';
$candoit = 'n';
}

if ($candoit == 'n') {
// Pass the time!
$db2 = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
}

if ($candoit == 'y') {
// Pass the time again!!
$db = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
}

if ($candoit == 'y') {
$usr = $_POST['usr'];
$em = $_POST['email'];
$q1 = "SELECT username FROM litter_usr WHERE username = '" . $usr . "'";
$dbc = mysqli_connect('localhost', $msql_usr, $msql_pss, $msql_db);
$r1 = mysqli_query($dbc , $q1);
if (mysqli_num_rows($r1) == 0) {
$q2 = "INSERT INTO litter_usr (username, password, email, public, autoemail) VALUES ('$usr', SHA1('$pss'), '$em', '$pub', '$np')";
$r2 = mysqli_query($dbc , $q2);
$q3 = "INSERT INTO litter_data (from_usr, txt, date, user) VALUES ('Litter', 'Welcome to litter. Give your friends the address you see above in the address bar so they can view your board, although your friends do need an account to view and post stuff', NOW(), '$usr')";
$r3 = mysqli_query($dbc, $q3);
if ($np == 'y') {
mail($em, 'Litter registration', "Thank you for choosing Litter, this email has been sent to confirm that you have registred.\nYour username is: $usr\nYour password is: $pss\nYou have enabled automatic email when you get new posts", 'From: donotreply@litter.com');
} else {
mail($em, 'Litter registration', "Thank you for choosing Litter, this email has been sent to confirm that you have registred.\nYour username is: $usr\nYour password is: $pss", 'From: donotreply@litter.com');
}
echo '<p>Thank you, you are now registerd! An email has been sent to you confirming this with your username and password in</p>';
} else {
echo '<p>Sorry, that username is already taken</p>';
}
}
} // End of isset for the whole form
include('reg.htm');
?>