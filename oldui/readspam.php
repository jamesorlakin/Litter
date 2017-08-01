<?php
if ($_COOKIE['loggedin'] == 'y') {
require('set.php');
include('header.htm');
$q = "SELECT * FROM litter_data WHERE id=" . $_GET['id'];
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
if (mysqli_num_rows($r) == 1) {
echo '<p align=center>View a spamed message</p>';
while ($cr = mysqli_fetch_array($r)) {
echo $cr['txt'];
}
} else {
echo '<p>Post is invalid</p>';
}
} else {
header('Location: login.php');
}
?>