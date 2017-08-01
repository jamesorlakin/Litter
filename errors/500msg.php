<?php
echo '<title>Litter - Page does not exist</title>';
include('../header.htm');
echo '<p><a href="index.php">Home</a> | Error:</p>';
echo '<p>The page you were browsing has an error and this message has been shown instead. CODE 500</p>';
echo '<script>
function gohome() {
window.location = "http://litter.comuv.com";
}
window.setTimeout("gohome()", 2500);
</script>';

?>