<?php
session_start();
require('../set.php');
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$txt = mysqli_real_escape_string($dbc, $_POST['pagedata']);
$q = "UPDATE litter_pages SET text = '" . $txt . "' WHERE id = " . $_POST['id'];
$r = mysqli_query($dbc, $q);
$q2 = "UPDATE litter_pages SET music = '" . $_POST['music'] . "' WHERE id = " . $_POST['id'];
$r2 = mysqli_query($dbc, $q2);
$q3 = "INSERT INTO litter_events (user, action, date) VALUES ('" . $_SESSION['username'] . "', 'updated a page on Personal Web', NOW())";
$r3 = mysqli_query($dbc, $q3);
header('Location: mypages.php');

?>