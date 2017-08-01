<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Search</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | Search for user:</p>';
if (!isset($_GET['q'])) {
include('form.htm');
} else {
require('../set.php');
$q = "SELECT * FROM litter_usr WHERE username LIKE '%" . $_GET['q'] . "%'";
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db); 
$r = mysqli_query($dbc, $q);
$q2 = "SELECT * FROM litter_usr WHERE fullname LIKE '%" . $_GET['q'] . "%'";
$r2 = mysqli_query($dbc, $q2);
if ($_GET['background'] !== 'no') {
echo '<p>Search results for "' . $_GET['q'] . '" | ' . mysqli_num_rows($r) . ' results found when searching for usernames | ' . mysqli_num_rows($r2) . ' results wehn searching for full names | <a href="search.php?q=' . $_GET['q'] . '&background=no">Turn off colored background</a></p>';
echo '<style>div {background-color:lightblue;}</style>';
} else {
echo '<p>Search results for "' . $_GET['q'] . '" | ' . mysqli_num_rows($r) . ' results found when searching for usernames | ' . mysqli_num_rows($r2) . ' results wehn searching for full names | <a href="search.php?q=' . $_GET['q'] . '">Turn on colored background</a></p>';
}
echo '<h2>Searching by username:</h2>';
echo '<div>';
while ($cr = mysqli_fetch_array($r)) {
$cr['username2'] = strtolower($cr['username']);
$cr['username2'] = preg_replace('/' . $_GET['q'] . '/', '<font style="color: red">' . $_GET['q'] . '</font>', $cr['username2']);
echo '<p>' . $cr['username2'] . ' | <a href="../read.php?user=' . $cr['username'] . '">Read messages</a></p>';
}
echo '</div>';
echo '<h2>Searching by full name:</h2>';
echo '<div>';
while ($cr = mysqli_fetch_array($r2)) {
$cr['fullname2'] = strtolower($cr['fullname']);
$cr['fullname2'] = preg_replace('/' . $_GET['q'] . '/', '<font style="color: red">' . $_GET['q'] . '</font>', $cr['fullname2']);
echo '<p>' . $cr['fullname2'] . ' | ' . $cr['username'] . ' | <a href="../read.php?user='  . $cr['username'] . '">Read messages</a></p>';
}
echo '</div>';
include('form.htm');
}
} else {
header('Location: ../login.php?nl=yes');
}
?>	