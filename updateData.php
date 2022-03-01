<?php 
require_once "connection.php";
if (isset($_POST['updateCalibration'])){
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
// Eksperimen Account Settings! Do not Push on github!!
if(isset($_POST['updatePengguna'])){
    $idPengguna = saring($_POST['username']);
    $nama = saring($_POST['nama']);
    $email = saring($_POST['email']);
    $kategori = saring($_POST['kategori']);
    try{
        $sql_updatePengguna = "UPDATE pengguna SET nama = '$nama', email = '$email', kategori = $kategori WHERE username = '$idPengguna'";
        $stmt_updatePengguna = $connection->prepare($sql_updatePengguna);
        
        if($stmt_updatePengguna->execute()){
            $s_success = "\n Data berhasil diupdate!";
            header("Location:index.php");
        }else{
            $s_error = "\n Data Gagal Diperbaharui!. mohon untuk mencoba lagi!";
        }
    }catch(PDOException $e){
        $s_error = "\n ". $e->getMessage();
    }
}
?>