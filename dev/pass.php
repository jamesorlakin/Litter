<?php
function rannum() {
$num = rand(1, 29);

if ($num == 1) {
$finnum = 'A';
}
if ($num == 2) {
$finnum = 'B';
}
if ($num == 3) {
$finnum = 'C';
}
if ($num == 4) {
$finnum = 'D';
}
if ($num == 5) {
$finnum = 'E';
}
if ($num == 6) {
$finnum = 'F';
}
if ($num == 7) {
$finnum = 'G';
}
if ($num == 8) {
$finnum = 'H';
}
if ($num == 9) {
$finnum = 'I';
}
if ($num == 10) {
$finnum = 'J';
}
if ($num == 11) {
$finnum = 'K';
}
if ($num == 12) {
$finnum = 'L';
}
if ($num == 13) {
$finnum = 'M';
}
if ($num == 14) {
$finnum = 'N';
}
if ($num == 15) {
$finnum = 'O';
}
if ($num == 16) {
$finnum = 'P';
}
if ($num == 17) {
$finnum = 'Q';
}
if ($num == 18) {
$finnum = 'R';
}
if ($num == 19) {
$finnum = 'S';
}
if ($num == 20) {
$finnum = 'T';
}
if ($num == 21) {
$finnum = 'U';
}
if ($num == 22) {
$finnum = 'V';
}
if ($num == 23) {
$finnum = 'W';
}
if ($num == 24) {
$finnum = 'X';
}
if ($num == 25) {
$finnum = 'Y';
}
if ($num == 26) {
$finnum = 'Z';
}
if ($num == 27) {
$finnum = 1;
}
if ($num == 28) {
$finnum = 6;
}
if ($num == 29) {
$finnum = 3.5;
}

return $finnum;
}
$pass = rannum();
$pass .= rannum();
$pass .= rannum();
$pass .= rannum();
$pass .= rannum();
$pass .= rannum();
$pass .= rannum();
$pass .= rannum();
$pass .= rannum();
$pass .= rannum();
$pass .= rannum();
echo '<script>
function setpass() {
window.document.forms[\'register\'].pss.value = "' . $pass . '";
window.document.forms[\'register\'].cpss.value = "' . $pass . '";
window.document.forms[\'register\'].setpassbutton.disabled = true;
window.document.forms[\'register\'].setpassbutton.value = "Set as pass";
window.setTimeout("checkbut()", 500);
}

function checkbut() {
if ( window.document.forms[\'register\'].pss.value == "' . $pass . '" ) {
// no
} else {
window.document.forms[\'register\'].setpassbutton.disabled = false;
}
if ( window.document.forms[\'register\'].cpss.value == "' . $pass . '" ) {
// no
} else {
window.document.forms[\'register\'].setpassbutton.disabled = false;
}
window.setTimeout("checkbut()", 500);
}
</script>';
echo '<p>Litter has made a random pass, this is for if you cannot think of a strong password: " ' . $pass . ' " <input type="button" value="Set as pass" onclick="setpass()" name="setpassbutton"></p>';
?>