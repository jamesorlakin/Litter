<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Search for pages</title>';
include('../header.htm');
echo '<p><a href="index.php">Home</a> | <a href="mypages.php">My Pages</a> | Search:</p><hr>';
if (!empty($_GET['q'])) {
require('../set.php');
$q = "SELECT * FROM litter_pages WHERE pagename LIKE '%" . $_GET['q'] . "%'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
if (mysqli_num_rows($r) == 0) {
echo '<p>No results!</p>';
} else {
while ($cr = mysqli_fetch_array($r)) {
$pg = preg_replace('/' . $_GET['q'] . '/', '<font style="color:red">' . $_GET['q'] . '</font>', $cr['pagename']);
echo '<p>' . $pg . ' | <a href="view.php?id=' . $cr['id'] . '">View</a></p>';
echo '<hr>';
}
}
}
echo '<form action="search.php"><p align="center"><input type="text" name="q"></p><p align="center"><input type="submit" value="Search for pages"></p></form>';
} else {
// Public search
echo '<title>Litter - Search for pages</title>';
include('../header.htm');
echo '<p><a href="index.php">Home</a> | <a href="showall.php">All pages</a> | Search public pages:</p><hr>';
if (!empty($_GET['q'])) {
require('../set.php');
$q = "SELECT * FROM litter_pages WHERE pagename LIKE '%" . $_GET['q'] . "%' AND public = 'y'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
if (mysqli_num_rows($r) == 0) {
echo '<p>No results!</p>';
} else {
while ($cr = mysqli_fetch_array($r)) {
$pg = preg_replace('/' . $_GET['q'] . '/', '<font style="color:red">' . $_GET['q'] . '</font>', $cr['pagename']);
echo '<p>' . $pg . ' | <a href="view.php?id=' . $cr['id'] . '">View</a></p>';
echo '<hr>';
}
}
}
echo '<form action="search.php"><p align="center"><input type="text" name="q"></p><p align="center"><input type="submit" value="Search for pages"></p></form>';
}
?>