<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
require('../set.php');
echo '<title>Litter - Report bug</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | Report bug:</p>';
echo '<form action="report2.php">';
$q = "SELECT * FROM litter_usr WHERE username='" . $_SESSION['username'] . "'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$cur = mysqli_fetch_array($r);
echo '<p>Your full name: <input type=text name="fullname" value="' . $cur['fullname'] . ' ( ' . $_SESSION['username'] . ' )" disabled="disabled"></p>';
echo '<p>Your problem:</p>';
echo '<textarea name="prob" cols="50" rows="18"></textarea>';
} else {
header	('Location: ../login.php?nl=yes');
}
?>