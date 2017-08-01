<?php
echo '<title>Litter - RSS help</title>';
include('../../../header.htm');
echo '<p><a href="../../../index.php">Home</a> | Litter RSS help:</p>';

if ($_GET['problem'] == 'notvisible') {
echo '<p>You have recevied the message "This user is not marked as visible to guests"</p>';
echo '<p>The reason this message was made is because the user you are attemping to view through RSS has set their messages not to be public</p>';
echo '<p>If you are trying to view your own account, you need to follow these steps:</p>';
echo '<p>1. Login to Litter through the litter homepage</p>';
echo '<p>2. Click the pencil and paper icon when you are loggedin</p>';
echo '<p>3. In the box labeled "Allow guests to read your messages?" select "yes"</p>';
echo '<p>4. Click update your settings!</p>';
} elseif ($_GET['problem'] == 'notexist') {
echo '<p>You have recieved this message because this user does not exist</p>';
echo '<p>1. Check spellings</p>';
echo '<p>2. Check if the user actually has an account</p>';
} else {
echo '<p>No problem detected!</p>';
}
?>