<?php
echo $_SERVER['HTTP_USER_AGENT'];
?>
<input type="button" value="Get the location" onclick="getloc()">
<script>
function getloc() {
navigator.geolocation.getCurrentPosition(foundLocation, noLocation);

function foundLocation(position)
{
var lat = position.coords.latitude;
var long = position.coords.longitude;
alert('Found location: ' + lat + ', ' + long);
}
function noLocation()
{
alert('Could not find location');
}
}
</script>