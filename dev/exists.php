<?php

require('../set.php');

if (isset($_GET['usr'])) {
$q = "SELECT * FROM litter_usr WHERE username='" . $_GET['usr'] . "'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
if (mysqli_num_rows($r) == 1) {
echo 'y';
} else {
echo 'n';
}
}

?>