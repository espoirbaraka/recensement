<?php
include './class/app.php';
session_start();

if(!isset($_SESSION['AdminConnected']) || trim($_SESSION['AdminConnected']) == ''){
    header('location: ./index.php');
    exit();
}

$conn = $app->getPDO();

$id = $_SESSION['AdminConnected'];
$sql = "SELECT * FROM t_compte WHERE CodeCompte=$id";
$req = $app->fetch($sql);


?>