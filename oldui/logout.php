<?php
setcookie('loggedin', 'n');
setcookie('username', 'NOT LOGGED IN');
header('Location: index.php');
?>