<?php
session_start();
require '../class/app.php';
$app = new App('prototype');
$headers = "From: esbarakabigega@gmail.com";
$sujet = "Soft-recencement";
$event = $_POST['event'];


if ($event == 'CREATE_USER') {
   $data = [$_POST['username'], $_POST['email'], sha1($_POST['password'])];
   $sql = "INSERT INTO t_user(Username,Mail,Password) VALUES(?,?,?)";
  if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Utilisateur enregistré';
   } if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Utilisateur enregistré';
   }
   header("Location: ../user.php");
}

if ($event == 'CREATE_PROVINCE') {
   $data = [$_POST['province']];
   $sql = "INSERT INTO t_province(Province) VALUES(?)";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Province enregistré';
   }
   header("Location: ../province.php");
}

if ($event == 'CREATE_VILLE') {
   $data = [$_POST['ville'], $_POST['id'], $_POST['statut']];
   $sql = "INSERT INTO t_ville(Ville,CodeProvince,CodeStatut) VALUES(?,?,?)";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Ville/ Territoire enregistré(e)';
   }
   header("Location: ../ville.php");
}

if ($event == 'CREATE_COMMUNE') {
   $data = [$_POST['commune'], $_POST['id'], $_POST['statut']];
   $sql = "INSERT INTO t_commune(Commune,CodeVille,CodeStatut) VALUES(?,?,?)";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Commune/ Secteur/ Chefferie enregistré(e)';
   }
   header("Location: ../commune.php");
}

if ($event == 'CREATE_QUARTIER') {
   $data = [$_POST['quartier'], $_POST['id'], $_POST['statut']];
   $sql = "INSERT INTO t_quartier(Quartier,CodeCommune,CodeStatut) VALUES(?,?,?)";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Quartier/ Groupement enregistré(e)';
   }
   header("Location: ../quartier.php");
}

if ($event == 'CREATE_AVENUE') {
   $data = [$_POST['avenue'], $_POST['id']];
   $sql = "INSERT INTO t_avenue(Avenue,CodeQuartier) VALUES(?,?)";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Avenue enregistré(e)';
   }
   header("Location: ../avenue.php");
}

if ($event == 'CREATE_PERSONNE') {
   $menage = $_POST['menage'];
   $filename = $_FILES['photo']['name'];
   if (!empty($filename)) {
      move_uploaded_file($_FILES['photo']['tmp_name'], '../img/' . $filename);
   }
   $data = [$_POST['nom'], $_POST['postnom'], $_POST['prenom'], $_POST['telephone'], $_POST['email'], $_POST['sexe'], $filename, $_POST['pere'], $_POST['mere'], $_POST['datenaiss'], $_POST['lieunaiss'], $_POST['profession'], $_POST['domaine'],$_POST['menage'],$_POST['nationalite']];
   $sql = "INSERT INTO t_personne(NomPersonne,PostnomPersonne, PrenomPersonne, TelephonePersonne, EmailPersonne, SexePersonne, Image, NomPere, NomMere, DateNaiss, LieuNaiss, ProfessionPersonne, DomaineEtude,CodeMenage,EstCongolais) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Personne enregistré';
   }
   header("Location: ../personne.php?id=$menage");
}

if ($event == 'CREATE_NEW_ADRESSE') {
   $id = $_POST['personne'];
   $data1 = [$_POST['personne']];
   $data2 = [$_POST['numero'], $_POST['avenue'], $_POST['quartier'], $_POST['commune'], $_POST['ville'], $_POST['province'], $_POST['personne'], $_POST['debut'], $_POST['fin'], 1];
   $sql1 = "UPDATE t_adresse SET Statut=0 WHERE CodePersonne=?";
   $sql2 = "INSERT INTO t_adresse(Numero,CodeAvenue,CodeQuartier,CodeCommune,CodeVille,CodeProvince,CodePersonne, DateDebut, DateFin,Statut) VALUES(?,?,?,?,?,?,?,?,?,?)";
   if ($app->prepare($sql1, $data1, 1)) {
      if ($app->prepare($sql2, $data2, 1)) {
         $_SESSION['success'] = 'Adresse enregistrée';
      }
   }
   header("Location: ../profile.php?id=$id");
}

if ($event == 'CREATE_AGENT') {
   $filename = $_FILES['photo']['name'];
   if (!empty($filename)) {
      move_uploaded_file($_FILES['photo']['tmp_name'], '../img/' . $filename);
   }
   $data = [$_POST['nom'], $_POST['postnom'], $_POST['prenom'], $filename, $_POST['fonction'], $_POST['telephone'], $_POST['email']];
   $sql = "INSERT INTO t_agent(NomAgent,PostnomAgent,PrenomAgent,Photo,CodeFonction,TelephoneAgent,EmailAgent) VALUES(?,?,?,?,?,?,?)";
   if($app->prepare($sql, $data, 1)) {
      $mail = $_POST['email'];
      $req = "SELECT * FROM t_agent WHERE EmailAgent='$mail'";
      if ($matr = $app->fetch($req)) {
         $matricule = $matr['Matricule'];
         $username = $_POST['nom'] . ' ' . $_POST['postnom'] . ' ' . $_POST['prenom'];
         if ($_POST['fonction'] == 1) {
            $corp = "Bonjour $username, vous etez maintenant enregistré chez SOFTECH comme agent administratif. Vous pouvez maintenant crée un compte avec votre matricule : $matricule";
            if (mail($mail, $sujet, $corp, $headers)) {
               echo "Email envoyé avec succès à $dest ...";
            }
         } elseif ($_POST['fonction'] == 2) {
            $corp = "Bonjour $username, vous etez maintenant enregistré chez SOFTECH comme agent recenseur. Vous pouvez maintenant crée un compte avec votre matricule : $matricule";
            if (mail($mail, $sujet, $corp, $headers)) {
               echo "Email envoyé avec succès à $dest ...";
            }
         }
      }
      $_SESSION['success'] = 'Agent enregistré';
   } else {
      $_SESSION['error'] = 'Agent non enregistré';
   }
   header("Location: ../agent.php");
}


if ($event == 'CREATE_AFFECTATION') {
   $id = $_POST['id'];
   $data = [$_POST['id'], $_POST['quartier'], $_POST['debut'], $_POST['fin']];
   $sql = "CALL proc_affectation_agent(?,?,?,?)";
   $req = "SELECT * FROM t_agent
         LEFT JOIN t_affectation_agent
         ON t_agent.CodeAgent=t_affectation_agent.CodeAgent
         LEFT JOIN t_quartier
         ON t_affectation_agent.CodeQuartier=t_quartier.CodeQuartier
         WHERE t_agent.CodeAgent=$id";
   if ($email = $app->fetch($req)) {
      $mail = $email['EmailAgent'];
      $quartier = $email['Quartier'];
      $debut = $app->dateconv($email['Debut']);
      $fin = $app->dateconv($email['Fin']);
      $username = $email['NomAgent'] . ' ' . $email['PostnomAgent'] . ' ' . $email['PrenomAgent'];
      if ($app->prepare($sql, $data, 1)) {
         $corp = "Salut $username. Vous etes affecté comme recenseur au quartier $quartier du $debut au $fin";
         $_SESSION['success'] = 'Agent affecté';
         if (mail($mail, $sujet, $corp, $headers)) {
            echo "Email envoyé avec succès à $dest ...";
         }
      }else{
         $_SESSION['error'] = 'Agent non affecté';
      }
   }

   header("Location: ../agent.php");
}

if ($event == 'CREATE_PARCELLE') {
   $data = [$_POST['numero'], $_POST['avenue'], $_POST['longueur'], $_POST['largeur'], $_POST['proprietaire'], $_SESSION['CodeUser']];
   $sql = "CALL proc_create_parcelle(?,?,?,?,?,?)";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Parcelle créee';
   }else{
      $_SESSION['error'] = '!!Cette parcelle existe déjà';
   }

   header("Location: ../parcelle.php");
}

if ($event == 'CREATE_MENAGE') {
   $id = $_POST['parcelle'];
   $data = [$_POST['parcelle'], $_POST['nom'], $_SESSION['CodeUser']];
   $sql = "INSERT INTO t_menage(CodeParcelle, Designation, menage_created_by) VALUES(?,?,?)";
   if ($app->prepare($sql, $data, 1)) {
      $_SESSION['success'] = 'Menage crée';
   }else{
      $_SESSION['error'] = 'Menage non crée';
   }

   header("Location: ../profile_parcelle.php?id=$id");
}
