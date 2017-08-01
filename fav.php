<?php
session_start();
echo '<title>Litter - Favourites</title>';
include('header.htm');
require('set.php');
$q = "SELECT * FROM litter_fav WHERE user='" . $_SESSION['username'] . "'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<p><a href="index.php">Home</a> | Your favorites:</p>';
echo '<hr>';
if (mysqli_num_rows($r) == 0) {
echo '<p>No favourites</p>';
} else {
while ($cr = mysqli_fetch_array($r)) {
echo '<p>' . $cr['favusr'] . ' | <a href="read.php?user=' . $cr['favusr'] . '">View this users board</a> | <a href="del.php?id=' . $cr['id'] . '">Delete this favourite</a></p>';
echo '<hr>';
}
}
?>