<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Provinces
      </h1>
      <ol class="breadcrumb">
        <li><a href="home_admin.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Provinces</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Erreur!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Succès!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow: auto;">
            <div class="box-header">
                <a href="#addprovince" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
                <button class="btn btn-primary btn sm btn-flat" onclick="imprimer();" style="float: right;">Imprimer</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Province</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM t_province";
                  $req = $app->fetchPrepared($sql);
                  foreach($req as $row){
                    ?>
                    <tr>
                        <td><?php echo $row['Province']; ?></td>
                        <td>
                        <button class='btn btn-primary btn-sm addville btn-flat' data-id="<?php echo $row['CodeProvince'] ?>"><i class='fa fa-plus'></i> Ajouter ville/ territoire</button>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id="<?php echo $row['CodeProvince'] ?>"><i class='fa fa-edit'></i> Modifier</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id="<?php echo $row['CodeProvince'] ?>"><i class='fa fa-trash'></i> Supprimer</button>
                        </td>
                    </tr>
                    <?php
                  }
                  ?>
                    
                </tbody>
                
              </table>
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




