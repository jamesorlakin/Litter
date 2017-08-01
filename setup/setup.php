<?php
session_start();
if (file_exists('../set.php')) {
echo '<P>ERROR - ALREADY SETUP!</P>';
} else {
$setfile = "../set.php";
$_SESSION['install'] = 'y';
include('../header.htm');
echo '<p><a href="../index.php">HOME</a> | <a href="setdel.php">Restart install</a> | Setup:</p>';
$handle = fopen($setfile, 'w');
fwrite($handle, "<?php\n");
fwrite($handle, '$msql_host="' . $_GET['msqlhost'] . '";');
fwrite($handle, '$msql_db="' . $_GET['msqldb'] . '";');
fwrite($handle, '$msql_usr="' . $_GET['msqlusr'] . '";');
fwrite($handle, '$msql_pss="' . $_GET['msqlpss'] . '";');
fwrite($handle, '$emailaddress="' . $_GET['adminemail'] . '";');
fwrite($handle, '$webaddress="' . $_GET['webaddr'] . '";');
fwrite($handle, 'require(\'func.php\');');
fwrite($handle, '?>');
fclose($handle);
echo '<p>Written main \'set.php\' file</p>';
$setadminfile = fopen('../admin/set.php', 'w');
fwrite($setadminfile, "<?php\n");
fwrite($setadminfile, '$user = "' . $_GET['adminusr'] . '";');
fwrite($setadminfile, '$pass = "' . $_GET['adminpss'] . '";');
fwrite($setadminfile, "?>");
fclose($setadminfile);
echo '<p>Written admin \'set.php\' file</p>';
require('../set.php');
if (@mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db) == false) {
echo '<p>CONNECTION TO MYSQL DATABASE FAILED!</p>';
} else {
echo '<p>Connection made to mysql database server</p>';
}
$dbc = @mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db);
$q = "CREATE TABLE `litter_data` (
  `id` int(255) unsigned NOT NULL auto_increment,
  `user` varchar(500) default NULL,
  `txt` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `from_usr` varchar(250) NOT NULL,
  `spam` varchar(64) NOT NULL,
  `spam_by` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=371 ;";
$r = mysqli_query($dbc, $q);
if ($r == true) {
echo '<p>Table litter_data created</p>';
} else {
echo '<p>Table litter_data failed to get created! | ' . mysqli_error($dbc) . '</p>';
}
$q = "CREATE TABLE `litter_diary` (
  `id` int(255) NOT NULL auto_increment,
  `txt` varchar(1000) collate latin1_general_ci NOT NULL,
  `date` varchar(75) collate latin1_general_ci NOT NULL,
  `user` varchar(500) collate latin1_general_ci NOT NULL,
  `public` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=50 ;";
$r = mysqli_query($dbc, $q);
if ($r == true) {
echo '<p>Table litter_diary created</p>';
} else {
echo '<p>Table litter_diary failed to get created! | ' . mysqli_error($dbc) . '</p>';
}
$q = "CREATE TABLE `litter_events` (
  `id` int(255) unsigned NOT NULL auto_increment,
  `user` varchar(500) collate latin1_general_ci NOT NULL,
  `action` varchar(500) collate latin1_general_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=239 ;";
$r = mysqli_query($dbc, $q);
if ($r == true) {
echo '<p>Table litter_events created</p>';
} else {
echo '<p>Table litter_events failed to get created! | ' . mysqli_error($dbc) . '</p>';
}
$q = "CREATE TABLE `litter_fav` (
  `id` int(255) unsigned NOT NULL auto_increment,
  `user` varchar(500) collate latin1_general_ci NOT NULL,
  `favusr` varchar(500) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;";
$r = mysqli_query($dbc, $q);
if ($r == true) {
echo '<p>Table litter_fav created</p>';
} else {
echo '<p>Table litter_fav failed to get created! | ' . mysqli_error($dbc) . '</p>';
}
$q = "CREATE TABLE `litter_ip` (
  `ip` varchar(50) collate latin1_general_ci NOT NULL,
  `username` varchar(500) collate latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;";
$r = mysqli_query($dbc, $q);
if ($r == true) {
echo '<p>Table litter_ip created</p>';
} else {
echo '<p>Table litter_ip failed to get created! | ' . mysqli_error($dbc) . '</p>';
}
$q = "CREATE TABLE `litter_messaging` (
  `id` int(255) unsigned NOT NULL auto_increment,
  `txt` text collate latin1_general_ci NOT NULL,
  `from_usr` varchar(500) collate latin1_general_ci NOT NULL,
  `date` varchar(50) collate latin1_general_ci NOT NULL,
  `user` varchar(500) collate latin1_general_ci NOT NULL,
  `subject` varchar(500) collate latin1_general_ci NOT NULL,
  `readmsg` varchar(10) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=61 ;";
$r = mysqli_query($dbc, $q);
if ($r == true) {
echo '<p>Table litter_messaging created</p>';
} else {
echo '<p>Table litter_messaging failed to get created! | ' . mysqli_error($dbc) . '</p>';
}
$q = "CREATE TABLE `litter_usr` (
  `id` mediumint(255) unsigned NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(125) NOT NULL,
  `public` varchar(64) NOT NULL,
  `autoemail` varchar(64) NOT NULL,
  `fullname` varchar(125) NOT NULL,
  `registerdate` date NOT NULL,
  `lotterydate` date NOT NULL,
  `gaming` date NOT NULL,
  `activated` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;";
$r = mysqli_query($dbc, $q);
if ($r == true) {
echo '<p>Table litter_usr created</p>';
} else {
echo '<p>Table litter_usr failed to get created! | ' . mysqli_error($dbc) . '</p>';
}
$q = "CREATE TABLE `litter_robots` (
  `id` int(255) unsigned NOT NULL auto_increment,
  `user` varchar(500) collate latin1_general_ci NOT NULL,
  `botdetails` text collate latin1_general_ci NOT NULL,
  `botname` varchar(120) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;";
$r = mysqli_query($dbc, $q);
if ($r == true) {
echo '<p>Table litter_robots created</p>';
} else {
echo '<p>Table litter_robots failed to get created! | ' . mysqli_error($dbc) . '</p>';
}
$q = "
CREATE TABLE `litter_pages` (
  `id` int(255) unsigned NOT NULL auto_increment,
  `visits` int(255) NOT NULL,
  `text` text collate latin1_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `pagename` varchar(500) collate latin1_general_ci NOT NULL,
  `madeby` varchar(500) collate latin1_general_ci NOT NULL,
  `public` varchar(10) collate latin1_general_ci NOT NULL,
  `music` varchar(10) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=34 ;";
$r = mysqli_query($dbc, $q);
if ($r == true) {
echo '<p>Table litter_pages created</p>';
} else {
echo '<p>Table litter_pages failed to get created! | ' . mysqli_error($dbc) . '</p>';
}
$q = "CREATE TABLE `litter_comments` (
  `id` int(255) unsigned NOT NULL auto_increment,
  `pageid` varchar(255) collate latin1_general_ci NOT NULL,
  `txt` text collate latin1_general_ci NOT NULL,
  `madeby` varchar(500) collate latin1_general_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;";
$r = mysqli_query($dbc, $q);
if ($r == true) {
echo '<p>Table litter_comments created</p>';
} else {
echo '<p>Table litter_comments failed to get created! | ' . mysqli_error($dbc) . '</p>';
}
$q = "INSERT INTO litter_usr (password, username, email, public) VALUES (SHA1('" . $_GET['adminpss'] . "'), '" . $_GET['adminusr'] . "', '" . $_GET['adminemail'] . "', 'y')";
$r = mysqli_query($dbc, $q);
if ($r == true) {
echo '<p>User account ' . $_GET['adminusr'] . ' created</p>';
} else {
echo '<p>User account ' . $_GET['adminusr'] . ' failed to get created</p>';
}
$q = "INSERT INTO litter_data (user, txt, date, from_usr) VALUES ('" . $_GET['adminusr'] . "', '<p>Hello, it is me the owner of this website. Please post if you need anything.</p>', NOW(), 'Owner of this site')";
$r = mysqli_query($dbc, $q);
if ($r == true) {
echo '<p>Message on board created</p>';
} else {
echo '<p>Message on board failed to get created</p>';
}
}

?>