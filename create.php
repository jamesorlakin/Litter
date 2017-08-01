<?php
session_start();
if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Create message</title>';
include('header.htm');
$user = $_GET['user'];
$txt = $_GET['txt'];
echo '<p><a href="index.php">Home</a> | <a href="read.php?user=' . $user . '">Back</a> | Send a message to ' . $user . '</p>';
echo '<script src="tiny_mce/tiny_mce.js"></script><script type="text/javascript"> 
tinyMCE.init({ 
mode : "textareas", 
theme : "advanced",
plugins : "emotions",
theme_advanced_buttons4 : "fontsizeselect,emotions"
}); 
function dostatus() {
var ed = tinyMCE.get(\'txt\');
ed.setProgressState(1);
return true;
}
</script>';
echo "<form action=\"create2.php?user=$user\" method=\"post\" onsubmit=\"return dostatus();\">
<p>
<textarea name=\"txt\" rows=\"10\" cols=\"62\" style=\"width:100%\">$txt</textarea>
</p>
<p align=\"center\"><input type=submit value=\"Submit text\"></p>
<input type=hidden value=\"hi\" name=\"sub\">
</form>";
echo '<p align=center><iframe src="read3.php?user=' . $_GET['user'] . '" width="559" height="243"></iframe></p>';
} else {
header("Location: login.php?nl=yes");
}
?>