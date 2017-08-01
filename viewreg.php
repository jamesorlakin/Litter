<?php

echo '<title>Litter - View video</title>';
include('header.htm');
echo '<p><a href="index.php">Home</a> | Watch register video</p>';
echo "<script type='text/javascript' src='http://litter.comuv.com/video/swfobject.js'></script> <div id='mediaspace'>You appear to be <b>missing</b> flash player, please install it to view video</div> <script type='text/javascript'>var so = new SWFObject('http://litter.comuv.com/video/player.swf','mpl','470','320','9');so.addParam('allowfullscreen','true');so.addParam('allowscriptaccess','always');so.addParam('wmode','opaque');so.addVariable('file','http://litter.comuv.com/video/register.flv');so.write('mediaspace');</script>";

?>