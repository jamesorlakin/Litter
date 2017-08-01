<?php

require('../../set.php');
$q = "SELECT DATE_FORMAT(date, \"%a, %d - %m - %y | %h:%i %p - %s seconds\") AS thedate, txt, spam, user, spam_by, from_usr, id FROM litter_data WHERE user = '" . $_GET['user'] . "' ORDER BY date DESC";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$q2 = "SELECT * FROM litter_usr WHERE username = '" . $_GET['user'] . "'";
$r2 = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q2);
$cur = mysqli_fetch_array($r2);
echo '<?xml version="1.0" ?>
<rss version="2.0">
<channel>';
if (empty($_GET['user'])) {
echo '<title>NOBODY\'S MESSAGES</title>';
} else {
echo '<title>' . $_GET['user'] . '\'s messages</title>';
}
echo '<description>Read someones message through RSS</description>
<link>' . $webaddress . '</link>';
if ($cur['public'] == 'y' or $_GET['user'] == 'jamesorlakin') {
while ($cr = mysqli_fetch_array($r)) {
$txt = str_ireplace('&nbsp;', '', strip_tags($cr['txt']));
echo '<item>
<title>' . $cr['thedate'] . '</title>
<description>' . $txt . '</description>
<author>' . $cr['from_usr'] . '@feeds.' . $_SERVER['SERVER_NAME'] . '</author>
<link>http://litter.comuv.com/read2.php?user=' . $cr['user'] . '#' . $cr['id'] . '</link>
</item>';
}
} else {
if (mysqli_num_rows($r2) == 1) {
echo '<item>
<title>Litter admin team</title>
<description>This user is not marked as visible to guests</description>
<link>http://litter.comuv.com/app/rss/help/?problem=notvisible</link>
</item>';
} else {
echo '<item>
<title>Litter admin team</title>
<description>This user does not exist</description>
<link>http://litter.comuv.com/app/rss/help/?problem=notexist</link>
</item>';
}
}
echo '</channel>
</rss>';
?>