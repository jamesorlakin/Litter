<?php
if ($_COOKIE['loggedin'] == 'y') {
include('header.htm');
$user = $_GET['user'];
$txt = $_GET['txt'];
echo '<p align="center">Send a message to ' . $user . '</p>';
echo "<form action=\"create2.php?user=$user\" method=post>
<p align=\"center\">
<textarea name=\"txt\" rows=\"18\" cols=\"62\">$txt</textarea>
</p>
<p align=\"center\">&nbsp;</p>
<p align=center><input type=submit value=\"Submit text\"></p>
<input type=hidden value=\"hi\" name=\"sub\">
</form>";
echo '<p align=center><iframe src="read3.php?user=' . $_GET['user'] . '" width="559" height="243"></iframe></p>';
} else {
header("Location: login.php");
}
?>