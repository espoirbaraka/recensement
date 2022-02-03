<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Les parcelles de <?php echo $req['Quartier'] ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="home_admin.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
            <li class="active">Nos agents</li>
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
                                    <li class="active"><a href="#liste" data-toggle="tab">Liste parcelles</a></li>
                                    <li><a href="#newagent" data-toggle="tab">Nouvelle parcelle</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="liste">
                                        <table id="example3" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Adresse</th>
                                                    <th>Proprietaire</th>
                                                    <th>Longueur</th>
                                                    <th>Largeur</th>
                                                    <th>Ajouté par</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql = "SELECT * FROM t_parcelle
                                                        INNER JOIN t_avenue
                                                        ON t_parcelle.CodeAvenue=t_avenue.CodeAvenue
                                                        INNER JOIN t_user
                                                        ON t_parcelle.parcelle_created_by=t_user.CodeUser
                                                        INNER JOIN t_agent
                                                        ON t_user.CodeAgent=t_agent.CodeAgent
                                                        WHERE CodeQuartier=$q";
                                                $req = $app->fetchPrepared($sql);
                                                foreach ($req as $row) {
                                                    if ($_SESSION['CodeUser'] == $row['parcelle_created_by']) {
                                                ?>
                                                        
                                                            <tr>
                                                                <td><?php echo $row['Numero'] . ' ,av. ' . $row['Avenue']; ?></td>
                                                                <td><?php echo $row['Proprietaire']; ?></td>
                                                                <td><?php echo $row['Longueur'] . ' m'; ?></td>
                                                                <td><?php echo $row['Largeur'] . ' m'; ?></td>
                                                                <td><?php echo $row['NomAgent'] . ' ' . $row['PostnomAgent']; ?></td>
                                                                <td>
                                                                    <button class='btn btn-success btn-sm edit btn-flat' data-id="<?php echo $row['CodeParcelle'] ?>"><i class='fa fa-edit'></i> </button>
                                                                    <button class='btn btn-danger btn-sm delete btn-flat' data-id="<?php echo $row['CodeParcelle'] ?>"><i class='fa fa-trash'></i> </button>
                                                                    <a href="profile_parcelle.php?id=<?php echo $row['CodeParcelle'] ?>" class='btn btn-primary btn-sm btn-flat'><i class='fa fa-plus'></i></a>
                                                                </td>
                                                            </tr>
                                                        

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $row['Numero'] . ' ,av. ' . $row['Avenue']; ?></td>
                                                            <td><?php echo $row['Proprietaire']; ?></td>
                                                            <td><?php echo $row['Longueur'] . ' m'; ?></td>
                                                            <td><?php echo $row['Largeur'] . ' m'; ?></td>
                                                            <td><?php echo $row['NomAgent'] . ' ' . $row['PostnomAgent']; ?></td>
                                                            <td>
                                                                <a href="profile_parcelle.php?id=<?php echo $row['CodeParcelle'] ?>" class='btn btn-primary btn-sm btn-flat'><i class='fa fa-plus'></i></a>

                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>



                                    <div class="tab-pane" id="newagent">
                                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="manager/create.php">
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Numero</label>
                                                <input type="hidden" name="event" value="CREATE_PARCELLE">
                                                <div class="col-sm-10">
                                                    <input type="number" name="numero" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Avenue</label>
                                                <div class="col-sm-10">
                                                    <select name="avenue" class="form-control" id="">
                                                        <?php
                                                        $sql = "SELECT * FROM t_avenue WHERE CodeQuartier=$q";
                                                        $res = $app->fetchPrepared($sql);
                                                        foreach ($res as $row) {
                                                        ?>
                                                            <option value="<?php echo $row['CodeAvenue'] ?>"><?php echo $row['Avenue'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Longueur</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="longueur" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Largeur</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="largeur" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Proprietaire</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="proprietaire" class="form-control">
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
                                <!-- /.tab-content -->
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