<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
$q = "SELECT * FROM litter_pages WHERE madeby = '" . $_SESSION['username'] . "'";
require('../set.php');
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<title>Litter - My Pages</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | <a href="create.php">Create a page</a> | <a href="search.php">Search</a> | <a href="showallmem.php">Show all pages</a> | My pages:</p><hr>';
if (mysqli_num_rows($r) == 0) {
echo '<p>No pages created, why not make one now?</p>';
}
while ($cr = mysqli_fetch_array($r)) {
echo '<p>' . $cr['pagename'] . ' | <a href="view.php?id=' . $cr['id'] . '">View page</a> | <a href="edit.php?id=' . $cr['id'] . '">Edit page</a> | <a href="delete.php?id=' . $cr['id'] . '">Delete page</a></p>';
echo '<hr>';
}
} else {
header('Location: ../login.php?nl=yes');
}

?>