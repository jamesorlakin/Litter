<?php
if (isset($_POST['sub'])) { // Check for form submission
$pss = $_POST['pss'];
$usr = $_POST['usr'];
$candoit = 'y';

if (empty($pss)) {
include_once('header.htm');
echo 'Sorry, you did not enter your password';
include_once('login.htm');
$candoit = 'n';
}

if (empty($usr)) {
include_once('header.htm');
echo 'Sorry, you did not enter your username';
include_once('login.htm');
$candoit = 'n';
}

if ($candoit == 'y') {
$q = "SELECT * FROM litter_usr WHERE username = '" . $usr . "' AND password = SHA1('" . $pss . "')";
require('set.php');
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
if (mysqli_num_rows($r) == 0) {
include_once('header.htm');
echo '<p>We are sorry but your username and/or password does not match</p>';
echo '<p><a href="index.php">Go back to the homepage</a></p>';
} else { // End of password / usr not allowed
while ($row = mysqli_fetch_array($r)) {
session_start();
setcookie('username', $usr);
setcookie('loggedin', 'y');
$dbc = "Hello!";
header('Location: index.php');
} // End of while
} // End of if rows = 0 check
} // End of if can do it
} // End of script
if (!isset($_POST['sub'])) {
include('header.htm');
include('login.htm');
}
?>