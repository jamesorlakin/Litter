<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Gaming service</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | Litter gaming service:</p>';
echo '<hr>';
echo '<p>Snowball warrior | <a href="play.php?game=snow">Play</a></p>';
echo '<hr>';
echo '<p>Drive and dodge | <a href="play.php?game=drivedodge">Play</a></p>';
echo '<hr>';
echo '<p>Love tester | <a href="play.php?game=love">Play</a></p>';
echo '<hr>';
echo '<p>Sexy slots | <a href="play.php?game=sexy">Play</a></p>';
echo '<hr>';
echo '<p>Incredibots (Wait a long time for loading) | <a href="play.php?game=incredi">Play</a></p>';
echo '<hr>';
echo '<p>Flop Shot MiniGolf | <a href="play.php?game=golf">Play</a></p>';
echo '<hr>';
echo '<p>Monkey king | <a href="play.php?game=monkey">Play</a></p>';
echo '<hr>';
echo '<p>Oiligarchy | <a href="play.php?game=oil">Play</a></p>';
echo '<hr>';
echo '<p>LocoChew | <a href="play.php?game=loco">Play</a></p>';
echo '<hr>';
echo '<p>Monkey jump | <a href="play.php?game=jump">Play</a></p>';
// echo '<hr>';
// echo '<p>Penguinz 2 | <a href="play.php?game=peng">Play</a></p>';
echo '<hr>';
echo '<p>Warfare 1917 | <a href="play.php?game=warfare1917">Play</a></p>';
} else {
header('Location: ../login.php?nl=yes');
}
?>