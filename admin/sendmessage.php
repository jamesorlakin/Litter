<?php
session_start();

if ($_SESSION['admin'] == 'y') {
if (isset($_GET['subject'])) {
$body = wordwrap($_GET['msg'], 70);
mail ($_GET['to'], $_GET['subject'], $body, 'From: ' . $_GET['from']);
echo '<p>Message sent!</p>';
echo '<p>To send another email, <a href="sendmessage.php">click here</a></p>';
} else {
echo '<form action="sendmessage.php">
<p>To: <input type="text" name="to"></p>
<p>Subject: <input type="text" name="subject"></p>
<p>From: <input type="text" name="from"></p>
<p>Body:</p>
<textarea name="msg" cols="50" rows="12"></textarea>
<p><input type="submit" value="Send mail"></p>
</form>';
}
} else {
header('Location: login.php');
}
?>