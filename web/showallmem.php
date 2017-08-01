<?php
session_start();
require('../set.php');

$q = "SELECT * FROM litter_pages ORDER BY date DESC";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<title>Litter - All pages</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | <a href="mypages.php">My pages</a> | All pages made:</p>';
echo '<hr>';
if (mysqli_num_rows($r) == 0) {
echo '<p>Sorry, no pages are made yet!, why not make one?</p>';
} else {
while ($cr = mysqli_fetch_array($r)) {
echo '<p>' . $cr['pagename'] . ' | Made by: ' . $cr['madeby'] . ' | At: ' . $cr['date'] . ' | <a href="view.php?id=' . $cr['id'] . '">View</a></p><hr>';
}
}
echo '<p><font size="0.5">Powered by Litter</font></p>';
?>