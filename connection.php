<?php
$servername = "localhost";
$usernamedb = "pdam";
$passworddb = "Aez*27km!zz";
$dbname = "pdm"; 
$pdo = "mysql:host=$servername; dbname=$dbname";
function saring($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$connection = new PDO($pdo, $usernamedb, $passworddb);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>