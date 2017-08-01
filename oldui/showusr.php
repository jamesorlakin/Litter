<?php
if ($_COOKIE['loggedin'] == 'y') {
include('header.htm');
$q = "SELECT * FROM litter_usr";
require('set.php');
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<p><a href="index.php">Home</a></p>';
echo '<p>Current registered users:</p>';
echo '<hr>';
while ($row = mysqli_fetch_array($r)) {
$usr = $row['username'];
echo "<p>$usr | <a href=\"read.php?user=$usr\">Read this users messages</a></p>";
echo '<hr>';
}
} else {
include('header.htm');
$q2 = "SELECT * FROM litter_usr";
require('set.php');
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
echo '<p><a href="index.php">Home</a></p>';
echo '<p>Current registered users:</p>';
echo '<hr>';
while ($row = mysqli_fetch_array($r2)) {
$usr = $row['username'];
if ($row['public'] == 'y') {
echo "<p>$usr | <a href=\"login.php?selusr=$usr\">Login as this user</a> | <a href=\"read2.php?user=$usr\">Read this users messages</a></p>";
echo '<hr>';
} else {
echo "<p>$usr | <a href=\"login.php?selusr=$usr\">Login as this user</a></p>";
echo "<hr>";
}
}
}
?>