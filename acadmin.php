<?php
session_start();
require('set.php');
if ($_SESSION['loggedin'] == 'y') {
if (isset($_POST['sub'])) {
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$q7 = "SELECT * FROM litter_usr WHERE username='" . $_POST['usr'] . "'";
$r7 = mysqli_query($dbc, $q7);
$doneusr = 'n';
if (mysqli_num_rows($r7) == 0) {
$q2 = "UPDATE litter_usr SET username='" . $_POST['usr'] . "' WHERE username='" . $_SESSION['username'] . "'";
$r2 = mysqli_query($dbc, $q2);
$q6 = "UPDATE litter_data SET user='" . $_POST['usr'] . "' WHERE user='" . $_SESSION['username'] . "'";
$r6 = mysqli_query($dbc, $q6);
$_SESSION['username'] = $_POST['usr']; 
$cu = $_SESSION['username'];
} else {
$cu = $_SESSION['username'];
$doneusr = 'y';
}
$q3 = "UPDATE litter_usr SET email='" . $_POST['email'] . "' WHERE username='" . $_POST['usr'] . "'";
$r3 = mysqli_query($dbc, $q3);
$q4 = "UPDATE litter_usr SET public='" . $_POST['public'] . "' WHERE username='" . $_POST['usr'] . "'";
$r4 = mysqli_query($dbc, $q4);
$q5 = "UPDATE litter_usr SET autoemail='" . $_POST['newposts'] . "' WHERE username='" . $_POST['usr'] . "'";
$r5 = mysqli_query($dbc, $q5);
$email = $_POST['email'];
echo '<title>Litter - Account administration</title>';
include('header.htm');
echo "<p>" . $cu . "'s account administration portal | <a href=\"http://litter.comuv.com\">Go home</a></p>";
echo "<p>Your account has been updated!</p>";
if ($doneusr == 'y') {
echo "<p>But the username you wanted was already taken</p>";
}
echo "<form action=\"acadmin.php\" method=post>
Your username:&nbsp;
<input type=text name=\"usr\" value=\"$cu\"><p>Your email:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <input type=text value=\"$email\" name=\"email\">
</p>
<fieldset>
<legend>ALLOW GUESTS TO READ YOUR MESSAGES?</legend>
<select name=\"public\">
<option value=\"n\">No</option>
<option value=\"y\">Yes</option>
</select>
</fieldset>
<fieldset>
<legend>EMAIL WHEN YOU GET NEW POSTS?</legend>
<select name=\"newposts\">
<option value=\"n\">No</option>
<option value=\"y\">Yes</option>
</select>
</fieldset>
<input type=submit value=\"Update your settings!\">
<input type=button value=\"Back to the homepage\" onclick=\"gotohome()\">
<input type=hidden value=\"true\" name=\"sub\">
</form>";
} else {
echo '<title>Litter - Account administration</title>';
include('header.htm');
$cu = $_SESSION['username'];
$q = "SELECT * FROM litter_usr WHERE username='$cu'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$cr = mysqli_fetch_array($r);
$email = $cr['email'];
echo "<p>" . $cu . "'s account administration portal | <a href=\"index.php\">Go home</a></p>";
echo "<form action=\"acadmin.php\" method=post>
Your username:&nbsp;
<input type=text name=\"usr\" value=\"$cu\"><p>Your email:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <input type=text value=\"$email\" name=\"email\">
</p>
<fieldset>
<legend>ALLOW GUESTS TO READ YOUR MESSAGES?</legend>
<select name=\"public\">
<option value=\"n\">No</option>
<option value=\"y\">Yes</option>
</select>
</fieldset>
<fieldset>
<legend>EMAIL WHEN YOU GET NEW POSTS?</legend>
<select name=\"newposts\">
<option value=\"n\">No</option>
<option value=\"y\">Yes</option>
</select>
</fieldset>
<input type=submit value=\"Update your settings!\">
<input type=hidden value=\"true\" name=\"sub\">
</form>";
}
} else {
header('Location: login.php');
}
?>
