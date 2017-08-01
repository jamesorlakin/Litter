<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Messaging - Inbox</title>';
include('../header.htm');
$q = "SELECT * FROM litter_messaging WHERE user='" . $_SESSION['username'] . "' ORDER BY date DESC";
require('../set.php');
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<p><a href="../index.php">Home</a> | <a href="compose.php">Make a message</a> | Current messages: (' . mysqli_num_rows($r) . ')</p>';
echo '<hr>';
if (mysqli_num_rows($r) == 0) {
echo '<p>No messages!</p>';
} else {
while ($cr = mysqli_fetch_array($r)) {
if ($cr['readmsg'] == 'y') {
echo '<div class="read">';
} else {
echo '<div class="unread">';
}
echo 'From: ' . $cr['from_usr'] . ' | Subject: ' . $cr['subject'] . ' | ' . $cr['date'] . ' | <a href="readmsg.php?id=' . $cr['id'] . '">Read message</a> | <a href="delmsg.php?id=' . $cr['id'] . '">Delete message</a>';
echo '</div>';
echo '<hr>';
}
}
} else {
header('Location: ../login.php?nl=yes');
}
?>