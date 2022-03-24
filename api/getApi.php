<?php 
require_once "../connection.php";
try{
    $sql_input = "SELECT *  FROM testing"; 
    $row_input = $connection->query($sql_input);
    $row_input->setFetchMode(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    die("Connection to Database Failed!. Please Check Database Connection!!" . $e->getMessage());
}
while($input = $row_input->fetch()){
    $accel_x    = $input['accel_x'];
    $accel_y    = $input['accel_y'];
    $accel_z    = $input['accel_z'];
    $compass_x  = $input['compass_x'];
    $compass_y  = $input['compass_y'];
    $compass_z  = $input['compass_z'];
    $gyro_x     = $input['gyro_x'];
    $gyro_y     = $input['gyro_y'];
    $gyro_z     = $input['gyro_z'];
    $gyro_temp  = $input['gyro_temp'];
    $dht_temp   = $input['dht_temp'];
    $dht_hum    = $input['dht_hum'];
    // Analog 24
    $analog_24v1 = $input['analog_24v1'];
    $analog_24v2 = $input['analog_24v2'];
    $analog_24v3 = $input['analog_24v3'];
    $analog_24v4 = $input['analog_24v4'];
    // Analog 12
    $analog_12v1 = $input['analog_12v1'];
    $analog_12v2 = $input['analog_12v2'];
    $analog_12v3 = $input['analog_12v3'];
    $analog_12v4 = $input['analog_12v4'];
    // Analog 5
    $analog_5v1 = $input['analog_5v1'];
    $analog_5v2 = $input['analog_5v2'];
    $analog_5v3 = $input['analog_5v3'];
    $analog_5v4 = $input['analog_5v4'];
    // Digital 5
    $digital_5v1 = $input['digital_5v1'];
    $digital_5v2 = $input['digital_5v2'];
    // digital 12
    $digital_12v1 = $input['digital_12v1'];
    $digital_12v2 = $input['digital_12v2'];
    // digital 24
    $digital_24v1 = $input['digital_24v1'];
    $digital_24v2 = $input['digital_24v2'];
    


    $json[] = array(
        'accel_x'    => $input['accel_x'],
        'accel_y'    => $input['accel_y'],
        'accel_z'    => $input['accel_z'],
        'compass_x'  => $input['compass_x'],
        'compass_y'  => $input['compass_y'],
        'compass_z'  => $input['compass_z'],
        'gyro_x'     => $input['gyro_x'],
        'gyro_y'     => $input['gyro_y'],
        'gyro_z'     => $input['gyro_z'],
        'gyro_temp'  => $input['gyro_temp'],
        'dht_temp'   => $input['dht_temp'],
        'dht_hum'    => $input['dht_hum'],
        'analog_24v1' => $input['analog_24v1'],
        'analog_24v2' => $input['analog_24v2'],
        'analog_24v3' => $input['analog_24v3'],
        'analog_24v4' => $input['analog_24v4'],
        // Analog 12
        'analog_12v1' => $input['analog_12v1'],
        'analog_12v2' => $input['analog_12v2'],
        'analog_12v3' => $input['analog_12v3'],
        'analog_12v4' => $input['analog_12v4'],
        // Analog 5
        'analog_5v1' => $input['analog_5v1'],
        'analog_5v2' => $input['analog_5v2'],
        'analog_5v3' => $input['analog_5v3'],
        'analog_5v4' => $input['analog_5v4'],
        // Digital 5
        'digital_5v1' => $input['digital_5v1'],
        'digital_5v2' => $input['digital_5v2'],
        // digital 12
        'digital_12v1' => $input['digital_12v1'],
        'digital_12v2' => $input['digital_12v2'],
        // digital 24
        'digital_24v1' => $input['digital_24v1'],
        'digital_24v2' => $input['digital_24v2'],
    );
}
$response = array(
    'status'=>'OK',
    'data Sensor'=>$json,
    'message'=>'Success!'
);
header('Content-Type:application/json');
echo json_encode($response);
?>