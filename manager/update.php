<?php
session_start();
require '../class/app.php';
$app=new App('prototype');
$event=$_POST['event'];


 if($event=='UPDATE_USER'){
    $data=[$_POST['username'],$_POST['email'],sha1($_POST['password']),$_POST['id']];
    $sql="UPDATE t_user SET Username=?, Mail=?, Password=? WHERE CodeUser=?";
    if($app->prepare($sql,$data,1)){
     $_SESSION['success'] = 'Utilisateur modifié';
    }
    header("Location: ../user.php");
 }
 if($event=='UPDATE_PROVINCE'){
    $data=[$_POST['province'],$_POST['id']];
    $sql="UPDATE t_province SET Province=? WHERE CodeProvince=?";
    if($app->prepare($sql,$data,1)){
     $_SESSION['success'] = 'Province modifié';
    }
    header("Location: ../province.php");
 }

 if($event=='UPDATE_VILLE'){
   $data=[$_POST['ville'],$_POST['id']];
   $sql="UPDATE t_ville SET Ville=? WHERE CodeVille=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Ville/ Territoire modifié(e)';
   }
   header("Location: ../ville.php");
}

if($event=='UPDATE_COMMUNE'){
   $data=[$_POST['commune'],$_POST['id']];
   $sql="UPDATE t_commune SET Commune=? WHERE CodeCommune=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Commune/ Secteur/ Chefferie modifié(e)';
   }
   header("Location: ../commune.php");
}

if($event=='UPDATE_QUARTIER'){
   $data=[$_POST['quartier'],$_POST['id']];
   $sql="UPDATE t_quartier SET Quartier=? WHERE CodeQuartier=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Quartier/ Groupement modifié';
   }
   header("Location: ../quartier.php");
}

if($event=='UPDATE_AVENUE'){
   $data=[$_POST['avenue'],$_POST['id']];
   $sql="UPDATE t_avenue SET Avenue=? WHERE CodeAvenue=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Avenue modifiée';
   }
   header("Location: ../avenue.php");
}
if($event=='UPDATE_PERSONNE'){
   $id = $_POST['id'];
   $data=[$_POST['nom'],$_POST['postnom'],$_POST['prenom'],$_POST['telephone'],$_POST['pere'],$_POST['mere'],$_POST['lieunaiss'],$_POST['profession'],$_POST['domaine'],$_POST['id']];
   $sql="UPDATE t_personne SET NomPersonne=?, PostnomPersonne=?, PrenomPersonne=?, TelephonePersonne=?, NomPere=?, NomMere=?, LieuNaiss=?, ProfessionPersonne=?, DomaineEtude=? WHERE CodePersonne=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Personne modifiée';
   }
   header("Location: ../profile.php?id=$id");
}

if($event=='UPDATE_AGENT'){
   $id = $_POST['id'];
   $data=[$_POST['nom'],$_POST['postnom'],$_POST['prenom'],$_POST['id']];
   $sql="UPDATE t_agent SET NomAgent=?, PostnomAgent=?, PrenomAgent=? WHERE CodeAgent=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Agent modifiée';
   }
   header("Location: ../agent.php");
}

if($event=='UPDATE_PARCELLE'){

   $data=[$_POST['proprietaire'],$_POST['longueur'],$_POST['largeur'],$_POST['id']];
   $sql="UPDATE t_parcelle SET Proprietaire=?, Longueur=?, Largeur=? WHERE CodeParcelle=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Parcelle modifiée';
   }
   header("Location: ../parcelle.php");
}

if($event=='UPDATE_MENAGE'){

   $data=[$_POST['designation'],$_POST['id']];
   $sql="UPDATE t_menage SET Designation=? WHERE CodeMenage=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Menage modifiée';
   }
   header("Location: ../parcelle.php");
}

if($event=='UPDATE_PERSONNE'){

   $data=[$_POST['nom'],$_POST['postnom'],$_POST['prenom'],$_POST['telephone'],$_POST['mail'],$_POST['id']];
   $sql="UPDATE t_personne SET NomPersonne=?, PostnomPersonne=?, PrnomPersonne=?, EmailPersonne=?, TelephonePersonne=? WHERE CodePersonne=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Personne modifiée';
   }
   header("Location: ../parcelle.php");
}

 
 





?>