<?php
include '../class/app.php';
session_start();

if(!isset($_SESSION['UserConnected']) || trim($_SESSION['UserConnected']) == ''){
    header('location: ./index.php');
    exit();
}

$conn = $app->getPDO();

$id = $_SESSION['UserConnected'];
$sql = "SELECT * FROM t_compte WHERE CodeCompte=$id";
$req = $app->fetch($sql);


?>