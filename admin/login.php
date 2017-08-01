<?php
session_start();

if (isset($_POST['sub'])) {
require('set.php');
if ($_POST['usr'] == $user && $_POST['pss'] == $pass) {
$_SESSION['admin'] = 'y';
header('Location: index.php');
} else {
echo '<title>Litter - Admin</title>';
include('../header.htm');
echo '<p>ACCESS DENIED!</p>';
}
} else {
echo '<title>Litter - Admin</title>';
include('../header.htm');
echo '<form action="login.php" method=post >
<p>Username: <input type="text" name="usr" ></p>
<p>Password: <input type="password" name="pss"></p>
<input type="hidden" name="sub" value="true"><input type="submit" value="Login to admin">
</form>';
}
?>