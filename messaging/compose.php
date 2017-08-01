<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
require('../set.php');
echo '<title>Litter - Messaging - Make message</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | <a href="index.php">Inbox</a> | Make a message:</p>';
include('form.php');
} else {
header('Location: ../login.php?nl=yes');
}

?>