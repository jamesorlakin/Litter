<?php
session_start();
if ($_SESSION['loggedin'] == 'y') {
if (isset($_GET['user'])) {
$q = "SELECT DATE_FORMAT(date, \"%a, %d - %m - %y | %h:%i %p - %s seconds\") AS thedate, txt, spam, user, spam_by, from_usr, id FROM litter_data WHERE user = '" . $_GET['user'] . "' ORDER BY date DESC";
require('set.php');
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<p align=center>' . $_GET['user'] . '\'s current messages</p>';
if (mysqli_num_rows($r) == 0) {
echo '<p>This user is invalid</p>';
} else {
while ($cr = mysqli_fetch_array($r)) {
$usr = $cr['from_usr'];
echo "<p>$usr</p>";
echo '<p>' . $cr['txt'] . '</p>';
echo '<p>' . $cr['thedate'] . '</p>';
echo '<hr>';
} // End of while
} // End of check for invalid user
} else { // Else for get check
include('header.htm');
echo '<p>No user has been selected</p>';
} // End of else for get check
} else {
header('Location: login.php?nl=yes');
}
?>