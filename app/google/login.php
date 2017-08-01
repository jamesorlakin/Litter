<?php
require('../../set.php');
if (isset($_POST['sub'])) {
$usr = $_POST['usr'];
$pss = $_POST['pss'];
$q = "SELECT * FROM litter_usr WHERE username = '$usr' AND password = SHA1('$pss')";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
if (mysqli_num_rows($r) == 0) {
echo '<p>Username / pass not recognised</p>';
} else {
$q3 = "INSERT INTO litter_ip (ip, username) VALUES ('" . ip() . "', '$usr')";
$r3 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q3);
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
} else {
echo '<form src="index.php" method=post>
<p>Username: <input type=text name="usr"></p>
<p>Password: <input type=password name="pss"></p>
<input type=hidden name="sub" value="true">
<input type=submit value="Login to view messages">
</form>';
}
?>