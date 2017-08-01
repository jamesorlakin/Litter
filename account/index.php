<?php
session_start();
if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Account management</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | Account management:</p>';
echo '<hr><p><a href="username.php">Change username</a></p>';
echo '<hr><p><a href="email.php">Change email address</a></p>';
echo '<hr><p><a href="password.php">Change password</a></p>';
} else {
header('Location: ../login.php?nl=yes');
}

?>