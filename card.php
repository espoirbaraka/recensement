<?php
include("includes/head.php");

include("class/app.php");

$id = $_GET['id'];
$sql = "SELECT CodePersonne,NomPersonne,	PostnomPersonne,	PrenomPersonne,	EmailPersonne,	NomPere,	NomMere,	SexePersonne,	Image,	DateNaiss,	LieuNaiss,	ProfessionPersonne,	DomaineEtude,EstCongolais,t_menage.CodeMenage,Designation as menage,	menage_created_by,t_parcelle.CodeParcelle,Numero,Longueur,Largeur,Proprietaire,parcelle_created_on,parcelle_created_by,t_avenue.CodeAvenue,Avenue,t_quartier.CodeQuartier,Quartier,t_commune.CodeCommune,Commune,t_ville.CodeVille,Ville,CodeProvince 	 FROM t_personne
        LEFT JOIN t_menage
        ON t_personne.CodeMenage=t_menage.CodeMenage
        INNER JOIN t_parcelle
        ON t_menage.CodeParcelle=t_parcelle.CodeParcelle
        INNER JOIN t_avenue
        ON t_parcelle.CodeAvenue=t_avenue.CodeAvenue
        INNER JOIN t_quartier
        ON t_avenue.CodeQuartier=t_quartier.CodeQuartier
        inner join t_commune
        ON t_quartier.CodeCommune=t_commune.CodeCommune
        INNER JOIN t_ville
        ON t_commune.CodeVille=t_ville.CodeVille
        WHERE CodePersonne = $id";
$req = $app->fetch($sql);
?>
<body id="homeSection" onload="window.print();">

       

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main">
            <!-- Hero Section -->

            <div class="container">
                <div class="col-md-12">

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <br>
                                                <div class="row" style="border: 4px solid black; border-radius: 20px;">

                                                    <div class="col-sm-12" style="text-align: center;">
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <img src="./img/drapeau.png" class="img-responsive img-thumbnail" style="border-color: white; width: 70px; height: 50px; float: left;">
                                                            </div>
                                                            <div class="col-xs-6">
                                                                REPUBLIQUE DEMOCRATIQUE DU CONGO <br>
                                                                <span>CARTE DE RESIDENT</span>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <img src="./img/arm.png" class="img-responsive img-thumbnail" style="border-color: white; width: 70px; height: 50px; float: left;">
                                                            </div>
                                                        </div>
                                                         
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                        <img src="./img/<?php echo $req['Image']; ?>" style="margin-top: 10px; margin-left: 10px; margin-rigth: 0px;  weigth: 200px; height: 120px;" class="img-responsive img-thumbnail">
                                                        </div>

                                                        <div class="col-xs-9">

                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-user"></i>&nbsp;</i>Nom:</strong> <?php echo $req['NomPersonne']; ?>
                                                            </span> <br>

                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-user"></i>&nbsp;Postnom:</strong> <?php echo $req['PostnomPersonne']; ?>
                                                            </span><br>

                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-user">&nbsp;</i>Prenom:</strong> <?php echo $req['PrenomPersonne']; ?>
                                                            </span><br>

                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-male">&nbsp;</i>Sexe:</strong> <?php echo $req['SexePersonne']; ?>
                                                            </span><br>

                                                        
                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-phone"></i>&nbsp;Residence:</strong> <?php echo $req['menage']; ?>
                                                            </span><br>

                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-phone"></i>&nbsp;Nationalité:</strong> <?php if($req['EstCongolais']==1){ echo "Congolais";}else{ echo "Etranger"; }; ?>
                                                            </span><br>

                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-map-marker"></i>&nbsp;Adresse: <?php echo 'Num. '.$req['Numero'].', '.$req['Avenue'].', '.$req['Quartier'].', '.$req['Commune'].', '.$req['Ville']; ?></strong> 
                                                                
                                                            </span><br>



                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <div class="row text-center text-danger">
                                                            les autorités tant civiles que militaires et
                                                            celles de la police nationale sont priées d'apporter leur secours
                                                            au porteur de la présente en cas de nécessité.
                                                        </div>
                                                    </div>



                                                </div>
                                                <br>
                                                <br>
                                                <div class="row" style="border: 4px solid black; border-radius: 20px;">

                                                    <!-- <div class="col-sm-12" style="text-align: center;">
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <img src="./img/drapeau.png" class="img-responsive img-thumbnail" style="border-color: white; weigth: 70px; height: 50px; float: left;">
                                                            </div>
                                                            <div class="col-xs-6">
                                                                REPUBLIQUE DEMOCRATIQUE DU CONGO <br>
                                                                <span>CARTE D'IDENTIFICATION</span>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <img src="./img/arm.png" class="img-responsive img-thumbnail" style="border-color: white; weigth: 70px; height: 50px; float: left;">
                                                            </div>
                                                        </div>
                                                         
                                                    </div> -->
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                        <img src="qrcodehabitant.php" style="margin-top: 10px; margin-left: 10px; margin-rigth: 0px;  width: 150; height: 150px;" class="img-responsive img-thumbnail">
                                                        </div>

                                                        <div class="col-xs-9">

                                                            <h4 style="text-align: center;">REPUBLIQUE DEMOCRATIQUE DU CONGO</h4>
                                                            <div class="col-xs-4">

                                                            </div>
                                                            <div class="col-xs-4">
                                                                <img src="img/arm.png" alt="" style="width: 80px; height: 80px; padding: 10px 10px auto; margin-left: 20px">
                                                                <br>
                                                                <h2 style="text-align: center; font-weight: bold;">NOTE</h2>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                
                                                            </div>
                                                            



                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <div class="row text-center text-danger">
                                                            
                                                            <p>Si tu ramasse cette carte, svp, rendez-la au poste de la police le plus proche.</p>
                                                            <p>La contrefaction de la dite carte est punie de servitude pénale</p>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    



                </div>
            </div>

        </main>
        <!-- ========== END MAIN CONTENT ========== -->





    </body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/charts/chartjs.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Sep 2021 10:10:25 GMT -->
</html>
