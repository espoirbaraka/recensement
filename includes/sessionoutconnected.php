<?php
	include './class/app.php';
	session_start();


	if(isset($_SESSION['CodeUser'])){
		header('location: home_admin.php');
	}

?>