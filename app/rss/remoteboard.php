<?php

require('../../set.php');
$q = "SELECT * FROM litter_usr WHERE username = '" . $_GET['user'] . "'";
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$r = mysqli_query($dbc, $q);
$cur = mysqli_fetch_array($r);
if ($cur['public'] == 'n') {
echo '<p align=center>Litter - Error</p>';
echo '<p>Sorry, there is a problem reading <code>' . $_GET['user'] . '</code>\'s messages, please make sure that <code>' . $_GET['user'] . '</code> has set their messages as public.</p>';
} else {
echo '<p align=center>Watch ' . $_GET['user'] . '\'s messages</p>';
$q2 = "SELECT DATE_FORMAT(date, \"%a, %d - %m - %y | %h:%i %p - %s seconds\") AS thedate, txt, spam, user, spam_by, from_usr, id FROM litter_data WHERE user = '" . $_GET['user'] . "' ORDER BY date DESC";
$r2 = mysqli_query($dbc, $q2);
echo '<hr>';
while ($cr = mysqli_fetch_array($r2)) {
echo '<p>Posted by: <i>' . $cr['from_usr'] . '</i></p>';
echo '<p>' . $cr['txt'] . '</p>';
echo '<p>' . $cr['thedate'] . '</p>';
echo '<hr>';
}
echo '<p><font size="0.5">Powered by <a href="http://litter.comuv.com" target="_blank">Litter</a></font></p>';
}

?>