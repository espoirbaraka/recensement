<?php
include 'includes/sessionoutconnected.php'; 

include("includes/head_login_register.php");
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>SOFT</b> Recensement</a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Connectez-vous à votre interface utilisateur</p>
    <?php
    if(isset($_SESSION['error'])){
					echo "
                        <p style='color: red; text-align: center;'>".$_SESSION['error']."</p> 
                    
                    ";
                    unset($_SESSION['error']);
                }
				?>
    <form action="verify.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Matricule" name="matricule" autocomplete="off" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Me rappeler du choix
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Connect</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OU -</p>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Connection avec Gmail</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">Mot de passe oublié</a><br>
    <a href="register.php" class="text-center">Créer un nouveau compte</a>

  </div>
  <!-- /.login-box-body -->
</div>

<?php
include("includes/script_login_register.php");
?>
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Sep 2021 10:11:53 GMT -->
</html>
