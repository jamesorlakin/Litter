<?php
session_start();
if(!file_exists('set.php')) {
echo '<p align="center">NO SETUP FILE, PLEASE USE INSTALLER <a href="setup/index.php">HERE</a></p>';
} else { 
if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Chat site - Homepage</title>';
include('header.htm');
if ($_GET['reg'] == 'true') {
echo '<p>Welcome to litter!</p>';
}
$app = $_SESSION['app'];
echo '<font face="LcdD" size="5">Howdy! ' . $_SESSION['username'] . ', What would you like to do?</font>';
echo '<p><a href="logout.php" title="Logout"><img src="Key-icon.png" width=60 height=60></a><a href="read.php?user=' . $_SESSION['username'] . '" title="Read your messages"><img src="paper.jpg" width=60 height=60></a><a href="showusr.php" title="Show users"><img src="person.png" width=60 height=60></a><a href="http://litter.comuv.com/acadmin.php" title="Edit your account"><img src="pencil-icon.png" width=60 height=60></a><a href="delaccount.php" title="Delete your account"><img src="cross.jpg" width=60 height=60></a><a href="fav.php" title="View your favourites"><img src="star.png" width=60 height=60></a><a href="help.php" title="Help"><img src="help.jpg" height=60 width=60></a><a href="trashmessage.php" title="Delete all your messages"><img src="trash.png" width=60 height=60></a><a href="diary.php" title="View diary"><img src="book.gif" width=60 height=60></a><a href="games/index.php" title="Go to the Litter gaming service"><img src="game.png" width=60 height=60></a><a href="add.php"><img src="add.png" width=60 height=60></a><a href="messaging/index.php"><img src="mail.png" height=60 width=60></a><a href="web/index.php"><img src="globe.jpg" height=60 width=60></a></p>';
echo '<center><object data="data:application/x-silverlight-2," type="application/x-silverlight-2" style="width: 100%; height: 257px;">
		  <param name="source" value="app/widgets/welcome.xap"/>
		  <param name="onError" value="onSilverlightError" />
		  <param name="background" value="white" />
		  <param name="minRuntimeVersion" value="4.0.50826.0" />
		  <param name="autoUpgrade" value="true" />
		  <a href="http://go.microsoft.com/fwlink/?LinkID=149156&v=4.0.50826.0" style="text-decoration:none">
 			  <img src="http://go.microsoft.com/fwlink/?LinkId=161376" alt="Get Microsoft Silverlight" style="border-style:none"/>
		  </a>
	    </object></center><input type="hidden" id="username" value="' . $_SESSION['username'] . '">';
include('quickview.php');
} else {
$_SESSION['username'] = 'Guest (' . $_SERVER['HTTP_USER_AGENT'] . ') ( ' . $_SERVER['CLIENT_ADDR'] . ' )';
echo '<title>Litter - Chat site - Homepage</title>';
include('header.htm');
if ($_GET['reg'] == 'true') {
echo '<p>You have just signed up, Welcome to litter!</p>';
}
echo '<p>Welcome to litter, here people have "boards", people can read other peoples boards and post on them. We have so many features as well as messaging.</p><p>It\'s simple after a couple of clicks and you learn how to use it. Registering is free! You can get emailed when a friend posts on your board but it is optional</p>';
echo '<p class="homelink">Please <a href="login.php">login</a>, <a href="reg.php">register</a>, <a href="showusr.php">show litter users list</a> or <a href="web/showall.php">show public pages made by users</a>.</p>';
echo '<input type="hidden" id="notlog" value="yep"><object data="data:application/x-silverlight-2," type="application/x-silverlight-2" style="width: 100%; height: 67px;">
		  <param name="source" value="app/widgets/welcome.xap"/>
		  <param name="onError" value="onSilverlightError" />
		  <param name="background" value="white" />
		  <param name="minRuntimeVersion" value="4.0.50826.0" />
		  <param name="autoUpgrade" value="true" />
	    </object>';
}
}
?>
