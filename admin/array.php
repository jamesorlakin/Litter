<?php
session_start();

$_SESSION['arr'] = array('hi' => 'hello', 'bye' => 'goodbye');
print_r($_SESSION);

?>