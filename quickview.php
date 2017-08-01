<?php
session_start();

require('set.php');
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$q = "SELECT * FROM litter_messaging WHERE user = '" . $_SESSION['username'] . "'";
$r = mysqli_query($dbc, $q);
$unread = 0;
$read = 0;
while ($cr = mysqli_fetch_array($r)) {
if ($cr['readmsg'] == 'y') {
$read = $read + 1;
} else {
$unread = $unread + 1;
$read = $read + 1;
}
}
echo '<p>' . $unread . ' unread private messages (' . $read . ' total messages in inbox)</p>';
echo '<input type="hidden" id="unreadcount" value="' . $unread . '">';
$q = "SELECT * FROM litter_data WHERE user = '" . $_SESSION['username'] . "'";
$r = mysqli_query($dbc, $q);
echo '<p>' . mysqli_num_rows($r) . ' public message</p>';

$q = "SELECT * FROM litter_fav WHERE user = '" . $_SESSION['username'] . "'";
$r = mysqli_query($dbc, $q);
echo '<p>' . mysqli_num_rows($r) . ' favourite users</p>';
?>