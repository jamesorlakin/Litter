<?php
session_start();
if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Show users</title>';
include('header.htm');
if ($_GET['az'] == 'yes') {
$q2 = "SELECT * FROM litter_usr ORDER BY username";
} elseif ($_GET['date'] == 'yes') {
$q2 = "SELECT * FROM litter_usr ORDER BY registerdate DESC";
} else {
$q2 = "SELECT * FROM litter_usr";
}
require('set.php');
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
echo '<p><a href="index.php">Home</a> | <a href="/search">Search</a></p>';
echo '<p>Current registered users (' . mysqli_num_rows($r) . '):</p>';
echo '<hr>';
while ($row = mysqli_fetch_array($r)) {
$usr = $row['username'];
echo "<p>$usr | <a href=\"read.php?user=$usr\">Read this users messages</a></p>";
echo '<hr>';
}
echo '<p align=center><font size="1">Litter Ltd</font></p>';
} else {
echo '<title>Litter - Show users</title>';
include('header.htm');
if ($_GET['az'] == 'yes') {
$q2 = "SELECT * FROM litter_usr ORDER BY username";
} elseif ($_GET['date'] == 'yes') {
$q2 = "SELECT * FROM litter_usr ORDER BY registerdate DESC";
} else {
$q2 = "SELECT * FROM litter_usr";
}
require('set.php');
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
echo '<p><a href="index.php">Home</a> | <a href="showusr.php?az=yes">Sort by the alphabet</a> | <a href="showusr.php?date=yes">Sort by the date they registered</a> | <a href="showusr.php">Don\'t sort</a></p>';
echo '<p>Current registered users:</p>';
echo '<hr>';
while ($row = mysqli_fetch_array($r2)) {
$usr = $row['username'];
if ($row['public'] == 'y') {
echo "<p>$usr | <a href=\"login.php?selusr=$usr\">Login as this user</a> | <a href=\"read2.php?user=$usr\">Read this users messages</a></p>";
echo '<hr>';
} else {
echo "<p>$usr | <a href=\"login.php?selusr=$usr\">Login as this user</a></p>";
echo "<hr>";
}
}
echo '<p align=center><font size="1">Litter Ltd</font></p>';
}
?>