<?php
session_start();
require('../set.php');
$q = "SELECT * FROM litter_pages WHERE id = '" . $_GET['id'] . "'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<title>Litter - Personal Web - View page</title>';
include('../header.htm');
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);

if ($_SESSION['loggedin'] == 'y') {
$cr = mysqli_fetch_array($r);
if ($cr['madeby'] == $_SESSION['username']) {
echo '<p><a href="../index.php">Home</a> | <a href="mypages.php">My pages</a> | <a href="edit.php?id=' . $cr['id'] . '">Edit page</a> | View page:</p>';
} else {
echo '<p><a href="../index.php">Home</a> | <a href="mypages.php">My pages</a> | View page:</p>';
}
echo '<p>By: ' . $cr['madeby'] . '</p>';
echo '<p>Named: ' . $cr['pagename'] . '</p>';
echo '<hr>';
echo stripslashes($cr['text']);
echo '<hr>';
require('comments/index.php');
echo '<hr>';
echo '<p><font size="0.5">Made using Litter Personal Web at <i>' . $cr['date'] . '</i> using ' . date_default_timezone_get() . ' time zone</font></p>';
if ($cr['music'] == 'y') {
echo '<audio controls="controls" autoplay="autoplay">
  <source src="song.ogg" type="audio/ogg" />
  <source src="song.mp3" type="audio/mpeg" />
Your browser cannot play the background music
</audio>';
}
} else {
$cr = mysqli_fetch_array($r);
if ($cr['public'] == 'y') {
echo '<p><a href="../index.php">Home</a> | <a href="../login.php">Login</a> | View page:</p>';
echo '<p>By: ' . $cr['madeby'] . '</p>';
echo '<p>Named: ' . $cr['pagename'] . '</p>';
echo '<hr>';
echo stripslashes($cr['text']);
echo '<hr>';
require('comments/index.php');
echo '<hr>';
echo '<p><font size="0.5">Made using Litter Personal Web at <i>' . $cr['date'] . '</i> using ' . date_default_timezone_get() . ' time zone</font></p>';
if ($cr['music'] == 'y') {
echo '<audio controls="controls" autoplay="autoplay">
  <source src="song.ogg" type="audio/ogg" />
  <source src="song.mp3" type="audio/mpeg" />
Your browser cannot play the background music
</audio>';
}
} else {
echo '<p>This page is not avaliable to guests</p>';
}
}

?>