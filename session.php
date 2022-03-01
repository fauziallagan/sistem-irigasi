<?php 
session_start();
require_once "connection.php";
if (empty($_SESSION["role"])) {
	$_SESSION["info"] = "Anda harus login terlebih dahulu.";
	header("Location: login.php"); 
	exit();
}
else {
    $role = $_SESSION["role"];
	$nama = $_SESSION["nama"];
    $email = $_SESSION["email"];
	$username = $_SESSION["username"];
	if (empty($_SESSION["error"])) {
		$s_error = "";
	} else {
		$s_error = $_SESSION["error"];
		$_SESSION["error"] = "";
	}
	if (empty($_SESSION["warning"])) {
		$s_warning = "";
	} else {
		$s_warning = $_SESSION["warning"];
		$_SESSION["warning"] = "";
	}
	if (empty($_SESSION["info"])) {
		$s_info = "";
	} else {
		$s_info = $_SESSION["info"];
		$_SESSION["info"] = "";
	}
	if (empty($_SESSION["success"])) {
		$s_success = "";
	} else {
		$s_success = $_SESSION["success"];
		$_SESSION["success"] = "";
	}
}


?>