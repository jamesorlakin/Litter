<?php
echo '<title>Litter - Page does not exist</title>';
include('../header.htm');
include('../set.php');
echo '<p><a href="index.php">Home</a> | Error:</p>';
echo '<p>The page you were looking for was not found on this website, please check your spellings. CODE 404</p>';
echo '<script>
function gohome() {
window.location = "' . $webaddress . '";
}
window.setTimeout("gohome()", 2500);
</script>';

?>