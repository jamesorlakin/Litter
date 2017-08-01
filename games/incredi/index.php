<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
require('../../set.php');
$q = "SELECT * FROM litter_robots WHERE user = '" . $_SESSION['username'] . "'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<p align="center">YOUR ROBOTS:</p>';
echo '<p><A href="make.php">Make new</a></p>';
while ($cr = mysqli_fetch_array($r)) {
echo '<p>' . $cr['botname'] . ' | <a href="read.php?id=' . $cr['id'] . '">Open</a> | <a href="del.php?id=' . $cr['id'] . '">Delete</a></p>';
}
} else {
header('Location: ../../login.php?nl=yes');
}

?>