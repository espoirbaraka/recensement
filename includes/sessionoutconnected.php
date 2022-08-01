<?php
	include './class/app.php';
	session_start();

	if(isset($_SESSION['SuperadminConnected'])){
		header('location: home_superadmin.php');
	}
    elseif(isset($_SESSION['AdminConnected'])){
        header('location: home_admin.php');
    }
    elseif(isset($_SESSION['UserConnected'])){
        header('location: home_user.php');
    }
?>