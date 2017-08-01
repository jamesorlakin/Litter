<title>Litter - Login</title>
<?php
if (isset($_GET['app'])) {
echo '<form action="login.php?app=yes" method=post>';
} else {
echo '<form action="login.php" method=post>';
}
?>
<p><a href="index.php">Home</a> | Login:</p>
Username:
<input type=text name="usr" value="<?php echo $_GET['selusr']; ?>">
<p>Password:
<input type=password name = "pss">
</p>
<p>
<input type=submit value="Login">
<input type=hidden value="TRUE" name = "sub">
</p>
</form>