<?php
require('set.php');
$q = "DELETE FROM litter_usr WHERE username='" . $_GET['user'] . "'";
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$r = mysqli_query($dbc, $q);
$q2 = "DELETE FROM litter_data WHERE user='" . $_GET['user'] . "'";
$r2 = mysqli_query($dbc, $q2);
echo '<title>Litter - Delete abusive account</title>';
include('header.htm');
echo '<p>User: ' . $_GET['user'] . ' has been deleted</p>';
?>