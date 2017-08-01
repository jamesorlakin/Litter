<?php
session_start();
if ($_SESSION['loggedin'] == 'y') {
require('set.php');
echo '<title>Litter - Diary</title>';
include('header.htm');
echo '<p><a href="index.php">Home</a> | <a href="makediary.php">Make a entry</a> | Your current diary:</p>';
$q = "SELECT DATE_FORMAT(date, \"%a, %d - %m - %y | %h:%i %p - %s seconds\") AS thedate, txt, id FROM litter_diary WHERE user = '" . $_SESSION['username'] . "' ORDER BY date DESC";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<hr>';
if (mysqli_num_rows($r) == 0) {
echo '<p>You have no diary entries</p>';
} else {
while ($cr = mysqli_fetch_array($r)) {
echo $cr['txt'];
echo '<p>' . $cr['thedate'] . ' | <a href="delete.php?id=' . $cr['id'] . '">Delete entry</a></p>';
echo '<hr>';
}
}
} else {
header('Location: login.php?nl=yes');
}
?>