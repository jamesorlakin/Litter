<?php

session_start();

echo '<title>Litter - Register</title>';

include_once('header.htm');

echo '<p><a href="index.php">Home</a> | <a href="viewreg.php">View a video (OLD VIDEO)</a> | <a href="help/register.php">View better example</a> | Register for a Litter account:</p>';



if (isset($_POST['sub'])) { // Not to do with form validation, just checking if submitted!!!

$candoit = 'y';

$pss = $_POST['pss'];

$cpss = $_POST['cpss'];

require_once('set.php');

$pub = $_POST['pub'];

$np = $_POST['newposts'];

$fn = $_POST['fullname'];



if (empty($_POST['usr'])) {

echo '<p>Sorry, you did not enter your username</p>';

$candoit = 'n';

}



if ($_POST['agree'] == 'n') {

echo '<p>Sorry, please agree to the terms</p>';

$candoit = 'n';

}



if (!preg_match('/@/', $_POST['email'])) {

echo '<p>Sorry, you need to enter a valid email</p>';

$candoit = 'n';

}





if (empty($_POST['pss'])) {

echo '<p>Sorry, you did not enter your password</p>';

$candoit = 'n';

}



if (empty($_POST['cpss'])) {

echo '<p>Sorry, you did not repeat your password in the confirm box, please enter your password in the cofirm password box as well</p>';

$candoit = 'n';

}



if (empty($_POST['fullname'])) {

echo '<p>Sorry, Please enter your full name</p>';

$candoit = 'n';

}



if ($pss == $cpss) {

$hi = "HELLO WORLD!";

} else {

echo '<p>Sorry, your password did not match</p>';

$candoit = 'n';

}



if ($candoit == 'n') {

// Pass the time!

$db2 = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);

}



if ($candoit == 'y') {

// Pass the time again!!

$db = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);

}



if ($candoit == 'y') {

$usr = $_POST['usr'];

$em = $_POST['email'];

$q1 = "SELECT username FROM litter_usr WHERE username = '" . $usr . "'";

$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);

$r1 = mysqli_query($dbc , $q1);

if (mysqli_num_rows($r1) == 0) {

$q2 = "INSERT INTO litter_usr (username, password, email, public, autoemail, fullname, registerdate, activated) VALUES ('$usr', SHA1('$pss'), '$em', '$pub', '$np', '$fn', NOW(), 'n')";

$r2 = mysqli_query($dbc , $q2);

$q3 = "INSERT INTO litter_data (from_usr, txt, date, user) VALUES ('Litter', 'Welcome to litter. Give your friends the address you see above in the address bar so they can view your board, although your friends do need an account (unless you have set your messages to be visible to guests) to view and post stuff', NOW(), '$usr')";

$r3 = mysqli_query($dbc, $q3);

$q4 = "INSERT INTO litter_log (user, action, date) VALUES ('$usr', 'CREATED HIS ACCOUNT', NOW())";

$r4 = mysqli_query($dbc, $q4);

if ($_POST['login'] == 'y') {

$_SESSION['username'] = $usr;

$_SESSION['loggedin'] = 'y';

}

if ($np == 'y') {

$mailtxt = "Thank you for choosing Litter, this email has been sent to confirm that you have registered.

Your username is: $usr

Your password is: $pss

Auto email: Yes



Please keep this safe in-case you forget your details



-----------------------



$webaddress";

mail($em, 'Litter registration', $mailtxt,'From: donotreply@litter.com');

} else {

$mailtxt = "Thank you for choosing Litter, this email has been sent to confirm that you have registered.

Your username is: $usr

Your password is: $pss

Auto email: No



Please keep this safe in-case you forget your details



-----------------------



$webaddress";

mail($em, 'Litter registration', $mailtxt, 'From: accounts@' . $_SERVER['SERVER_NAME']);

}

echo '<script> window.location = "index.php?reg=true"; </script>';

} else {

echo '<p>Sorry, that username is already taken</p>';

}

}

} // End of isset for the whole form

include('reg.htm');

?>