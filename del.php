<?php
require('set.php');
$q = "DELETE FROM litter_fav WHERE id=" . $_GET['id'];
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
header('Location: fav.php');
?>