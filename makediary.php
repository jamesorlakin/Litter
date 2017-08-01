<?php
session_start();

if (isset($_POST['sub'])) {
require('set.php');
$txt = $_POST['txt'];
$cu = $_SESSION['username'];
$q = "INSERT INTO litter_diary (txt, date, user) VALUES ('$txt', NOW(), '$cu')";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$q = "INSERT INTO litter_events (action, date, user) VALUES ('made an entry into his diary', NOW(), '$cu')";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
header('Location: diary.php');
} else {
echo '<title>Litter - Make diary entry</title>';
include('header.htm');
include('make.htm');
}
?>