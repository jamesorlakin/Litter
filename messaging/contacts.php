<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
echo '<script>
function change(who) {
window.opener.formforcompose.requiredto.value = who;
window.close();
}
</script>';
require('../set.php');
$q = "SELECT * FROM litter_fav WHERE user='" . $_SESSION['username'] . "'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<title>Choose contact</title>';
if (mysqli_num_rows($r) == 0) {
echo '<p align="center">No users are in your favourites list</p>';
} else {
if (preg_match('/iPhone/', $_SERVER['HTTP_USER_AGENT'])) {
echo '<p align="center">People in your favourite list, Thanks for using this site on a iDevice</p>';
} else {
echo '<p align="center">People in your favourite list</p>';
}
while ($cr = mysqli_fetch_array($r)) {
echo '<p>' . $cr['favusr'] . ' | <a href="javascript: change(\'' . strtolower($cr['favusr']) . '\');">Send to user</a></p>';
echo '<hr>';
}
echo '<p>Stick with <A href="javascript: window.close();">current user</A></p>';
}
} else {
echo '<p>ERROR, SESSION EXPIRED!</p>';
}
?>