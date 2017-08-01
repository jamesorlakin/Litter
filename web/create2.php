<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
require('../set.php');
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$txt = mysqli_real_escape_string($dbc, $_POST['pagedata']);
$q = "INSERT INTO litter_pages (pagename, public, text, date, madeby, music) VALUES ('" . $_POST['pagename'] . "', '" . $_POST['public'] . "', '" . $txt . "', NOW(), '" . $_SESSION['username'] . "', '" . $_POST['music'] . "')";
$r = mysqli_query($dbc, $q);
$q2 = "INSERT INTO litter_events (user, action, date) VALUES ('" . $_SESSION['username'] . "', 'made a page in Personal Web', NOW())";
$r2 = mysqli_query($dbc, $q2);
header('Location: mypages.php');
} else {
header('Location: ../login.php?nl=yes');
}

?>