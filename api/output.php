<!-- Insert Data json ke database -->
<?php 
require_once "../connection.php";
$data = json_decode(file_get_contents("output.json"), true);
// $data = json_decode(file_get_contents('php://out'), true);
print_r($data);

$out = new stdClass();

$relay_1 = $data['relay']['1'];
$relay_2 = $data['relay']['2'];

$digital_3v1 = $data['digital']['3.3v']['1'];
$digital_3v2 = $data['digital']['3.3v']['2'];

$digital_5v1 = $data['digital']['5v']['1'];
$digital_5v2 = $data['digital']['5v']['2'];

$digital_12v1 = $data['digital']['12v']['1'];
$digital_12v2 = $data['digital']['12v']['2'];

$digital_24v1 = $data['digital']['24v']['1'];
$digital_24v2 = $data['digital']['24v']['2'];

// $uart_serial = $data['output']['0']['uart']['0']['serial'];

try{
    $sql = "INSERT INTO output_v2(relay_1,relay_2,digital_3v1,digital_3v2,digital_5v1,digital_5v2,digital_12v1,digital_12v2,digital_24v1,digital_24v2)VALUES($relay_1,$relay_2,$digital_3v1,$digital_3v2,$digital_5v1,$digital_5v2,$digital_12v1,$digital_12v2,$digital_24v1,$digital_24v2)";
    $data = $connection->query($sql);
    $data->setFetchMode(PDO::FETCH_ASSOC);
    if($data){
        echo "OK";
    }else{
        echo "Error";
    }
}catch(PDOException $e){
    echo "Error : ". $e->getMessage();
}

?>