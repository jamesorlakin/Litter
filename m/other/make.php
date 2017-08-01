<?php
session_start();
require('../../set.php');
$q2 = "SELECT * FROM litter_ip WHERE ip = '" . $_SERVER['REMOTE_ADDR'] . "'";
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
$cr = mysqli_fetch_array($r2);

if (isset($cr['ip'])) {
if (!isset($_POST['sub'])) {
echo '<p align=center><img src="../../head.png" width=100 height=45></p>';
echo '<form action="make.php" method=post>
<p>Text:</p>
<textarea name="text" rows=6></textarea>
<input type=hidden name="sub" value="YES">
<p><input type=submit value="Make message"></p>
</form>';
} else {
$txt = $_POST['text'];
$cu = $cr['username'];
$q = "INSERT INTO litter_data (txt, date, user, from_usr) VALUES ('$txt', NOW(), '$cu', '$cu')";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
header('Location: index.php');
}
} else {
header('Location: index.php');
}
?>