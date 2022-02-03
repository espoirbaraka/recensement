<?php
	include 'includes/sessionoutconnected.php';
	$conn = $app->getPDO();

	if(isset($_POST['login'])){
		$matricule= $_POST['matricule'];
		$password = sha1($_POST['password']);
		try{
			$stmt = $conn->prepare("SELECT * FROM t_user WHERE Matricule = ? AND Password = ?");
            $stmt->execute(array($matricule,$password));
			$nbre = $stmt->rowCount();
			//$nbre=1;
			if($nbre == 1){
				$row = $stmt->fetch();
				$_SESSION['CodeUser'] = $row['CodeUser'];
			}
			else{
				$_SESSION['error'] = 'Utilisateur inexistant';
			}
		}
		catch(PDOException $e){
			echo "Erreur de connexion: " . $e->getMessage();
		}
	


	}elseif(isset($_POST['creer'])){
		$matricule= $_POST['matricule'];
		$password = sha1($_POST['password']);
		$req1 = "SELECT * FROM t_agent WHERE Matricule = '$matricule'";
		$req2 = "INSERT INTO t_user(Matricule,Password,CodeAgent) VALUES(?,?,?)";
		if($res=$app->fetch($req1)){
			$data = [$matricule,$password,$res['CodeAgent']];
			if ($app->prepare($req2, $data, 1)) {
				$_SESSION['error'] = 'Compte crée';
			 }else{
				$_SESSION['error'] = 'Compte non crée: votre matricule est déjà utilisé';
			 }
		}else{
			$_SESSION['error'] = 'Matricule non trouvé';
		}
	}
	else{
		$_SESSION['error'] = 'Entrez vos identifiants de connexion d\'abord';
	}

	//$pdo->close();
	header('location: index.php');

?>
