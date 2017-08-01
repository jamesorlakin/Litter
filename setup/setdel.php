<?php
session_start();
if ($_SESSION['install'] == 'y') {
unlink('../set.php');
require('index.php');
} else {
echo '<p>ATTEMPTED SECURITY BREACH!</p>';
}
?>