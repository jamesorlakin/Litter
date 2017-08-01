<?php
session_start();
require('set.php');
?>
<title>Litter - Widgets</title>
<?php
include('header.htm');
?>
<p><a href="index.php">Home</a> | Widgets:</p>
<img src="igoogle.gif" />
<p>This widget views your messages on your home page. You only need to login once and your address is logged with the username and you will be logged in automatically for the igoogle widget (it will not login to the main litter site).</p>
<p><a href="http://fusion.google.com/add?source=atgs&amp;moduleurl=<?php echo $webaddress; ?>/app/google/gadget.xml">Add now to igoogle</a></p>
<script type='text/javascript' src='http://litter.comuv.com/video/swfobject.js'></script> 
<div id='mediaspace'></div> 
<?php
if ($_SESSION['loggedin'] == 'y') {
echo '<hr>
<img src="rss-icon.jpg" width=85 height=60 />
<p>This is for people who want their message list converted into a RSS feed.</p>
<p>For this to work you need to have your messages visible to guests.</p>
<p><a href="http://litter.comuv.com/app/rss/feed.php?user=' . $_SESSION['username'] . '">Access your rss feed</a></p>';
echo "<div id='mediaspacerss'></div>";}
?>