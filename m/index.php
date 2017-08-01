<?php

if (isset($_GET['question'])) {
if ($_GET['question'] == 'yes') {
header('Location: other/index.php');
}
} else {
echo '<p align=center><img src="../head.png" width=100 height=45></p>';
echo '<p>Litter does not charge for this service but your network provider might, this can become costly if on Pay as you go mobiles, do you want to continue?</p>';
echo '<form action="index.php">
<input type="hidden" name="question" value="yes">
<input type="submit" value="Yes">
</form>';
}

?>