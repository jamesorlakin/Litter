<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
require('../set.php');
$q = "SELECT * FROM litter_pages ORDER BY visits DESC LIMIT 5";
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$r = mysqli_query($dbc, $q);
echo '<title>Litter - Popular pages</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | <a href="mypages.php">My Pages</a> | <a href="search.php">Search for page</a> | Most popular pages:</p>';
echo '<table><tr><th>Page name</th><th>Made by</th><th>Date created</th></tr>';
while ($cr = mysqli_fetch_array($r)) {
echo '<tr><td><a href="view.php?id=' . $cr['id'] . '">' . $cr['pagename'] . '</a></td><td>' . $cr['madeby'] . '</td><td>' . $cr['date'] . '</td></tr>';
}
echo '</table>';
} else {
header('Location: ../login.php?nl=yes');
}

?>