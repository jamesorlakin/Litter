<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Account management</title>';
include('../header.htm');
echo '<p><a href="index.php">Back to management</a> | Change username:</p>';
echo '<p>Current username: "' . $_SESSION['username'] . '"</p>';
echo '<form action="username2.php">';
echo '<p>New username: <input name="usr"></p>';
echo '<input type="submit" value="Change username"></form>';
} else {
header('Location: ../login.php?nl=yes');
}

?>