<?php
session_start();
$cu = $_SESSION['username'];
if ($_SESSION['loggedin'] == 'y') {
if ($_GET['delete'] !== 'yes') {
echo '<title>Litter - Delete account</title>';
include('header.htm');
echo '<p>ARE YOU SURE YOU WANT TO DELETE YOUR ACCOUNT AND MESSAGES WITH IT?</p>';
echo '<p><a href="delaccount.php?delete=yes">YES</a> | <a href="index.php">NO</a></p>';
} else {
require('set.php');
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$q = "DELETE FROM litter_usr WHERE username='$cu'";
$r = mysqli_query($dbc, $q);
$q2 = "DELETE FROM litter_data WHERE user='$cu'";
$r2 = mysqli_query($dbc, $q2);
$_SESSION['loggedin'] = 'n';
echo '<title>Litter - Account deleted</title>';
include('header.htm');
echo '<p>Your account has been deleted, if you want to subscribe again please register. If you deleted your account to have a new username you could have done so in th edit account section</p>';
echo '<p><a href="index.php">Home</a> | <a href="reg.php">Register again</a></p>';
}
} else {
header('Location: login.php?nl=yes');
}
?>