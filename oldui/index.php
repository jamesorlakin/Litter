<?php
if ($_COOKIE['loggedin'] == 'y') {
include('header.htm');
echo '<p align="center">You are using the old UI, <a href="../index.php">click to go to the normal version</a> of the UI</p>';
echo '<font face="LcdD" size="5">Howdy! ' . $_COOKIE['username'] . ' | <a href="logout.php">Logout</a> | <a href="read.php?user=' . $_COOKIE['username'] . '">Look at your messages</a> | <a href="showusr.php">List litter users</a></font>';
// echo '<p><font face="LcdD" size="5"><a href="/kitter">Visit kitter</a> and vote for a kitten</font></p>';
//echo '<p><font face="LcdD" size="5"><a href="acadmin.php">Edit your account</a> | <a href="delaccount.php">Delete your account</a></font></p>';
} else {
include('header.htm');
echo '<p align="center">You are using the old UI, <a href="../index.php">click to go to the normal version</a> of the UI</p>';
echo '<p align="left">
<font face="LcdD" size="5">REGISTERED MEMBER? <a href="login.php">SIGN IN</a> | NOT REGISTERED YET? <a href="reg.php">SIGN UP</a> | <a href="showusr.php">Show litter users</a></font></p>
<p align="center">&nbsp;</p>';
}
?>
