<?php 
require_once "connection.php";
try{
    $id = saring($_GET['id']);
    $sql = "UPDATE  kalibrasi SET is_deleted = true WHERE id=:id"; // Edited! Where is_deleted = true (soft deleted)
    $stmt = $connection->prepare($sql);
    $stmt->execute([':id'=>$id]);
    if($stmt){
        header("Location:calibration.php");
    }else{
        header("Location: error.php"); 
    }
}catch(PDOException $e){
    echo $e->getMessage();
}

?>