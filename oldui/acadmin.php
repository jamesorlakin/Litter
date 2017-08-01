<?php
require('set.php');
if ($_COOKIE['loggedin'] == 'y') {
if (isset($_POST['sub'])) {
$q2 = "UPDATE litter_usr SET username='" . $_POST['usr'] . "' WHERE username='" . $_COOKIE['username'] . "'";
$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$r2 = mysqli_query($dbc, $q2);
$q3 = "UPDATE litter_usr SET email='" . $_POST['email'] . "' WHERE username='" . $_POST['usr'] . "'";
$r3 = mysqli_query($dbc, $q3);
$q4 = "UPDATE litter_usr SET public='" . $_POST['public'] . "' WHERE username='" . $_POST['usr'] . "'";
$r4 = mysqli_query($dbc, $q4);
$q5 = "UPDATE litter_usr SET autoemail='" . $_POST['newposts'] . "' WHERE username='" . $_POST['usr'] . "'";
$r5 = mysqli_query($dbc, $q5);
$q6 = "UPDATE litter_data SET user='" . $_POST['usr'] . "' WHERE user='" . $_COOKIE['username'] . "'";
$r6 = mysqli_query($dbc, $q6);
setcookie('username', $_POST['usr']);
$email = $_POST['email'];
$cu = $_POST['usr'];
include('header.htm');
echo "<p>" . $cu . "'s account administration portal | <a href=\"index.php\">Go home</a></p>";
echo "<p>Your account has been updated!</p>";
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
include('header.htm');
$cu = $_COOKIE['username'];
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
