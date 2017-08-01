<?php
if ($_COOKIE['loggedin'] == 'y') {
if (isset($_GET['id'])) {
$q = "UPDATE litter_data SET spam='y' WHERE id=" . $_GET['id'];
require('set.php');
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$r = mysqli_query($dbc, $q);
$q2 = "UPDATE litter_data SET spam_by='" . $_COOKIE['username'] . "' WHERE id=" . $_GET['id'];
$r2 = mysqli_query($dbc, $q2);
header('Location: read.php?user=' . $_GET['user']);
} else {
echo '<p>No id to set as spam message</p>';
}
} else {
header('Location: login.php');
}