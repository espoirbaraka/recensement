<?php
$today = date('Y-m-d H:s');
?>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($req['Photo'])) ? 'img/' . $req['Photo'] : 'img/user.png'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $req['NomAgent'] . ' ' . $req['NomAgent']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <?php if ($today < $req['Debut'] || $today > $req['Fin']) {
    ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li><a href="home_admin.php"><i class="fa fa-dashboard"></i> <span>Acceuil</span></a></li>


        <li class="header">PARAMETRES</li>
        <li><a href=""><i class="fa fa-user"></i> <span>Mon profile</span></a></li>
        <li><a href=""><i class="fa fa-list"></i> <span>Mon progmamme</span></a></li>
      </ul>
    <?php
    } else {
    ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li><a href="home_admin.php"><i class="fa fa-dashboard"></i> <span>Acceuil</span></a></li>
        <li><a href="parcelle.php"><i class="fa fa-home"></i> <span>Parcelle</span></a></li>

        <li class="header">PARAMETRES</li>
        <li><a href=""><i class="fa fa-user"></i> <span>Mon profile</span></a></li>
        <li><a href=""><i class="fa fa-list"></i> <span>Mon progmamme</span></a></li>
      </ul>
    <?php
    }
    ?>

  </section>
</aside>