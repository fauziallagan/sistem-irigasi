<?php 

include "connection.php";

try{
    $id = saring($_GET['id']);
    $sql = "DELETE FROM kalibrasi WHERE id=:id";
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