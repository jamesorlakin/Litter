<?php
echo '<title>Litter - Put on your website</title>';
require('../../header.htm');
require('../../set.php');
echo '<p><a href="../../index.php">Home</a> | Put a board on your website:</p>';
echo '<p>To add this user\'s board to your website, please put the code below into your webpage:</p>';
echo '<p>This is in a container viewing a page on our site</p>';
echo '<table>';
echo "<textarea rows=\"8\" cols=\"25\"><iframe src=\"" . $webaddress . "/app/rss/remoteboard.php?user=" . $_GET['user'] . "\" height=\"320\" width=\"225\" /></textarea>";
echo '<p></p>';
echo "<iframe src=\"" . $webaddress . "/app/rss/remoteboard.php?user=" . $_GET['user'] . "\" height=\"275\" width=\"225\" />";
?>