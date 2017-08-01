<?php
session_start(); 

if ($_SESSION['admin'] == 'y') {
require('../set.php');
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
if ($_GET['sql'] == 'other') {
$sq = $_GET['othersql'];
$sq = stripslashes($sq);
$r = mysqli_query($dbc, $sq);
if ($r == true) {
header('Location: index.php?query=yes');
} else {
$err = mysqli_error($dbc);
urlencode($err);
header('Location: index.php?query=no&err=' . $err);
}
} else {
$r = mysqli_query($dbc, 'SELECT * FROM ' . $_GET['sql']);
echo '<title>Litter - Admin</title>';
include('../header.htm');
echo '<p><a href="index.php">Admin central</a> | Your ip: ' . ip() . '</p>';
while ($cr = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
echo '<pre>';
print_r ($cr);
echo '</pre>';
}
}
} else {
header('Location: login.php');
}
?>