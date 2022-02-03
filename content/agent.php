<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Nos agents
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
                                    <li class="active"><a href="#liste" data-toggle="tab">Liste agents</a></li>
                                    <li><a href="#newagent" data-toggle="tab">Nouvel agent</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="liste">
                                        <table id="example3" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Nom</th>
                                                    <th>Postnom</th>
                                                    <th>Matricule</th>
                                                    <th>Prenom</th>
                                                    <th>Fonction</th>
                                                    <th>Telephone</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM t_agent
                                                INNER JOIN t_fonction
                                                ON t_agent.CodeFonction=t_fonction.CodeFonction";
                                                $req = $app->fetchPrepared($sql);
                                                foreach ($req as $row) {
                                                    if($row['CodeFonction']==1){
                                                        ?>
                                                        <tr>
                                                            <td><img src="<?php echo (!empty($row['Photo'])) ? 'img/'.$row['Photo'] : 'img/user.png'; ?>" style="width: 30px; height: 30px;"></td>
                                                            <td><?php echo $row['NomAgent']; ?></td>
                                                            <td><?php echo $row['PostnomAgent']; ?></td>
                                                            <td><?php echo $row['PrenomAgent']; ?></td>
                                                            <td><?php echo $row['Matricule']; ?></td>
                                                            <td><?php echo $row['Fonction']; ?></td>
                                                            <td><?php echo $row['TelephoneAgent']; ?></td>
                                                            <td><?php echo $row['EmailAgent']; ?></td>
                                                            <td>
                                                                <button class='btn btn-success btn-sm edit btn-flat' data-id="<?php echo $row['CodeAgent'] ?>"><i class='fa fa-edit'></i> </button>
                                                                <button class='btn btn-danger btn-sm delete btn-flat' data-id="<?php echo $row['CodeAgent'] ?>"><i class='fa fa-trash'></i> </button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }elseif($row['CodeFonction']==2){
                                                        ?>
                                                        <tr>
                                                            <td><img src="<?php echo (!empty($row['Photo'])) ? 'img/'.$row['Photo'] : 'img/user.png'; ?>" style="width: 30px; height: 30px;"></td>
                                                            <td><?php echo $row['NomAgent']; ?></td>
                                                            <td><?php echo $row['PostnomAgent']; ?></td>
                                                            <td><?php echo $row['PrenomAgent']; ?></td>
                                                            <td><?php echo $row['Matricule']; ?></td>
                                                            <td><?php echo $row['Fonction']; ?></td>
                                                            <td><?php echo $row['TelephoneAgent']; ?></td>
                                                            <td><?php echo $row['EmailAgent']; ?></td>
                                                            <td>
                                                                <button class='btn btn-primary btn-sm affecter btn-flat' data-id="<?php echo $row['CodeAgent'] ?>"><i class='fa fa-map'></i> Affect.</button>
                                                                <button class='btn btn-success btn-sm edit btn-flat' data-id="<?php echo $row['CodeAgent'] ?>"><i class='fa fa-edit'></i> </button>
                                                                <button class='btn btn-danger btn-sm delete btn-flat' data-id="<?php echo $row['CodeAgent'] ?>"><i class='fa fa-trash'></i> </button>
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
                                                <label for="numero" class="col-sm-2 control-label">Nom</label>
                                                <input type="hidden" name="event" value="CREATE_AGENT">
                                                <div class="col-sm-10">
                                                    <input type="text" name="nom" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Postnom</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="postnom" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Prenom</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="prenom" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Fonction</label>
                                                <div class="col-sm-10">
                                                    <select name="fonction" class="form-control" id="">
                                                    <?php
                                                    $sql = "SELECT * FROM t_fonction";
                                                    $req = $app->fetchPrepared($sql);
                                                    foreach($req as $row)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $row['CodeFonction']; ?>"><?php echo $row['Fonction']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Telephone</label>
                                                <div class="col-sm-10">
                                                    <input type="tel" name="telephone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="photo" class="col-sm-2 control-label">Photo passe-port</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="photo" class="form-control">
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