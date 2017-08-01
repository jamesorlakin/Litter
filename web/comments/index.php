<?php
session_start();

$q = "SELECT * FROM litter_comments WHERE pageid = '" . $_GET['id'] . "' ORDER BY date DESC";
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$r = mysqli_query($dbc, $q);
echo '<style>div {background-color:lightblue;}</style>';

if (mysqli_num_rows($r) == 0) {
echo '<p><font size="2">No comments yet!</font></p>';
} else {
while($cr = mysqli_fetch_array($r)) {
if ($_SESSION['admin'] != 'y') {
echo '<div><p><font size="2">' . $cr['txt'] . '</font><br style="line-height:10px" /><font size="1.25">Posted by: ' . $cr['madeby'] . ' at ' . $cr['date'] . '</font></p></div>';
} else {
echo '<div><p><font size="2">' . $cr['txt'] . '</font><br style="line-height:10px" /><font size="1.25">Posted by: ' . $cr['madeby'] . ' at ' . $cr['date'] . ' | <a href="comments/del.php?id=' . $cr['id'] . '&pageid=' . $_GET['id'] . '">Delete</a></font></p></div>';
}
}
}
if ($_SESSION['loggedin'] == 'y') {
echo '<form action="comments/post.php" method="post"><input name="pgid" value="' . $_GET['id'] . '" type="hidden">';
echo '<p>Post comment: </p><textarea name="txt" ></textarea><br />';
echo '<input type="submit" value="Post comment onto this page"></form>';
}

?>