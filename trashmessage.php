<?php
session_start();
$usr = $_SESSION['username'];
require('set.php');
$q = "DELETE FROM litter_data WHERE user='$usr'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$q2 = "INSERT INTO litter_data (from_usr, user, date, txt) VALUES ('Litter', '$usr', NOW(), 'You have emptied your message list')";
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
echo '<title>Litter - Deleted all messages</title>';
include('header.htm');
echo '<p><a href="index.php">Go home</a></p>';
echo '<p>Your messages have been deleted</p>';

?>