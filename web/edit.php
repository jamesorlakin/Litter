<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
require('../set.php');
$q = "SELECT * FROM litter_pages WHERE id = '" . $_GET['id'] . "'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$cr = mysqli_fetch_array($r);
echo '<title>Litter - Edit page</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | <a href="mypages.php">My Pages</a> | Edit page:</p>';
if ($_SESSION['username'] == $cr['madeby']) {
if (empty($_GET['editor'])) {
echo '<script src="../tiny_mce/tiny_mce.js"></script><script>
var usrname = "' . $_SESSION['username'] . '";
tinyMCE.init({
mode : "textareas",
theme : "advanced",
plugins : "table,emotions,print,preview,autosave,iespell",
skin : "o2k7",
theme_advanced_buttons4 : "iespell,custbut,fontsizeselect,fontselect,print,cut,copy,paste,tablecontrols,emotions,forecolor,backcolor,preview",
setup : function(ed) { 
        // Add a custom button 
        ed.addButton(\'custbut\', { 
            title : \'View my messages link\', 
            image : \'messages.png\', 
            onclick : function() { 
                ed.focus(); 
                ed.selection.setContent(\'<a href="../read2.php?user=\' + usrname + \'">View my messages</a>\'); 
            } 
        }); 
}
});

function sendmsg() {
var ed = tinyMCE.get(\'pagedata\');
ed.focus();
ed.selection.setContent(\'<a href="../messaging/compose.php?to=\' + usrname + \'">Send me a private message</a>\');
}
</script>';
}
echo '<form action="edit2.php" method="post"><input type="hidden" name="pagename" value="' . $cr['pagename'] . '"><input type="hidden" name="public" value="' . $cr['public'] . '"><input type="hidden" name="id" value="' . $_GET['id'] . '">';
echo '<p>Background music: <select name="music">
<option value="n">No</option>
<option value="y">Yes</option>
</select></p>';
echo '<p>Body: </p>';
echo '<textarea name="pagedata" style="width: 100%" rows="15">' . stripslashes($cr['text']) . '</textarea>';
echo '<p><input type="submit" value="Edit page"> <input type="button" onclick="sendmsg()" value="Make a send me a message link"></p></form><p>You can drag these images into your page:<br /><img src="computer.png" height="90" width="90"><img src="web.gif" height="90" width="90"></p>';
} else {
echo '<p>You do not own that page!</p>';
}
} else {
header('Location: ../login.php?nl=yes');
}

?>