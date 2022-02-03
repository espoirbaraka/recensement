<?php
$today = date('Y-m-d H:s');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php

    if ($today < $req['Debut'] || $today > $req['Fin']) {
    ?>
        <section class="content">
            <div class="row">

                <div class="col-lg-12 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <p>Vous n'etes pas affecté null part. Vous serez bientot informé sur votre nouvelle affectation </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users "></i>
                        </div>
                        <a href="" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>




            </div>



        </section>
    <?php
    } else {
    ?>
        <section class="content-header">
            <p>
                Acceuil :: Recenseur <?php echo $req['Quartier']; ?>
            </p>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-lg-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <?php
                            $sql1 = "SELECT COUNT(CodePersonne) as nbre FROM t_personne";
                            $req1 = $app->fetch($sql1);
                            ?>
                            <h3><?php echo $req1['nbre']; ?></h3>

                            <p>Personnes recencées</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="habitant.php" class="small-box-footer"> Plus d'infos<i class="fa fa-"></i></a>
                    </div>
                </div>

                <div class="col-lg-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <?php
                            $sql2 = "SELECT COUNT(CodeProvince) as nbre FROM t_province";
                            $req2 = $app->fetch($sql2);
                            ?>
                            <h3><?php echo $req2['nbre']; ?></h3>

                            <p>Nombre des personnes visées</p>

                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="province.php" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            </div>
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            <li class="active"><a href="#revenue-chart" data-toggle="tab">R.D.C</a></li>

                            <li class="pull-left header"><i class="fa fa-inbox"></i> Nombre d'habitant recensés</li>
                        </ul>
                        <div class="tab-content no-padding">
                            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 400px;"></div>
                        </div>
                    </div>

                </section>
            </div>



        </section>
    <?php
    }
    ?>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2021 <a href="https://adminlte.io">softtech-company</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>

</html>