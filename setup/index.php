<?php

session_start();

echo '<title>Litter - Setup</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | Litter setup:</p>';

if (file_exists("../set.php")) {

echo '<p>SETUP IS ALREADY COMPLETE!</p>';

} else {
echo '<p>Server details:</p>';
echo '<hr />';
echo '<p>Server software: ' . $_SERVER['SERVER_SOFTWARE'] . '</p>';
echo '<p>Server ip address: ' . $_SERVER['SERVER_ADDR'] . '</p>';
echo '<p>Server http host: ' . $_SERVER['HTTP_HOST'] . '</p>';
echo '<p>HTTP REFERER: ' . $_SERVER['HTTP_REFERER'] . '</p>';
echo '<p>Server admin: ' . $_SERVER['SERVER_ADMIN'] . '</p>';
echo '<hr />';
echo '<form action="setup.php">

<p>ALL FIELDS ARE REQUIRED!</p>

<p>Mysql host: <input type="text" name="msqlhost"></p>

<p>Mysql username: <input type="text" name="msqlusr"></p>

<p>Mysql password: <input type="password" name="msqlpss"></p>

<p>Mysql database: <input type="text" name="msqldb"></p>

<hr />

<p>Admin e-mail address: <input type="text" name="adminemail"></p>

<p>Website address: (without trailing slash)<input type="text" name="webaddr" value="' . $_SERVER['HTTP_HOST'] . '"></p>

<hr>

<p>Admin username: <input type="text" name="adminusr"></p>

<p>Admin password: <input type="password" name="adminpss"></p>

<hr>

<input type="submit" value="Make this install work!">

</form>';

}



?>