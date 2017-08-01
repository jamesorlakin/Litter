<?php
session_start();
if ($_SESSION['loggedin'] == 'y') {
if (isset($_GET['user'])) {
if (isset($_POST['sub'])) {
require('set.php');
$usr = $_SESSION['username'];
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$tmp = stripslashes($_POST['txt']);
$txt = mysqli_real_escape_string($dbc, $tmp);
$cu = $_GET['user'];
if (!empty($_POST['txt'])) {
$q = "INSERT INTO litter_data (from_usr, txt, date, user, spam, spam_by) VALUES ('$usr', '$txt', NOW(), '$cu', 'n', 'nobody')";
$r = mysqli_query($dbc, $q);
$q2 = "SELECT * FROM litter_usr WHERE username ='" . $_GET['user'] . "'";
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
if ($_SESSION['username'] == $cu) {
$q3 = "INSERT INTO litter_events (user, action, date) VALUES ('$usr', 'made a message to himself', NOW())";
} else {
$q3 = "INSERT INTO litter_events (user, action, date) VALUES ('$usr', 'sent a message to $cu', NOW())";
}
$r3 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q3);
}
while ($cr = mysqli_fetch_array($r2)) {
if ($cr['autoemail'] == 'y') {
$txt = stripslashes($txt);
$fintxt = '<p>Litter - New post for ' . $cu . '</p>
<p>The text is:</p>
<p>"' . $txt . '"</p>
<p>The user who sent this message was: ' . $usr . '</p>
<p>----</p>
<p>Litter</p>';
$fintxt2 = wordwrap($fintxt, 70);
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: messaging@messaging.' . $_SERVER['SERVER_NAME'];
mail($cr['email'], 'Litter post notification', $fintxt2, $headers);
}
header('Location: read.php?user=' . $_GET['user']);
}
}
} else {
include('header.htm');
echo '<p>Sorry, No username was entered to write a message</p>';
}
} else {
header('Location: login.php?nl=yes');
}
?>