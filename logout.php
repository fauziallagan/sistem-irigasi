<?php
session_start();
session_unset(); 
session_destroy(); 
session_start();
$_SESSION["info"] = "Logout Success!"; 
header("Location: login.php"); 
?>