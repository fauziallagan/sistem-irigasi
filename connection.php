<?php
$servername = "localhost";
$usernamedb = "pdam";
$passworddb = "Aez*27km!zz";
$dbname = "pdm"; 

function saring($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>