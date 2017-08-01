<?php
session_start();
require('set.php');
$q2 = "SELECT * FROM litter_data WHERE id = '" . $_GET['id'] . "'";
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
$cr = mysqli_fetch_array($r2);
if (strtolower($_SESSION['username']) == strtolower($cr['user'])) {
$q = "DELETE FROM litter_data WHERE id = " . $_GET['id'];
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
header('Location: read.php?user=' . $cr['user']);
} else {
include('header.htm');
echo '<p><a href="index.php">Home</a></p>';
echo '<p>THIS MESSAGE DOES NOT BELONG TO YOU!</p>';
}

?>