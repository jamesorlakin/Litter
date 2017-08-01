<?php
echo '<form><input type="text" name="sugg"><input type="submit" value="Suggest"></form>';

if (isset($_GET['sugg'])) {
$diction = pspell_new("en");
$sug = pspell_suggest($diction, $_GET['sugg']);
echo '<pre>';
print_r($sug);
echo '</pre>';
}

?>