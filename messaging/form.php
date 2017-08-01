<script src="../tiny_mce/tiny_mce.js"></script>
<script>
tinyMCE.init({
mode : "textareas",
theme : "advanced",
plugins : "table,emotions,print,media",
skin : "o2k7",
theme_advanced_buttons4 : "fontsizeselect,fontselect,print,cut,copy,paste,tablecontrols,emotions,media"
});

function checkrequired(which){
var bad = false;
if (window.formforcompose.requiredto.value == "") {
bad = true;
window.formforcompose.requiredto.style.backgroundColor = "red";
window.formforcompose.requiredto.style.color = "yellow";
}
if (window.formforcompose.requiredsubject.value == "") {
bad = true;
window.formforcompose.requiredsubject.style.backgroundColor = "red";
window.formforcompose.requiredsubject.style.color = "yellow";
}
var ed = tinyMCE.get('requiredmsg');
if (bad == true) {
alert('Please fill all of your textboxes!');
return false;
} else {
var ed = tinyMCE.get('requiredmsg');
ed.setProgressState(1);
return true;
}
}

function contact() {
var win = window.open("contacts.php", "", "height=350,width=400,resizable=yes,scrollbars=yes");
if (win.opener == null) win.opener = self;
}
</script>
<form action="compose2.php" method=post name="formforcompose" id="formforcompose" onsubmit="return checkrequired(this)" >
<p>To: (enter someones username) <input type=text name="requiredto" value="<?php echo $_GET['to']; ?>" > <a href="javascript: contact();">Contacts</a></p>
<p>Subject of message: <input type=text name="requiredsubject" value="<?php echo $_GET['subject']; ?>" ></p>
<p>Message body:</p>
<table>
<tr><td><textarea name="requiredmsg" cols=75 rows=20><?php echo stripslashes($_GET['reply']); ?></textarea></td>
<td><input type="hidden" id="ad" value="yep"><object data="data:application/x-silverlight-2," type="application/x-silverlight-2" style="width: 245px; height: 162px;">
		  <param name="source" value="../app/widgets/welcome.xap"/>
		  <param name="onError" value="onSilverlightError" />
		  <param name="background" value="white" />
		  <param name="minRuntimeVersion" value="4.0.50826.0" />
		  <param name="autoUpgrade" value="true" />
	    </object></td></tr>
</table>
<p><input type=submit value="Send"></p>
</form>
<p>Powered by Litter</p>