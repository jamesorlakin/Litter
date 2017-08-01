<?php
session_start();
$id = $_GET['id'];
require('set.php');
$q = "DELETE FROM litter_diary WHERE id=$id";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
header('Location: diary.php');
?>