<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Play a game</title>';
include('../header.htm');
require('../set.php');
if ($_GET['gane'] == 'snow') {
$act = 'played on Snowball Warrior';
} elseif ($_GET['game'] == 'drivedodge') {
$act = 'played on Drive & Dodge';
} elseif ($_GET['game'] == 'love') {
$act = 'played on Love Tester';
} elseif ($_GET['game'] == 'sexy') {
$act = 'played on Sexy Slots';
} elseif ($_GET['game'] == 'incredi') {
$act = 'played on Incredi Bots';
} elseif ($_GET['game'] == 'golf') {
$act = 'played on Flop Shot Golf';
} elseif ($_GET['game'] == 'monkey') {
$act = 'played on Monkey King';
} elseif ($_GET['game'] == 'oil') {
$act = 'played on Oiligarchy';
} elseif ($_GET['game'] == 'loco') {
$act = 'played on LocoChew';
} elseif ($_GET['game'] == 'jump') {
$act = 'played on Monkey Jump';
} elseif ($_GET['game'] == 'peng') {
$act = 'played on Penguinz 2';
} elseif ($_GET['game'] == 'warfare1917') {
$act = 'played on Warfare 1917';
}
$q = "INSERT INTO litter_events (user,action,date) VALUES ('" . $_SESSION['username'] . "', '$act', NOW())";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);

if ($_GET['game'] == 'snow') {
echo '<p><a href="../index.php">Home</a> | Play Snowball warrior</p>';
echo '<p align=center><object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="714" height="435" VIEWASTEXT>
	<param name="movie" value="snowballwarrior.swf">
	<param name="quality" value="High">
	<embed src="snowballwarrior.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="160" height="160"></object></p>';
} elseif ($_GET['game'] == 'drivedodge') {
echo '<p><a href="../index.php">Home</a> | Play Drive and dodge</p>';
echo '<p align=center><object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="714" height="435" VIEWASTEXT>
	<param name="movie" value="drivedodge.swf">
	<param name="quality" value="High">
	<embed src="drivedodge.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="160" height="160"></object></p>';
} elseif ($_GET['game'] == 'love') {
echo '<p><a href="../index.php">Home</a> | Play Love tester</p>';
echo '<p align=center><object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="714" height="435" VIEWASTEXT>
	<param name="movie" value="lovetester.swf">
	<param name="quality" value="High">
	<embed src="lovetester.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="160" height="160"></object></p>';
} elseif ($_GET['game'] == 'sexy') {
echo '<p><a href="../index.php">Home</a> | Play Sexy slots</p>';
echo '<p align=center><object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="714" height="435" VIEWASTEXT>
	<param name="movie" value="sexyslots.swf">
	<param name="quality" value="High">
	<embed src="sexyslots.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="160" height="160"></object></p>';
} elseif ($_GET['game'] == 'incredi') {
echo '<p><a href="../index.php">Home</a> | Play Incredibots 2</p>';
echo '<p align=center><object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="714" height="435" VIEWASTEXT>
	<param name="movie" value="incredibots2.swf">
	<param name="quality" value="High">
	<embed src="incredibots2.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="160" height="160"></object></p><iframe src="incredi/index.php"/>Please report bugs to the "Litter" board.';
} elseif ($_GET['game'] == 'golf') {
echo '<p><a href="../index.php">Home</a> | Play Golf</p>';
echo '<p align=center><object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="714" height="435" VIEWASTEXT>
	<param name="movie" value="golf.swf">
	<param name="quality" value="High">
	<embed src="golf.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="160" height="160"></object></p>';
} elseif ($_GET['game'] == 'monkey') {
echo '<p><a href="../index.php">Home</a> | Play Monkey King</p>';
echo '<p align=center><object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="714" height="435" VIEWASTEXT>
	<param name="movie" value="monkeyking.swf">
	<param name="quality" value="High">
	<embed src="monkeyking.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="160" height="160"></object></p>';
} elseif ($_GET['game'] == 'oil') {
echo '<p><a href="../index.php">Home</a> | Play Oil Game</p>';
echo '<p align=center><object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="714" height="435" VIEWASTEXT>
	<param name="movie" value="oiligarchy.swf">
	<param name="quality" value="High">
	<embed src="oiligarchy.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="160" height="160"></object></p>';
} elseif ($_GET['game'] == 'loco') {
echo '<p><a href="../index.php">Home</a> | Play LocoChew</p>';
echo '<p align=center><object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="714" height="435" VIEWASTEXT>
	<param name="movie" value="locochew.swf">
	<param name="quality" value="High">
	<embed src="locochew.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="160" height="160"></object></p>';
} elseif ($_GET['game'] == 'jump') {
echo '<p><a href="../index.php">Home</a> | Play Monkey jump</p>';
echo '<p align=center><object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="714" height="435" VIEWASTEXT>
	<param name="movie" value="monkeyjump.swf">
	<param name="quality" value="High">
	<embed src="monkeyjump.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="160" height="160"></object></p>';
} elseif ($_GET['game'] == 'peng') {
echo '<p><a href="../index.php">Home</a> | Play Penguinz 2:</p>';
echo '<p align=center><object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="714" height="435" VIEWASTEXT>
	<param name="movie" value="pen.swf">
	<param name="quality" value="High">
	<embed src="pen.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="160" height="160"></object></p>';
} elseif ($_GET['game'] == 'warfare1917') {
echo '<p><a href="../index.php">Home</a> | Play Warfare 1917:</p>';
echo '<p align=center><object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="714" height="435" VIEWASTEXT>
	<param name="movie" value="warfare1917.swf">
	<param name="quality" value="High">
	<embed src="warfare1917.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="160" height="160"></object></p>';
}
} else {
header('Location: ../login.php?nl=yes');
}
?>
