<?php
session_start();

if (!isset($_POST['sub'])) {
echo '<p><a href="index.php">Back</a> | Make new bot</p>';
echo '<form action="make.php" method="post">
<p>Name of bot: <input type="text" name="botname"></p>
<p>Export text:</p>
<textarea name="txt"></textarea>
<br /><input type="hidden" name="sub" value="yes"><input type="submit" value="Save robot">
</form>';
} else {
require('../../set.php');
$q = "INSERT INTO litter_robots (botname, user, botdetails) VALUES ('" . $_POST['botname'] . "', '" . $_SESSION['username'] . "', '" . $_POST['txt'] . "')";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo '<p>SAVED! <a href="index.php">Back to list</a></p>';
}

?>