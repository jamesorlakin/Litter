<?php
$usr = $_GET['user'];
$pss = $_GET['pass'];
require('../../set.php');
$q = "SELECT * FROM litter_usr WHERE username = '$usr' AND password = SHA1('$pss')";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
if (mysqli_num_rows($r) == 1) {
echo '<title>YES</title>';
} else {
echo '<title>NO</title>';
}

?>