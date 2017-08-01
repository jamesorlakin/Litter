<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Messaging - Read message</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | <a href="index.php">Inbox</a> | Read message:</p>';
if (!isset($_GET['id'])) {
echo '<p>No message selected!</p>';
} else {
require('../set.php');
$q = "SELECT * FROM litter_messaging WHERE id='" . $_GET['id'] . "'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$cr = mysqli_fetch_array($r);
$q2 = "UPDATE litter_messaging SET readmsg='y' WHERE id=" . $cr['id'];
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
if (strtolower($cr['user']) == strtolower($_SESSION['username'])) {
echo '<div class="field">From: ' . $cr['from_usr'] . '</div>';
$tmptext = preg_replace('/:smile/', '<img src="/smiles/smile.png" width=15 height=15>', $cr['txt']);
$tmptext2 = preg_replace('/:spit/', '<img src="/smiles/smilespit.gif" width=15 height=15>', $tmptext);
$tmptext3 = preg_replace('/:sad/', '<img src="/smiles/sadsmile.jpg" width=15 height=15>', $tmptext2);
$tmptext4 = preg_replace('/:evil/', '<img src="/smiles/evil.png" width=15 height=15>', $tmptext3);
$tmptext5 = preg_replace('/:angry/', '<img src="/smiles/angry.png" width=15 height=15>', $tmptext4);
$tmptext6 = preg_replace('/:cash/', '<img src="/smiles/cash.png" width=15 height=15>', $tmptext5);
$tmptext7 = preg_replace('/:quote/', '<div class="quote">', $tmptext6);
$tmptext8 = preg_replace('/:equote/', '</div>', $tmptext7);
$txt = $tmptext8;
echo '<div class="field">Subject: ' . $cr['subject'] . '</div>';
echo '<div class="field">Sent date: ' . $cr['date'] . '</div>';
echo '<p>Message:</p>';
echo '<div class="messagebox">' . $txt . '</div>';
$cr['txt2'] = stripslashes($cr['txt']);
echo '<p><A href="delmsg.php?id=' . $cr['id'] . '">Delete</a> | <a href="compose.php?reply=' . urlencode(":quote" . stripslashes($cr['txt2']) . ":equote\n\n") . '&subject=' . urlencode("RE: " . $cr['subject']) . '&to=' . urlencode($cr['from_usr']) . '">Reply</a></p>';
} else {
echo '<p>This message is not yours so you cannot read it!</p>';
}
}
} else {
header('Location: ../login.php?nl=yes');
} 
?>