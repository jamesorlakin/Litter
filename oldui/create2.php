<?php
if ($_COOKIE['loggedin'] == 'y') {
if (isset($_GET['user'])) {
if (isset($_POST['sub'])) {
$usr = $_COOKIE['username'];
$tmptxt = preg_replace("/'/", "\'", $_POST['txt']);
$tmptxt2 = preg_replace("/fuck/", "f**k, $tmptxt);
$txt = preg_replace("/shit/", "s**t", $tmptxt2);
$cu = $_GET['user'];
$q = "INSERT INTO litter_data (from_usr, txt, date, user, spam, spam_by) VALUES ('$usr', '$txt', NOW(), '$cu', 'n', 'nobody')";
require('set.php');
$r = mysqli_query(mysqli_connect('localhost', $msql_usr, $msql_pss, $msql_db), $q);
$q2 = "SELECT * FROM litter_usr WHERE username ='" . $_GET['user'] . "'";
$r2 = mysqli_query(mysqli_connect('localhost', $msql_usr, $msql_pss, $msql_db), $q2);
while ($cr = mysqli_fetch_array($r2)) {
if ($cr['autoemail'] == 'y') {
$fintxt = 'NEW POST: ' . $txt . ' | FROM: ' . $usr;
$fintxt2 = wordwrap($fintxt, 70);
mail($cr['email'], 'Litter post notification', $fintxt2, 'From: donotreply@litter.com');
}
echo "<script>
window.location = \"read.php?user=$cu\"
</script>";
}
}
} else {
include('header.htm');
echo '<p>Sorry, No username was entered to write a message</p>';
}
} else {
header('Location: login.php');
}
?>