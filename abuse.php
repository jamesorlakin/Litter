<?php
session_start();
require('set.php');
if (!isset($_GET['del'])) {
$q = "SELECT * FROM litter_data WHERE id=" . $_GET['id'];
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$cr = mysqli_fetch_array($r);

$txt = "<p>A message has been reported as abuse.</p>
<p>Actions:</p>
<p><a href=\"http://" . $webaddress . "/abuse.php?del=yes&id=" . $_GET['id'] . "\">Delete the message</a></p>
<p><a href=\"http://" . $webaddress . "/abusedelac.php?user=" . $cr['from_usr'] . "\">Delete offenders account</a></p>
<p>---------------------------------</p>
<p>The message text is: \"" . $cr['txt'] . "\"</p>
<p>---------------------------------</p>
<p>Sent user: " . $cr['from_usr'] . "</p>
<p>---------------------------------</p>
<p>Rcvd user: " . $cr['user'] . "</p>
<p>---------------------------------</p>
<p>User that marked as abuse: " . $_SESSION['username'] . "</p>
<p>---------------------------------</p>
<p>THIS IS A AUTOMATED MESSAGE</p>
<p>---------------------------------</p>
<p>Litter Ltd</p>";
wordwrap($txt, 70);
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: donotreply@litter.com';
mail($emailaddress, 'Message reported as abuse', $txt, $headers);
echo '<title>Litter - Abuse system</title>';
include('header.htm');
echo '<p>We are sorry to hear about this, most users are here to have a good time but, as every chat site has a group who
abuse this site and it\'s people. Our administrator should review the message and delete the message or the offenders account if required</p>';
echo '<p><a href="index.php">Home</a></p>';
} else {
$q2 = "SELECT * FROM litter_data WHERE id=" . $_GET['id'];
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
$cr = mysqli_fetch_array($r2);
$q = "DELETE FROM litter_data WHERE id=" . $_GET['id'];
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<title>Litter - Abuse system</title>';
include('header.htm');
$txt = 'An abuse message has been deleted at: ' . date('d-m-y') . '
Message text: "' . $cr['txt'] . '"';
mail($emailaddress, 'Abusive message deleted', $txt, 'From: donotreply@litter.com');
echo '<p>Abusive message has been deleted</p>';
}
?>