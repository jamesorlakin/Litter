<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../../tiny_mce_popup.js"></script>
<script type="text/javascript" src="jscripts/embed.js"></script>
<script type="text/javascript"><!--
document.write('<base href="' + tinyMCEPopup.getWindowArg("base") + '">');
// -->
</script>
<title>{#preview.preview_desc}</title>
</head>
<body id="content">
<?php require('../../../set.php'); echo '<p align="center"><img src="' . $webaddress . '/head.png" alt="" width="332" height="97"></p><table width="100%"><tr><td>Here is a preview of your page:</td><td align="center"><input type="button" value="Print this" onclick="javascript: window.print();"></td><td align="right"><input type="button" value="Close window" onclick="javascript: window.close();"></td></tr></table><hr />'; ?>
<script type="text/javascript">
	document.write(tinyMCEPopup.editor.getContent());
</script>
</body>
</html>
