<?php
require('set.php');
if (isset($_GET['user'])) {
$usr = $_GET['user'];
$q = "SELECT * FROM litter_usr WHERE username = '$usr'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
while ($crow = mysqli_fetch_array($r)) {
if ($crow['public'] == 'y') {
include('header.htm');
echo '<p>' . $_GET['user'] . '\'s litter messages';
echo '<p align=left><a href="index.php">Homepage</a></p>';
echo '<hr>';
$q2 = "SELECT * FROM litter_data WHERE user = '$usr'";
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
if (mysqli_num_rows($r2) == 0) {
echo '<p>No such user</p>';
} else {
while ($cr = mysqli_fetch_array($r2)) {
echo '<p>' . $cr['from_usr'] . '</p>';
echo '<p>' . $cr['txt'] . '</p>';
echo '<p>' . $cr['date'] . '</p>';
echo '<hr>';
} // End of while
} // End of if 0 check
} else {
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