<?php 
require_once "../connection.php";
// use file json in php
$raw= json_decode(file_get_contents('php://input'), true);
// print_r($raw);

// buat obj json
$json_return = new \stdClass();

$accel_x =  $raw['sensor']['0']['accel']['0']['x'];
$accel_y = $raw['sensor']['0']['accel']['0']['y'];
$accel_z = $raw['sensor']['0']['accel']['0']['z'];
$compass_x = $raw['sensor']['0']['compass']['0']['x'];
$compass_y = $raw['sensor']['0']['compass']['0']['y'];
$compass_z = $raw['sensor']['0']['compass']['0']['z'];
$gyro_x = $raw['sensor']['0']['gyro']['0']['x'];
$gyro_y = $raw['sensor']['0']['gyro']['0']['y'];
$gyro_z = $raw['sensor']['0']['gyro']['0']['z'];
$gyro_temp = $raw['sensor']['0']['gyro']['0']['temp'];
$dht_temp  = $raw['sensor']['0']['dht22']['0']['temp'];
$dht_hum  = $raw['sensor']['0']['dht22']['0']['hum'];
// Analog 24
$analog_24v1 = $raw['analog']['0']['24v']['0']['1'];
$analog_24v2 = $raw['analog']['0']['24v']['0']['2'];
$analog_24v3 = $raw['analog']['0']['24v']['0']['3'];
$analog_24v4 = $raw['analog']['0']['24v']['0']['4'];
// Analog 12
$analog_12v1 = $raw['analog']['0']['12v']['0']['1'];
$analog_12v2 = $raw['analog']['0']['12v']['0']['2'];
$analog_12v3 = $raw['analog']['0']['12v']['0']['3'];
$analog_12v4 = $raw['analog']['0']['12v']['0']['4'];
// Analog 5
$analog_5v1 = $raw['analog']['0']['5v']['0']['1'];
$analog_5v2 = $raw['analog']['0']['5v']['0']['2'];
$analog_5v3 = $raw['analog']['0']['5v']['0']['3'];
$analog_5v4 = $raw['analog']['0']['5v']['0']['4'];

// Digital 5
$digital_5v1 = $raw['digital']['0']['5v']['0']['1'];
$digital_5v2 = $raw['digital']['0']['5v']['0']['2'];
// digital 12
$digital_12v1 = $raw['digital']['0']['12v']['0']['1'];
$digital_12v2 = $raw['digital']['0']['12v']['0']['2'];
// digital 24
$digital_24v1 = $raw['digital']['0']['24v']['0']['1'];
$digital_24v2 = $raw['digital']['0']['24v']['0']['2'];

try{
    $sql = "INSERT INTO testing(tanggal, waktu, accel_x, accel_y, accel_z, compass_x,compass_y, compass_z, gyro_x,gyro_y,gyro_z,gyro_temp,dht_temp,dht_hum, analog_24v1, analog_24v2,analog_24v3,analog_24v4,analog_12v1,analog_12v2,analog_12v3,analog_12v4, analog_5v1,analog_5v2,analog_5v3, analog_5v4, digital_5v1, digital_5v2, digital_12v1, digital_12v2, digital_24v1, digital_24v2)
            VALUES(CURDATE(), CURTIME(), $accel_x,$accel_y,$accel_z,$compass_x, $compass_y, $compass_z, $gyro_x,$gyro_y,$gyro_z,$gyro_temp, $dht_temp,$dht_hum, $analog_24v1, $analog_24v2,$analog_24v3,$analog_24v4,$analog_12v1,$analog_12v2,$analog_12v3,$analog_12v4, $analog_5v1,$analog_5v2,$analog_5v3,$analog_5v4,
            $digital_5v1, $digital_5v2, $digital_12v1, $digital_12v2, $digital_24v1, $digital_24v2)";

    $data = $connection->query($sql);
    $data->setFetchMode(PDO::FETCH_ASSOC);
	if($data){
	   $s_msg = "Sending Data Success!";
	}else{
	   $s_msg = "Sending Data Error! please try Again! ";
	}

  }catch(PDOException $e ){
    $s_msg = "Connection Failed!. Try Again!". $e->getMessage();
  }

$json_return->message = $s_msg;
header('Content-Type: application/json');
echo json_encode($json_return);

?>
