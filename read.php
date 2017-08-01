<?php

session_start();

if ($_SESSION['loggedin'] == 'y') {

if (isset($_GET['user'])) {

$q = "SELECT DATE_FORMAT(date, \"%a, %d - %m - %y | %h:%i %p - %s seconds\") AS thedate, txt, spam, user, spam_by, from_usr, id FROM litter_data WHERE user = '" . $_GET['user'] . "' ORDER BY date DESC";

require('set.php');

$dbc = mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db); 

$r = mysqli_query($dbc, $q);

echo '<title>Litter - Read ' . $_GET['user'] . '\'s messages</title>';

include('header.htm');

echo '<link rel="alternate" type="application/rss+xml" title="Live feed of ' . $_GET['user'] . '\'s messages" href="' . $webaddress . '/app/rss/feed.php?user=' . $_GET['user'] . '" />';

$num = mysqli_num_rows($r);

if ($num == 1) {

$messagetype = "message";

} else {

$messagetype = "messages";

}

if ($_SESSION['app'] != 'yes') {

echo '<div id="menu">

<p>' . $_GET['user'] . '\'s messages</p>

<script>

// Litter Ltd code

var idofthemenu;

idofthemenu = window.document.getElementById("menu");

var morelink;

morelink = window.document.createElement("a");

morelink.setAttribute("href", "javascript: domore()");

var morelinktxt

morelinktxt = window.document.createTextNode("More opts");

morelink.appendChild(morelinktxt);

idofthemenu.appendChild(morelink);



function makespacer() {

var spacer;

spacer = window.document.createElement("p");

idofthemenu.appendChild(spacer);

}



function domore() {

idofthemenu.removeChild(morelink);

makespacer();

var amount;

amount = window.document.createElement("p");

var amounttxt

amounttxt = window.document.createTextNode("' . $num . ' ' . $messagetype . ' on this board");

amount.appendChild(amounttxt);

idofthemenu.appendChild(amount);



makespacer();

var addfav;

addfav = window.document.createElement("a");

addfav.setAttribute("href", "addfav.php?user=' . $_GET['user'] . '");

var addfavtxt

addfavtxt = window.document.createTextNode("Add as favourite in your list");

addfav.appendChild(addfavtxt);

idofthemenu.appendChild(addfav);



makespacer();

var addweb;

addweb = window.document.createElement("a");

addweb.setAttribute("href", "app/rss/makewebsite.php?user=' . $_GET['user'] . '");

var addwebtxt

addwebtxt = window.document.createTextNode("Add this board to your website");

addweb.appendChild(addwebtxt);

idofthemenu.appendChild(addweb);



makespacer();

var rssfeed;

rssfeed = window.document.createElement("a");

rssfeed.setAttribute("href", "app/rss/feed.php?user=' . $_GET['user'] . '");

var rssfeedtxt

rssfeedtxt = window.document.createTextNode("View rss feed");

rssfeed.appendChild(rssfeedtxt);

idofthemenu.appendChild(rssfeed);



}
</script>

</div>';

} else {

echo '<p>' . $_GET['user'] . '\'s litter messages | <a href="addfav.php?user=' . $_GET['user'] . '">Add this user as favourite</a></p>';

}

if ($num != 0) {

echo '<p align=left><a href="index.php"><img src="home_icon.gif" height=60 width=60></a><a href="create.php?user=' . $_GET['user'] . '"><img src="pencil-icon.png" height=60 width=60></a></p>';

} else {

echo '<p align=left><a href="index.php"><img src="home_icon.gif" height=60 width=60></a></p>';

}

echo '<hr>';

if (mysqli_num_rows($r) == 0) {

echo '<p>This user is invalid</p>';

} else {

while ($cr = mysqli_fetch_array($r)) {

$usr = $cr['from_usr'];

$tmptext = preg_replace('/:smile/', '<img src="/smiles/smile.png" width=15 height=15>', $cr['txt']);

$tmptext2 = preg_replace('/:spit/', '<img src="/smiles/smilespit.gif" width=15 height=15>', $tmptext);

$tmptext3 = preg_replace('/:sad/', '<img src="/smiles/sadsmile.jpg" width=15 height=15>', $tmptext2);

$tmptext4 = preg_replace('/:evil/', '<img src="/smiles/evil.png" width=15 height=15>', $tmptext3);

$tmptext5 = preg_replace('/:angry/', '<img src="/smiles/angry.png" width=15 height=15>', $tmptext4);

$tmptext6 = preg_replace('/:cash/', '<img src="/smiles/cash.png" width=15 height=15>', $tmptext5);

$realtext = $tmptext6;

$idofmsg = $cr['id'];


if ($usr == $_SESSION['username']) {
echo "<p><a name=\"$idofmsg\">Posted by: </a><i>$usr</i> | <a href=\"create.php?user=$usr\">Write a message on this users wall</a></p>";
} else {
echo "<p><a name=\"$idofmsg\">Posted by: </a><a href=\"read.php?user=$usr\" name=\"" . $cr['id'] . "\"><i>$usr</i></a> | <a href=\"create.php?user=$usr\">Write a message on this users wall</a></p>";
}
if ($cr['spam'] == 'y') {

echo '<p><i>This post has been marked as spam by ' . $cr['spam_by'] . '</i> | <a href="readspam.php?id=' . $cr['id'] . '">Read this spamed message</a> | <a href="unsetspam.php?id=' . $cr['id'] . '&user=' . $_GET['user'] . '">Unmark as spam</a></p>';

echo '<hr>';

} else {

echo $realtext;
echo '<p>' . $cr['thedate'] . '</p>';

if (strtolower($_SESSION['username']) !== strtolower($_GET['user'])) {

echo "<p><input type=button value='Report as abuse message' onclick='window.location = \"" . $webaddress . "/abuse.php?id=" . $cr['id'] . "\"'> | <input type=button value='Set as a spamed message' onclick='window.location = \"" . $webaddress . "/setspam.php?id=" . $cr['id'] . "&user=" . $cr['user'] . "\"'></p>";

} else {

if ($messagetype == 'messages') {

echo "<p><input type=button value='Report as abuse message' onclick='window.location = \"" . $webaddress . "/abuse.php?id=" . $cr['id'] . "\"'> | <input type=button value='Set as a spamed message' onclick='window.location = \"" . $webaddress . "/setspam.php?id=" . $cr['id'] . "&user=" . $cr['user'] . "\"'> | <input type=button value='Remove message' onclick='window.location = \"" . $webaddress . "/delmessage.php?id=" . $cr['id'] . "\"'></p>";

} else {

echo "<p><input type=button value='Report as abuse message' onclick='window.location = \"" . $webaddress . "/abuse.php?id=" . $cr['id'] . "\"'> | <input type=button value='Set as a spamed message' onclick='window.location = \"" . $webaddress . "/setspam.php?id=" . $cr['id'] . "&user=" . $cr['user'] . "\"'> | <input type=button value='Remove message (disabled)' onclick='alert(\"This is the only message you have! You cannot delete a message if there is only 1 message on a board!\")'></p>";

}

}

echo '<hr>';

}

} // End of while

echo '<font size="0.5">Powered by <a href="http://litter.comuv.com">Litter</a> | <a href="#top" >Go to top of page</a></font>';

} // End of check for invalid user

} else { // Else for get check

include('header.htm');

echo '<p>No user has been selected</p>';

} // End of else for get check

} else {

header('Location: login.php?nl=yes');

}

?>	