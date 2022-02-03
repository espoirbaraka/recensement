<?php
session_start();
require '../class/app.php';
$app=new App('prototype');
$event=$_POST['event'];


 if($event=='DELETE_USER'){
    $data=[$_POST['id']];
    $sql="DELETE FROM t_user WHERE CodeUser=?";
    if($app->prepare($sql,$data,1)){
     $_SESSION['success'] = 'Utilisateur supprimé';
    }
    header("Location: ../user.php");
 }

 if($event=='DELETE_PROVINCE'){
    $data=[$_POST['id']];
    $sql="DELETE FROM t_province WHERE CodeProvince=?";
    if($app->prepare($sql,$data,1)){
     $_SESSION['success'] = 'Province supprimé';
    }
    header("Location: ../province.php");
 }

 if($event=='DELETE_VILLE'){
   $data=[$_POST['id']];
   $sql="DELETE FROM t_ville WHERE CodeVille=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Ville/ Territoire supprimé(e)';
   }
   header("Location: ../ville.php");
}

if($event=='DELETE_COMMUNE'){
   $data=[$_POST['id']];
   $sql="DELETE FROM t_commune WHERE CodeCommune=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Commune/ Secteur/ Chefferie supprimé(e)';
   }
   header("Location: ../commune.php");
}

if($event=='DELETE_QUARTIER'){
   $data=[$_POST['id']];
   $sql="DELETE FROM t_quartier WHERE CodeQuartier=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Quartier/ Groupement supprimé';
   }
   header("Location: ../quartier.php");
}

if($event=='DELETE_AVENUE'){
   $data=[$_POST['id']];
   $sql="DELETE FROM t_avenue WHERE CodeAvenue=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Avenue supprimée';
   }
   header("Location: ../avenue.php");
}

if($event=='DELETE_HABITANT'){
   $data=[$_POST['id']];
   $sql="DELETE FROM t_personne WHERE CodePersonne=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Personne supprimée';
   }
   header("Location: ../habitant.php");
}

if($event=='DELETE_AGENT'){
   $data=[$_POST['id']];
   $sql="DELETE FROM t_agent WHERE CodeAgent=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Agent supprimée';
   }
   header("Location: ../agent.php");
}

if($event=='DELETE_PARCELLE'){
   $data=[$_POST['id']];
   $sql="DELETE FROM t_parcelle WHERE CodeParcelle=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Parcelle supprimée';
   }
   header("Location: ../parcelle.php");
}

if($event=='DELETE_MENAGE'){
   $data=[$_POST['id']];
   $sql="DELETE FROM t_menage WHERE CodeMenage=?";
   if($app->prepare($sql,$data,1)){
    $_SESSION['success'] = 'Menage supprimé';
   }
   header("Location: ../parcelle.php");
}



 
 





?>