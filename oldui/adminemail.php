<?php
include('header.htm');

if (isset($_POST['sub'])) {
$txt = $_POST['txt'];
$em2 = $_POST['emailadr'];
mail($em2, 'Litter', $txt, 'From: donotreply@litter.com');
echo "Message sent!";
}

require('set.php');
echo "<p align=\"center\">SEND EMAIL TO A USER</p>";
$q = "SELECT * FROM litter_usr";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
echo "<form action=\"adminemail.php\" method=post>
<p align=\"center\"><select name=\"emailadr\"></p>";
while ($cr = mysqli_fetch_array($r)) {
$em = $cr['email'];
echo "<option value=\"$em\">$em</option>";
}
include('endemail.htm');
?>