<?php
$id = $_GET['id'];
$sql = "SELECT * FROM t_personne
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
$req1 = $app->fetch($sql);
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Profile de l'habitant
    </h1>
    <ol class="breadcrumb">
      <li><a href="home_admin.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
      <li class="active">Profile de l'habitant</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php
    if (isset($_SESSION['error'])) {
      echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Erreur!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
      unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
      echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Succès!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
      unset($_SESSION['success']);
    }
    ?>
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="./img/<?php echo $req1['Image']; ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?php echo $req1['NomPersonne'] . ' ' . $req1['PostnomPersonne'] . ' ' . $req1['PrenomPersonne']; ?></h3>

            <p class="text-muted text-center"><?php if (isset($req1['SexePersonne'])) {
                                                echo $req1['SexePersonne'];
                                              } else {
                                                echo "No job";
                                              } ?></p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Telephone</b> : <a class="pull-right"><?php echo $req1['TelephonePersonne']; ?></a>
              </li>
              <li class="list-group-item">
                <b>Profession</b> : <a class="pull-right"><?php echo $req1['ProfessionPersonne']; ?></a>
              </li>
            </ul>
            <?php
            $today = date('Y');
            $naiss = date("Y", strtotime($req1['DateNaiss']));
            if(($today - $naiss)>15){
              ?>
              <a href="card.php?id=<?php echo $req1['CodePersonne']; ?>" target="_blank" class="btn btn-primary btn-block"> <i class='fa fa-print'></i> <b>Print card</b></a>
              <?php
            
            }
            ?>
            
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">A propos</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

            <p class="text-muted">
              <?php echo $req1['DomaineEtude']; ?>
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Adresse actuelle</strong>
            
            <p class="text-muted"><?php echo 'Num. ' . $req1['Numero'] . ', ' . $req1['Avenue'] . ', ' . $req1['Quartier'] . ', ' . $req1['Commune'] . ', ' . $req1['Ville']; ?></p>

            <hr>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- About Me Box -->

        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#historique" data-toggle="tab">Membres de sa famille</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="historique">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $menage = $req1['CodeMenage'];
                  $sql = "SELECT * FROM t_personne
                            WHERE CodeMenage=$menage";
                  $req = $app->fetchPrepared($sql);
                  foreach ($req as $row) {
                  ?>
                    <tr>

                      <td><?php echo $row['NomPersonne'] . ' ' . $row['PostnomPersonne'] . ' ' . $row['PrenomPersonne']; ?></td>
                      <td><?php echo $app->dateconv($row['DateNaiss']); ?></td>

                    </tr>
                  <?php
                  }


                  ?>
                </tbody>

              </table>
            </div>


            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>