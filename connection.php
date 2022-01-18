<?php
$servername = "localhost";
$usernamedb = "root";
$passworddb = "";
$dbname = "testing"; 

function saring($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>