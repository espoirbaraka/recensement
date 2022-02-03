<?php
$id = $_GET['id'];
$sql = "SELECT * FROM t_menage
        WHERE CodeMenage = $id";
$req1 = $app->fetch($sql);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Les membres de <?php echo $req1['Designation'] ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="home_admin.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
            <li class="active">Personnes</li>
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
            <div class="col-xs-12">
                <div class="box" style="overflow: auto;">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#liste" data-toggle="tab">Liste personnes</a></li>
                                    <li><a href="#newagent" data-toggle="tab">Nouvelle personne</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="liste">
                                        <table id="example3" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Nom</th>
                                                    <th>Post-nom</th>
                                                    <th>Prenom</th>
                                                    <th>Telephone</th>
                                                    <th>Sexe</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM t_personne WHERE CodeMenage=$id";
                                                $req = $app->fetchPrepared($sql);
                                                foreach ($req as $row) {
                                                ?>
                                                    <tr>
                                                        <td><img src="img/<?php echo $row['Image']; ?>" style="width: 30px; height: 30px;"></td>
                                                        <td><?php echo $row['NomPersonne']; ?></td>
                                                        <td><?php echo $row['PostnomPersonne']; ?></td>
                                                        <td><?php echo $row['PrenomPersonne']; ?></td>
                                                        <td><?php echo $row['TelephonePersonne']; ?></td>
                                                        <td><?php echo $row['SexePersonne']; ?></td>
                                                        <td>
                                                            <button class='btn btn-primary btn-sm edit btn-flat' data-id="<?php echo $row['CodePersonne'] ?>"><i class='fa fa-edit'></i> </button>
                                                            <button class='btn btn-danger btn-sm delete btn-flat' data-id="<?php echo $row['CodePersonne'] ?>"><i class='fa fa-trash'></i> </button>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>

                                        </table>
                                    </div>



                                    <div class="tab-pane" id="newagent">
                                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="manager/create.php">
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Nom</label>
                                                <input type="hidden" name="event" value="CREATE_PERSONNE">
                                                <input type="hidden" name="menage" value="<?php echo $id; ?>">
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nom" name="nom" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Postnom</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="postnom" name="postnom" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Prenom</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="prenom" name="prenom" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Telephone</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="telephone" name="telephone" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Sexe</label>
                                                <div class="col-sm-10">
                                                    <select name="sexe" class="form-control" id="sexe">
                                                        <option value="Masculin">MASCULIN</option>
                                                        <option value="Feminin">FRMININ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Nom du père</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="pere" name="pere" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Nom de la mère</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="mere" name="mere" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Date de naissance</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" id="datenaiss" name="datenaiss" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Lieu de naissance</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="lieunaiss" name="lieunaiss" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Profession</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="profession" name="profession" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Domaine d'étude</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="domaine" name="domaine" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Nationalité</label>
                                                <div class="col-sm-10">
                                                    <select name="nationalite" class="form-control" id="nationalite">
                                                        <option value="1">Congolais</option>
                                                        <option value="0">Pas congolais</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Photo</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" id="photo" name="photo">
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="ajouter" class="btn btn-success">Ajouter</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- /.tab-pane -->
                                </div>
                                
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->




                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>