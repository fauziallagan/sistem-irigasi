<?php
$servername = "localhost";
$usernamedb = "pdam";
$passworddb = "Aez*27km!zz";
$dbname = "pdm"; 

function saring($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

  // if(empty($_SESSION["error"])){
  //     $s_error = "";
  // }else{
  //     $s_error = $_SESSION["error"];
  //     $_SESSION["error"] = "";
  // }
  // if(empty($_SESSION["warning"])){
  //     $s_warning = "";
  // }else{
  //     $s_warning = $_SESSION["warning"];
  //     $_SESSION["warning"] = "";
  // }
  // if(empty($_SESSION["info"])){
  //     $s_info = "";
  // }else {
  //     $s_info = $_SESSION["info"];
  //    $_SESSION["info"] = "";
  // }
  // if(empty($_SESSION["success"])){
  //     $s_success = "";
  // }else {
  //     $s_success = $_SESSION["success"];
  //     $_SESSION["success"] = "";
  // }
  // $e_tot = 0;
  // if(!empty($_SESSION["info"])){
  //     $s_info = $_SESSION["info"];
  //     $_SESSION["info"] = "";
  // }
  // if(empty($_POST["username"])){
  //     $s_error .= "Username harus diisi!";
  //     $e_tot += 1;
  // }else{
  //     $username = saring($_POST["username"]);
  // }
  // if(empty($_POST["password"])){
  //     $s_error .= "\n Password Harus Diisi";
  //     $e_tot +=1;
  // }else{
  //     $password = saring($_POST["password"]);
  // }
  // if(empty($_POST["ingat"])){
  //     $ingat = 0;
  // }
  // else{
  //     $ingat = 1;
  // }

?>