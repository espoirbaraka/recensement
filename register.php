<?php
include 'class/app.php'; 

include("includes/head_login_register.php");
?>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../index.php"><b>CONGOPEDIA</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Creer un compte</p>

    <form action="verify.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nom" placeholder="Nom *" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="postnom" placeholder="Postnom *" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="prenom" placeholder="Prenom">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="email" class="form-control" name="mail" placeholder="Adresse mail *" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Mot de passe *" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="creer" class="btn btn-primary btn-block btn-flat">Valider</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

    <a href="index.php" class="text-center">J'ai déjà un compte</a>
  </div>
  <!-- /.form-box -->
</div>

<?php
include("includes/script_login_register.php");
?>
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Sep 2021 10:11:53 GMT -->
</html>
