<?php
session_start();

require('../../set.php');
$q = "SELECT * FROM litter_events WHERE user = '" . $_GET['view'] . "' ORDER BY date DESC LIMIT 75";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<p align="center"><font style="color: green">' . $_GET['view'] . '\'s events</font></p>';
echo '<hr size="0.5" width="96%">';
if ($_SESSION['username'] == $_GET['view']) {
echo '<table><tr><th>Event</th><th>Date</th><th>Action</th></tr>';
} else {
echo '<table><tr><th>Event</th><th>Date</th></tr>';
}
while ($cr = mysqli_fetch_array($r)) {
if ($_SESSION['username'] == $_GET['view'] or $_SESSION['admin'] == 'y') {
echo '<tr><td><font style="color: green">' . $cr['user'] . '</font> ' . $cr['action'] . '</td><td>' . $cr['date'] . '</td><td><a href="del.php?id=' . $cr['id'] . '&view=' . $_GET['view'] . '">Remove</a></td></tr>';
} else {
echo '<tr><td><font style="color: green">' . $cr['user'] . '</font> ' . $cr['action'] . '</td><td>' . $cr['date'] . '</td></tr>';
}
}
echo '</table>';

?>