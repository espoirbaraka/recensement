 <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($req['Photo'])) ? 'img/'.$req['Photo'] : 'img/user.png'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $req['NomAgent'].' '.$req['NomAgent']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">GESTION</li>
        <li><a href="home_admin.php"><i class="fa fa-dashboard"></i> <span>Acceuil</span></a></li>
        <li><a href="menage.php"><i class="fa fa-home"></i> <span>Menage</span></a></li>
        <li><a href="habitant.php"><i class="fa fa-users"></i> <span>Habitant</span></a></li>

        <li class="header">PARAMETRES</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Paramètres</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="province.php"><i class="fa fa-circle-o"></i> Provinces</a></li>
            <li><a href="ville.php"><i class="fa fa-circle-o"></i> Villes/ Territoires</a></li>
            <li><a href="commune.php"><i class="fa fa-circle-o"></i> Communes/ Secteurs/ Cheff.</a></li>
            <li><a href="quartier.php"><i class="fa fa-circle-o"></i> Quartiers/ Groupements</a></li>
            <li><a href="avenue.php"><i class="fa fa-circle-o"></i> Avenues</a></li>
            <li><a href="agent.php"><i class="fa fa-circle-o"></i> Nos agents</a></li>
            <li><a href="user.php"><i class="fa fa-circle-o"></i> Utilisateur</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>