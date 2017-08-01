<?php
session_start();
$usr = $_SESSION['username'];
require('set.php');
$q = "INSERT INTO litter_events (user, action, date) VALUES ('" . $_SESSION['username'] . "', 'logged out of Litter', NOW())";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$_SESSION['loggedin'] = 'n';
$_SESSION['username'] = 'NOT LOGGED IN';
header('Location: index.php');
?>