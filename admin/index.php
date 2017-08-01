<?php
session_start(); 

if ($_SESSION['admin'] == 'y') {
echo '<title>Litter - Admin</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a></p>';
echo '<p>Run sql query:</p>';
echo '<style>div {background-color: lightblue;}</style>';
if ($_GET['query'] == 'yes') {
echo '<div><p>Query completed without errors!</p></div>';
} elseif ($_GET['query'] == 'no') {
echo '<div><p>There was a problem running query!</p><p>SQL SAID:</p><p>' . $_GET['err'] . '</p></div>';
}
echo '<form action="runsql.php" method="get">
<select name="sql">
<option value="litter_usr">SELECT * FROM litter_usr</option>
<option value="litter_data">SELECT * FROM litter_data</option>
<option value="litter_fav">SELECT * FROM litter_fav</option>
<option value="litter_ip">SELECT * FROM litter_ip</option>
<option value="litter_diary">SELECT * FROM litter_diary</option>
<option value="litter_log">SELECT * FROM litter_log</option>
<option value="litter_messaging">SELECT * FROM litter_messaging</option>
<option value="other">Other query</option>
</select>
<p>Other query: <input type="text" name="othersql"></p>
<input type="submit" value="Run">
</form>
<script>
 if (navigator.appName.indexOf("Microsoft")!=-1) {
  winW = document.body.offsetWidth-35;
  winH = document.body.offsetHeight+35;
 } else {
  winW = window.innerWidth-35;
  winH = window.innerHeight+35;
 }
window.document.write(\'<iframe src="session.php" frameborder="0" width=\' + winW + \'height=400 />\');
window.document.write(\'<p></p>\');
window.document.write(\'<iframe src="sendmessage.php" frameborder="0" width=\' + winW + \'height=400 />\');
</script>';
} else {
header('Location: login.php');
}
?>