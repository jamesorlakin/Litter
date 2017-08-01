<?php
session_start();
echo '<pre>';
echo '<p>SESSION ID: ' . $_COOKIE['PHPSESSID'] . '</p><p>' . $_SERVER['HTTP_USER_AGENT'] . '</p>';
print_r ($_SESSION);
echo '</pre>';
?>