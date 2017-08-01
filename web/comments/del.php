<?php
session_start();
require('../../set.php');
$q = "DELETE FROM litter_comments WHERE id = " . $_GET['id'];
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
header('Location: ../view.php?id=' . $_GET['pageid']);
?>