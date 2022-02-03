<?php
$id = $_GET['id'];
$sql = "SELECT * FROM t_parcelle
        INNER JOIN t_avenue
        ON t_parcelle.CodeAvenue=t_avenue.CodeAvenue
        WHERE CodeParcelle = $id";
$req1 = $app->fetch($sql);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Parcelle Num <?php echo $req1['Numero'] . ', av. ' . $req1['Avenue'] ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="home_admin.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
            <li class="active">Parcelle</li>
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
                        <img class="profile-user-img img-responsive img-circle" src="./img/parcelle.png" alt="User profile picture">


                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Proprietaire</b> : <a class="pull-right"><?php echo $req1['Proprietaire']; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Superficie</b> : <a class="pull-right"><?php echo $req1['Longueur'] . 'm sur ' . $req1['Largeur']; ?></a>
                            </li>
                        </ul>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#liste" data-toggle="tab">Liste des menages</a></li>
                        <li><a href="#newadresse" data-toggle="tab">Nouveau menage</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="liste">
                            <table id="example3" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Designation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM t_menage
                            WHERE CodeParcelle=$id";
                                    $req = $app->fetchPrepared($sql);
                                    foreach ($req as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['Designation']; ?></td>
                                            <td>
                                                <button class='btn btn-success btn-sm edit btn-flat' data-id="<?php echo $row['CodeMenage'] ?>"><i class='fa fa-edit'></i> </button>
                                                <button class='btn btn-danger btn-sm delete btn-flat' data-id="<?php echo $row['CodeMenage'] ?>"><i class='fa fa-trash'></i> </button>
                                                <a href="personne.php?id=<?php echo $row['CodeMenage'] ?>" class='btn btn-primary btn-sm btn-flat'><i class='fa fa-plus'></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>



                        <div class="tab-pane" id="newadresse">
                            <form class="form-horizontal" method="POST" action="manager/create.php">
                                <div class="form-group">
                                    <label for="numero" class="col-sm-2 control-label">Nom menage</label>
                                    <input type="hidden" name="event" value="CREATE_MENAGE">
                                    <input type="hidden" name="parcelle" value="<?php echo $_GET['id']; ?>">
                                    <div class="col-sm-10">
                                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom du menage" autocomplete="off" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="creer" class="btn btn-success">Creer</button>
                                    </div>
                                </div>
                            </form>
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