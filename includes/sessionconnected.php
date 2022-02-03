<?php
	include './class/app.php';
	session_start();

	if(!isset($_SESSION['CodeUser']) || trim($_SESSION['CodeUser']) == ''){
		header('location: ./index.php');
		exit();
	}

	$conn = $app->getPDO();

	$id = $_SESSION['CodeUser'];
	$sql = "SELECT CodeUser,user_created_on,t_agent.CodeAgent,NomAgent,PostnomAgent,PrenomAgent,t_agent.Matricule,Photo,TelephoneAgent,EmailAgent,CodeFonction,CodeAffectation,Debut,Fin,t_quartier.CodeQuartier as CodeQuartier,Quartier 	 FROM t_user
				INNER JOIN t_agent
				ON t_user.CodeAgent=t_agent.CodeAgent
				LEFT JOIN t_affectation_agent
				ON t_agent.CodeAgent=t_affectation_agent.CodeAgent
				LEFT JOIN t_quartier
				ON t_affectation_agent.CodeQuartier=t_quartier.CodeQuartier
				WHERE CodeUser=$id";
	$req = $app->fetch($sql);
	$q = $req['CodeQuartier'];
    

?>