<?php
session_start();
require('set.php');
if ($_SESSION['loggedin'] == 'y') {
header('Location: read.php?user=' . $_GET['user']);
}
if (isset($_GET['user'])) {
$usr = $_GET['user'];
$q = "SELECT * FROM litter_usr WHERE username='$usr'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
while ($crow = mysqli_fetch_array($r)) {
if ($crow['public'] == 'y') {
echo '<title>Litter - Read ' . $_GET['user'] . '\'s messages</title>';
include('header.htm');
echo '<p>' . $_GET['user'] . '\'s litter messages</p>';
echo '<p align=left><a href="index.php">Homepage</a></p>';
echo '<hr>';
$q2 = "SELECT DATE_FORMAT(date, \"%a, %d - %m - %y | %h:%i %p - %s seconds\") AS thedate, txt, spam, user, spam_by, from_usr, id FROM litter_data WHERE user = '" . $_GET['user'] . "' ORDER BY date DESC";
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
if (mysqli_num_rows($r2) == 0) {
echo '<p>No such user</p>';
} else {
while ($cr = mysqli_fetch_array($r2)) {
$msgnum = $cr['id'];
echo '<p><a name="' . $msgnum . '">Posted by: </a><i>' . $cr['from_usr'] . '</i></p>';
echo '<p>' . $cr['txt'] . '</p>';
echo '<p>' . $cr['thedate'] . ' | <input type=button value="Report abuse" onclick=\'window.location = "abuse.php?id=' . $cr['id'] . '"\'></p>';
echo '<hr>';
} // End of while
} // End of if 0 check
} else {
echo '<title>Litter - Blocked</title>';
include('header.htm');
echo '<p>' . $_GET['user'] . '\'s litter messages';
echo '<p align=left><a href="index.php">Homepage</a></p>';
echo '<hr>';
echo '<p>This user does NOT want to share his messages to guests</p>';
}
}
} else {
include('header.htm');
echo '<p>No user selected</p>';
}
?>