<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role
      </h1>
      <ol class="breadcrumb">
        <li><a href="home_admin.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Role</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow: auto;">
            <div class="box-header">
                <a href="#addclient" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
                <button class="btn btn-primary btn sm btn-flat" onclick="imprimer();" style="float: right;">Imprimer</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Sexe</th>
                  <th>Date de naissance</th>
                  <th>Lieu de naissance</th>
                  <th>Mail</th>
                  <th>Telephone</th>
                  <th>Avoir</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><%=rs.getString("LieuNaissance") %></td>
                        <td><%=rs.getString("MailClient") %></td>
                        <td><%=rs.getString("TelephoneClient") %></td>
                        <td><%=rs.getString("AvoirClient") %> $</td>
                        <td>
                            <a href='profileclient.jsp?id=<%=id %>' class='btn btn-primary btn-sm btn-flat'><i class='fa fa-plus'>Compte</i></a>
                            <a href='updateclient.jsp?id=<%=id %>' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i></a>
                            <a href='deleteclient.jsp?id=<%=id %>' class='btn btn-danger btn-sm btn-flat'><i class='fa fa-remove'></i></a>
                        </td>
                    </tr>
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