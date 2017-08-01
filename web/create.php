<?php
session_start();

if ($_SESSION['loggedin'] == 'y') {
echo '<title>Litter - Make a page</title>';
include('../header.htm');
echo '<p><a href="../index.php">Home</a> | <a href="mypages.php">My pages</a> | Create page:</p>';
echo '<script src="../tiny_mce/tiny_mce.js"></script>';
if ($_GET['editor'] != "other") {
echo '<script>
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
echo '<form action="create2.php" method="post">
<p>Page name: <input type="text" name="pagename"></p>
<p>Allow who?: <select name="public">
<option value="y">Guests and members of Litter</option>
<option value="n">Litter members only</option>
</select></p>
<p>Background music: <select name="music">
<option value="n">No</option>
<option value="y">Yes</option>
</select></p>
<p>Data in page: (please note that it is easier to write a little bit and click on edit again to stop the session expiring</p>
<br /><textarea name="pagedata" style="width:100%" rows="15" id="pagedata"></textarea>
<p><input type="hidden" name="sub" value="yes"><input type="submit" value="Make page"> <input type="button" onclick="sendmsg()" value="Make a send me a message link"></p></form><p>You can drag these images into your page:<br /><img src="computer.png" height="90" width="90"><img src="web.gif" height="90" width="90"></p>';
} else {
header('Location: ../login.php?nl=yes');
}

?>