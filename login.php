<?php
session_start();
$headerdone = 'n';
$dbc = 'hbghvn';
if ($_GET['nl'] == 'yes') {
if ($headerdone == 'n') {
include('header.htm');
$headerdone = 'y';
}
echo '<style>.col { color: red; }</style>';
echo '<p class="col">Your not logged in! Maybe your session expired?</p>';
}

if (isset($_POST['sub'])) { // Check for form submission
$pss = $_POST['pss'];
$usr = strtolower($_POST['usr']);
$candoit = 'y';
$usedform = 'n';

if (empty($pss)) {
if ($headerdone == 'n') {
include('header.htm');
$headerdone = 'y';
}
echo 'Sorry, you did not enter your password';
if ($usedform == 'n') {
include_once('loginform.php');
$usedform = 'y';
}
$candoit = 'n';
}

if (empty($usr)) {
if ($headerdone == 'n') {
include('header.htm');
$headerdone = 'y';
}
echo 'Sorry, you did not enter your username';
if ($usedform == 'n') {
include_once('loginform.php');
$usedform = 'y';
}
$candoit = 'n';
}

if ($candoit == 'y') {
$q = "SELECT * FROM litter_usr WHERE username = '" . $usr . "' AND password = SHA1('" . $pss . "')";
require('set.php');
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
if (mysqli_num_rows($r) == 0) {
include_once('header.htm');
echo '<p>We are sorry but your username and/or password does not match the one we have on record</p>';
echo '<p><a href="login.php">Go back to the login page</a></p>';
} else { // End of password / usr not allowed
while ($row = mysqli_fetch_array($r)) {
$_SESSION['username'] = $usr;
$_SESSION['loggedin'] = 'y';
if ($_GET['app'] == "yes") {
$_SESSION['app'] = 'yes';
} else {
$q2 = "INSERT INTO litter_events (user, date, action) VALUES ('$usr', NOW(), 'logged in to Litter')";
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
}
$dbc = "Hello!";
header('Location: index.php');
} // End of while
} // End of if rows = 0 check
} // End of if can do it
} // End of script
if (!isset($_POST['sub'])) {
if ($headerdone == 'n') {
include('header.htm');
$headerdone = 'y';
}
include('loginform.php');
}
?>