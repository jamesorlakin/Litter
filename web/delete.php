<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
require('../set.php');
$q = "SELECT * FROM litter_pages WHERE id = " . $_GET['id'];
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$r = mysqli_query($dbc, $q);
$cr = mysqli_fetch_array($r);
if ($cr['madeby'] == $_SESSION['username']) {
$q2 = "DELETE FROM litter_pages WHERE id = " . $_GET['id'];
$r2 = mysqli_query($dbc, $q2);
$q3 = "DELETE FROM litter_comments WHERE pageid = '" . $_GET['id'] . "'";
$r3 = mysqli_query($dbc, $q2);
header('Location: mypages.php');
} else {
echo '<p>ERROR</p>';
}
} else {
header('Location: ../login.php?nl=yes');
}

?>