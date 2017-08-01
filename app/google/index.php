<?php
require('../../set.php');
$q = "SELECT * FROM litter_ip WHERE ip = '" . ip() . "'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
if (mysqli_num_rows($r) == 0) {
header('Location: login.php?amount=' . $_GET['amount']);
} else {
$cr = mysqli_fetch_array($r);
$usr = $cr['username'];
echo '<p align=center>' . $usr . '\'s messages</p>';
if ($_GET['amount'] == 'five') {
$q2 = "SELECT DATE_FORMAT(date, \"%a, %d - %m - %y | %h:%i %p - %s seconds\") AS thedate, txt, spam, user, spam_by, from_usr, id FROM litter_data WHERE user = '$usr' ORDER BY date DESC LIMIT 5";
} elseif ($_GET['amount'] == 'ten') {
$q2 = "SELECT DATE_FORMAT(date, \"%a, %d - %m - %y | %h:%i %p - %s seconds\") AS thedate, txt, spam, user, spam_by, from_usr, id FROM litter_data WHERE user = '$usr' ORDER BY date DESC LIMIT 10";
} elseif ($_GET['amount'] == 'two') {
$q2 = "SELECT DATE_FORMAT(date, \"%a, %d - %m - %y | %h:%i %p - %s seconds\") AS thedate, txt, spam, user, spam_by, from_usr, id FROM litter_data WHERE user = '$usr' ORDER BY date DESC LIMIT 2";
} else {
$q2 = "SELECT DATE_FORMAT(date, \"%a, %d - %m - %y | %h:%i %p - %s seconds\") AS thedate, txt, spam, user, spam_by, from_usr, id FROM litter_data WHERE user = '$usr' ORDER BY date DESC";
}
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
echo '<hr>';
while ($cr = mysqli_fetch_array($r2)) {
echo '<p>From: <i>' . $cr['from_usr'] . '</i></p>';
echo '<p>' . $cr['txt'] . '</p>';
echo '<p>' . $cr['thedate'] . '</p>';
echo '<hr>';
}
echo '<p align=center>END OF MESSAGES</p>';
}
?>