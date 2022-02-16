<?php 
require_once "connection.php";
if (isset($_POST['update'])){
    $id = saring($_POST["id_mesin"]);
    $tipe = saring($_POST["tipe"]);
    $id_mesin = saring($_POST["id_mesin"]);
    $pin = saring($_POST["pin"]);
    $tegangan_max = saring($_POST["tegangan_max"]);
	$nilai_analog = saring($_POST["nilai_analog"]);
    $tegangan_terukur = saring($_POST["tegangan_terukur"]);
    
	try {
        // $id = $_GET["id"];
		// prepare sql and bind parameters
        $sql_update = "UPDATE kalibrasi SET id_mesin ='$id_mesin', pin ='$pin', tipe='$tipe', tegangan_max =$tegangan_max,nilai_analog =$nilai_analog, tegangan_terukur = $tegangan_terukur WHERE id_mesin = '$id'";
		$stmt = $connection->prepare($sql_update);
		
        if($stmt->execute()){
            header("Location:calibration.php");
        }else{
            $s_error = "\n Data <h1> Gagal </h1> diperbaharui!";
        }
	}
	catch(PDOException $e) {
		$s_error = "\n " . $e->getMessage();
	}
}else{
	header("Location:calibration.php");
}

?>