<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {

} else {
header('Location: login.php?nl=yes');
}
?>