<?php
session_start();
require('set.php');
$q = "INSERT INTO litter_fav (user, favusr) VALUES ('" . $_SESSION['username'] . "','" . $_GET['user'] . "')";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
header('Location: fav.php');
?>