<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
require('../set.php');
$usr = $_GET['usr'];
$q = "SELECT * FROM litter_usr WHERE username = '$usr'";
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) == 0) {
$q2 = "UPDATE litter_usr SET username='$usr' WHERE username = '" . $_SESSION['username'] . "'";
$r2 = mysqli_query($dbc, $q2);
echo '<title>Litter - Changing username</title>';
include('../header.htm');
echo '<p><a href="index.php">Account management</a> | Changing username:</p>';
if ($r) {
echo '<p>Username changed successfully!</p>';
$q3 = "UPDATE litter_data SET user = '$usr' WHERE user = '" . $_SESSION['username'] . "'";
$r3 = mysqli_query($dbc, $q3);
$q3 = "UPDATE litter_data SET from_usr = '$usr' WHERE from_usr = '" . $_SESSION['username'] . "'";
$r3 = mysqli_query($dbc, $q3);
$q3 = "UPDATE litter_events SET user = '$usr' WHERE user = '" . $_SESSION['username'] . "'";
$r3 = mysqli_query($dbc, $q3);
$q3 = "UPDATE litter_pages SET madeby = '$usr' WHERE madeby = '" . $_SESSION['username'] . "'";
$r3 = mysqli_query($dbc, $q3);
$q3 = "UPDATE litter_diary SET user = '$usr' WHERE user = '" . $_SESSION['username'] . "'";
$r3 = mysqli_query($dbc, $q3);
$q3 = "UPDATE litter_messaging SET user = '$usr' WHERE user = '" . $_SESSION['username'] . "'";
$r3 = mysqli_query($dbc, $q3);
$q3 = "UPDATE litter_messaging SET from_usr = '$usr' WHERE from_usr = '" . $_SESSION['username'] . "'";
$r3 = mysqli_query($dbc, $q3);
$q3 = "UPDATE litter_fav SET user = '$usr' WHERE user = '" . $_SESSION['username'] . "'";
$r3 = mysqli_query($dbc, $q3);
$q3 = "UPDATE litter_events SET user = '$usr' WHERE user = '" . $_SESSION['username'] . "'";
$r3 = mysqli_query($dbc, $q3);
$_SESSION['username'] = $usr;
} else {
echo '<p>There was a error changing your username</p>';
}

} else {
echo '<title>Litter - Changing username</title>';
include('../header.htm');
echo '<p><a href="index.php">Account management</a> | Changing username:</p>';
echo '<p>Username already taken!</p>';
}
} else {
header('Location: ../login.php?nl=yes');
}
?>