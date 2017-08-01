<?php
require('../../set.php');
$cfu = $_GET['user'];
$pss = $_GET['pass'];

$q = "SELECT * FROM litter_usr WHERE username = '$cfu' AND password = SHA1('$pss')";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
if (mysqli_num_rows($r) == 1) {
$txt = $_GET['msg'];
$csu = $_GET['send'];

$q2 = "INSERT INTO litter_data (user, from_usr, txt, date) VALUES ('$csu', '$cfu', '$txt', NOW())";
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
if ($r2 == true) {
echo '<title>YES</title>';
} else {
echo '<title>NO</title>';
}
} else {
echo '<title>ERRUSR</title>';
}

?>