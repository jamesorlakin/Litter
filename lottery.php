<?php
require('set.php');
session_start();
if ($_SESSION['loggedin'] == 'y') {
$q = "SELECT * FROM litter_usr WHERE username='" . $_SESSION['username'] . "'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$cr = mysqli_fetch_array($r);
if ($cr['lotterydate'] == date('Y-m-d')) {
echo '<title>Litter - Lottery</title>';
include('header.htm');
echo '<p><a href="index.php">Home</a></p>';
echo '<p>Sorry, you have already done the lottery today, please try again tomorrow</p>';
if (isset($_SESSION['lot'])) {
echo 'Your last lottery numbers were: ' . $_SESSION['lot'];
}
} else {
function rannum() {
$num = rand(1, 26);

if ($num == 1) {
$finnum = 'A';
}

if ($num == 2) {
$finnum = 'B';
}
if ($num == 3) {
$finnum = 'C';
}
if ($num == 4) {
$finnum = 'D';
}
if ($num == 5) {
$finnum = 'E';
}
if ($num == 6) {
$finnum = 'F';
}
if ($num == 7) {
$finnum = 'G';
}
if ($num == 8) {
$finnum = 'H';
}
if ($num == 9) {
$finnum = 'I';
}
if ($num == 10) {
$finnum = 'J';
}
if ($num == 11) {
$finnum = 'K';
}
if ($num == 12) {
$finnum = 'L';
}
if ($num == 13) {
$finnum = 'M';
}
if ($num == 14) {
$finnum = 'N';
}
if ($num == 15) {
$finnum = 'O';
}
if ($num == 16) {
$finnum = 'P';
}
if ($num == 17) {
$finnum = 'Q';
}
if ($num == 18) {
$finnum = 'R';
}
if ($num == 19) {
$finnum = 'S';
}
if ($num == 20) {
$finnum = 'T';
}
if ($num == 21) {
$finnum = 'U';
}
if ($num == 22) {
$finnum = 'V';
}
if ($num == 23) {
$finnum = 'W';
}
if ($num == 24) {
$finnum = 'X';
}
if ($num == 25) {
$finnum = 'Y';
}
if ($num == 26) {
$finnum = 'Z';
}

return $finnum;
}
$q2 = "UPDATE litter_usr SET lotterydate = NOW() WHERE username = '" . $_SESSION['username'] . "'";
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
$q5 = "INSERT INTO litter_events (user, action, date) VALUES ('" . $_SESSION['username'] . "', 'entered into the lottery', NOW())";
$r5 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q5);
echo '<title>Litter - Lottery</title>';
include('header.htm');
echo '<p><a href="index.php">Home</a> | Your lottery word:</p>';
$lottery = rannum();
$lottery2 = rannum();
$lottery3 = rannum();
echo "<p>$lottery $lottery2 $lottery3</p>";
$_SESSION['lot'] = "$lottery $lottery2 $lottery3";
if ($lottery == $lottery2) {
if ($lottery2 == $lottery3) {
echo '<p>Congrats! You have won the lottery, your prize is a month in the Litter Gaming service</p>';
$q3 = "INSERT INTO litter_data (user, from_usr, date, txt) VALUES ('" . $_SESSION['username'] . "', 'Litter', NOW(), 'You have won the litter lottery! Well done')";
$r3 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q3);
$q4 = "UPDATE litter_usr SET gaming = NOW() WHERE username = '" . $_SESSION['username'] . "'";
$r4 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q4);
}
}
} 
} else {
header('Location: login.php?nl=yes');
}
?>