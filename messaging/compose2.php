<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
$to = $_POST['requiredto'];
$subject = $_POST['requiredsubject'];
$msg = $_POST['requiredmsg'];
require('../set.php');
$q = "SELECT * FROM litter_usr WHERE username='$to'";
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$r = mysqli_query($dbc, $q);
if (mysqli_num_rows($r) == 0) {
echo '<title>Litter - Messaging - Make message</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | <a href="index.php">Inbox</a> | Error:</p>';
echo '<p>The user you tried to send the message to is not valid!</p>';
} else {
$q2 = "INSERT INTO litter_messaging (user, from_usr, date, subject, txt, readmsg) VALUES (\"$to\", \"" . $_SESSION['username'] . "\", NOW(), \"$subject\", \"$msg\", \"m\")";
$r2 = mysqli_query($dbc, $q2);
if ($r == true) {
echo '<title>Litter - Messaging - Make message</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | <a href="index.php">Inbox</a> | New message:</p>';
echo '<p>Message sent!</p>';
} else {
echo '<title>Litter - Messaging - Make message</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | <a href="index.php">Inbox</a> | New message:</p>';
echo '<p>Sorry, there was a problem sending your request</p>';
}
}
} else {
header('Location: ../login.php?nl=yes');
}
?>