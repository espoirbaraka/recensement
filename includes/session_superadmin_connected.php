<?php
	include '../class/app.php';
	session_start();

	if(!isset($_SESSION['SuperadminConnected']) || trim($_SESSION['SuperadminConnected']) == ''){
		header('location: ./index.php');
		exit();
	}

	$conn = $app->getPDO();

	$id = $_SESSION['SuperadminConnected'];
	$sql = "SELECT * FROM t_compte WHERE CodeCompte=$id";
	$req = $app->fetch($sql);
    

?>