<?php
$usr = $_GET['user'];
$pss = $_GET['pass'];
$cu = $_GET['view'];
require('../../set.php');
$q = "SELECT * FROM litter_usr WHERE username = '$usr' AND password = SHA1('$pss')";
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$r = mysqli_query($dbc, $q);
if (mysqli_num_rows($r) == 1) {
$q = "SELECT DATE_FORMAT(date, \"%a, %d - %m - %y | %h:%i %p - %s seconds\") AS thedate, txt, spam, user, spam_by, from_usr, id FROM litter_data WHERE user = '$cu' ORDER BY date DESC";
$r = mysqli_query($dbc, $q);
while ($cr = mysqli_fetch_array($r)) {
echo '<p>Posted by: <i>' . $cr['from_usr'] . '</i></p>';
$tmptext = preg_replace('/:smile/', '<img src="http://litter.comuv.com/smiles/smile.png" width=15 height=15>', $cr['txt']);
$tmptext2 = preg_replace('/:spit/', '<img src="http://litter.comuv.com/smiles/smilespit.gif" width=15 height=15>', $tmptext);
$tmptext3 = preg_replace('/:sad/', '<img src="http://litter.comuv.com/smiles/sadsmile.jpg" width=15 height=15>', $tmptext2);
$tmptext4 = preg_replace('/:evil/', '<img src="http://litter.comuv.com/smiles/evil.png" width=15 height=15>', $tmptext3);
$tmptext5 = preg_replace('/:angry/', '<img src="http://litter.comuv.com/smiles/angry.png" width=15 height=15>', $tmptext4);
$tmptext6 = preg_replace('/:cash/', '<img src="http://litter.comuv.com/smiles/cash.png" width=15 height=15>', $tmptext5);
$realtext = preg_replace("/[\n\r]/", "</p><p>", $tmptext6);
echo '<p>' . $realtext . '</p>';
if ($_GET['buttons'] == 'yes') {
echo '<p>' . $cr['thedate'] . ' | BUTTONS IN DEV</p>';
} else {
echo '<p>' . $cr['thedate'] . '</p>';
}
echo '<hr>';
}
} else {
echo '<title>ERRUSR</title>';
echo '<p>Sorry, a user and pass system error has occured!</p>';
}

?>