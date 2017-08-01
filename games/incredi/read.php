<?php
session_start();

if (!empty($_GET['id'])) {
require('../../set.php');

$q = "SELECT * FROM litter_robots WHERE id = '" . $_GET['id'] . "'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$cr = mysqli_fetch_array($r);

echo '<p><a href="index.php">Back</a> | BOT CODE: (' . $cr['botname'] . ')</p>';
echo '<textarea>' . $cr['botdetails'] . '</textarea>';
}

?>