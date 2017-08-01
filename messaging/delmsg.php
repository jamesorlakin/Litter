<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
if (!isset($_GET['del'])) {
require('../set.php');
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$q = "SELECT * FROM litter_messaging WHERE id='" . $_GET['id'] . "'";
$r = mysqli_query($dbc, $q);
$cur = mysqli_fetch_array($r);
if (strtolower($cur['user']) == strtolower($_SESSION['username'])) {
$q2 = "DELETE FROM litter_messaging WHERE id='" . $_GET['id'] . "'";
$r2 = mysqli_query($dbc, $q2);
header('Location: index.php');
} else {
include('../header.htm');
echo '<p>CANNOT DELETE MESSAGE!</p>';
}
}
} else {
header('Location: ../login.php?nl=yes');
}
?>