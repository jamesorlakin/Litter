<?php
session_start();
require('../../set.php');
if (isset($_POST['sub'])) {
$usr = $_POST['usr'];
$pss = $_POST['pss'];
$q = "SELECT * FROM litter_usr WHERE username = '$usr' AND password = SHA1('$pss')";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
if (mysqli_num_rows($r) == 0) {
echo '<p>Username / pass not recognised</p>';
} else {
$q3 = "INSERT INTO litter_ip (ip, username) VALUES ('" . $_SERVER['REMOTE_ADDR'] . "', '$usr')";
$r3 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q3);
$_SESSION['username'] = $usr;
header('Location: index.php');
}
} else {
echo '<p align=center><img src="../../head.png" width=100 height=45></p>';
echo '<form src="index.php" method=post>
<p>Username: <input type=text name="usr"></p>
<p>Password: <input type=password name="pss"></p>
<input type=hidden name="sub" value="true">
<input type=submit value="Login to view messages">
</form>';
}
?>