<?php
session_start();
echo '<title>Litter - Log</title>';
include('header.htm');
echo '<p>Login, Logout and posting log</p>';
echo '<p><a href="index.php">Go to the homepage</a></p>';
echo '<hr>';
require('set.php');
if ($_GET['more'] == 'yes') {
$q = "SELECT * FROM litter_log ORDER BY date DESC";
} else {
$q = "SELECT * FROM litter_log ORDER BY date DESC LIMIT 5";
}
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$num = 1;
while ($cr = mysqli_fetch_array($r)) {
echo '<p>No.' . $num . ' | User: ' . $cr['user'] . ' | Action: ' . $cr['action'] . ' | Date: ' . $cr['date'] . '</p>';
echo '<hr>';
$num = $num + 1;
}
if ($_GET['more'] !== 'yes') {
echo '<p><a href="log.php?more=yes">More</a></p>';
}
?>