<?php
if ($_COOKIE['loggedin'] == 'y') {
if (isset($_GET['user'])) {
$q = "SELECT * FROM litter_data WHERE user = '" . $_GET['user'] . "' ORDER BY date DESC";
require('set.php');
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
include('header.htm');
echo '<p>' . $_GET['user'] . '\'s litter messages';
echo '<p align=left><a href="index.php">Homepage</a> | <a href="create.php?user=' . $_GET['user'] . '">Write a entry</a> | <a href="logout.php">Logout</a></p>';
echo '<hr>';
if (mysqli_num_rows($r) == 0) {
echo '<p>This user is invalid</p>';
} else {
while ($cr = mysqli_fetch_array($r)) {
$usr = $cr['from_usr'];
echo "<p>Posted by: <i>$usr</i> | <a href=\"create.php?user=$usr\">Write a message on this users wall</a> | <a href=\"read.php?user=$usr\">Read this users wall</a></p>";
if ($cr['spam'] == 'y') {
echo '<p><i>This post has been marked as spam by ' . $cr['spam_by'] . '</i> | <a href="readspam.php?id=' . $cr['id'] . '">Read this spamed message</a> | <a href="unsetspam.php?id=' . $cr['id'] . '&user=' . $_GET['user'] . '">Unmark as spam</a></p>';
echo '<hr>';
} else {
echo '<p>' . $cr['txt'] . '</p>';
echo "<p>" . $cr['date'] . " | <a href=\"setspam.php?id=" . $cr['id'] . "&user=" . $_GET['user'] . "\">Mark as spam</a></p>";
echo '<hr>';
}
} // End of while
} // End of check for invalid user
} else { // Else for get check
include('header.htm');
echo '<p>No user has been selected</p>';
} // End of else for get check
} else {
header('login.php');
}
?>