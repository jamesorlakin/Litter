<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Report bug</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | Report bug:</p>';
echo '<p><img src="bug.png"></p>';
echo '<p>Bugs can be a real problem with some things, if you have found that Litter is being a bit naughty then please report it to us.</p>';
echo '<p>When you report the bug we will try to get Litter back into shape as soon as possible.</p>';
echo '<p>Please help us make Litter more reliable by reporting to us and keeping the Litter community happy!</p>';
echo '<p><a href="report.php">Report bug</a></p>';
} else {
header('Location: ../login.php?nl=yes');
}
?>