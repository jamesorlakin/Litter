<?php
function ip()

{

    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet

    {

      $ip=$_SERVER['HTTP_CLIENT_IP'];

    }

    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy

    {

      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];

    }

    else

    {

      $ip=$_SERVER['REMOTE_ADDR'];

    }

    return $ip;

}

class litter {

function getusername() {
return $_SESSION['username'];
}

function getfullname() {
$q = "SELECT * FROM litter_usr WHERE username = '" . $_SESSION['username'] . "'";
$r = mysqli_query(mysqli_connect($msql_host, $msql_usr, $msql_pss, $msql_db), $q);
$cr = mysqli_fetch_array($r);
return $cr['fullname'];
}

}
?>
