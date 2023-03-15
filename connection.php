
<?php
$dbname = "sensortes";
$servername = "localhost";
$username = "root";
$password= "";

// Start using PDO
$pdo = "mysql:host=$servername; dbname=$dbname";
$connection = new PDO( "mysql:host=$servername;dbname=$dbname", 'root', '');
if(!$connection){
	die("Fatal Error: Connection Failed!");
}
function saring($data){
$data = trim($data);
$data = stripcslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>