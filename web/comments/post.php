<?php
session_start();
require('../../set.php');
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$txt = mysqli_escape_string($dbc, $_POST['txt']);
$q = "INSERT INTO litter_comments (pageid, txt, madeby, date) VALUES ('" . $_POST['pgid'] . "', '$txt', '" . $_SESSION['username'] . "', NOW())";
$r = mysqli_query($dbc, $q);
header('Location: ../view.php?id=' . $_POST['pgid']);
?>