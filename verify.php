<?php
	include 'includes/sessionoutconnected.php';
	$conn = $app->getPDO();

	if(isset($_POST['login'])){
		$email= $_POST['email'];
		$password = sha1($_POST['password']);
		try{
			$stmt = $conn->prepare("SELECT * FROM t_compte WHERE Email = ? AND Password = ?");
            $stmt->execute(array($email,$password));
			$nbre = $stmt->rowCount();
			if($nbre == 1){
				$row = $stmt->fetch();
				if($row['Statut']==1){
					if($row['CategorieCompte']==6){
						$_SESSION['SuperadminConnected'] = $row['CodeCompte'];
					}
					elseif($row['CategorieCompte']==5){
						$_SESSION['AdminConnected'] = $row['CodeCompte'];
					}
					elseif($row['CategorieCompte']==4){
						$_SESSION['UserConnected'] = $row['CodeCompte'];
					}
				}else{
					$_SESSION['error'] = 'Désolé. votre compte est désactivé. Veuillez contacter l\'administrateur';
				}

			}
			else{
				$_SESSION['error'] = 'Utilisateur inexistant';
			}
		}
		catch(PDOException $e){
			echo "Erreur de connexion: " . $e->getMessage();
		}

	}elseif(isset($_POST['creer'])){
		$nom= $_POST['nom'];
		$postnom= $_POST['postnom'];
		$prenom= $_POST['prenom'];
		$email= $_POST['email'];
		$password = sha1($_POST['password']);
		$req1 = "SELECT * FROM t_compte WHERE Email = '$email'";
		$req2 = "INSERT INTO t_compte(Nom,Postnom,Prenom,Email,Password,CategorieCompte,Statut) VALUES(?,?,?,?,?,?,?,?)";
		if($res=$app->fetch($req1)){
			$_SESSION['error'] = 'Cette adresse mail est utilisée par un autre utilisateur';
		}else{
			$data = [$nom,$postnom,$prenom,$email,$password,4,1];
			if ($app->prepare($req2, $data, 1)) {
				$_SESSION['error'] = 'Compte crée';
			}
		}
	}
	else{
		$_SESSION['error'] = 'Entrez vos identifiants de connexion d\'abord';
	}

	//$pdo->close();
	header('location: index.php');

?>
