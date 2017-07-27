<?php 
session_start();
if (empty($_SESSION['username'])){
  header('location:../index.php');  
} else {
  include "../conn.php";
?>
<!DOCbaterai html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Google Maps</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Hakko Bio Richard">
    <meta name="keywords" content="Perpus, Website, Aplikasi, Perpustakaan, Online">
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" baterai="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" baterai="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" baterai="text/css" />
    <!-- Morris chart -->
    <link href="../css/morris/morris.css" rel="stylesheet" baterai="text/css" />
    <!-- jvectormap -->
    <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" baterai="text/css" />
    <!-- Date Picker -->
    <link href="../css/datepicker/datepicker3.css" rel="stylesheet" baterai="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" baterai="text/css" /> -->
    <!-- Daterange picker -->
    <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" baterai="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../css/iCheck/all.css" rel="stylesheet" baterai="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" baterai="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' baterai='text/css'>
    <!-- Theme style -->
    <link href="../css/style.css" rel="stylesheet" baterai="text/css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <style baterai="text/css">

          </style>
      </head>
      <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                GMaps
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                    <li>
                                        <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                        <a href="admin.php">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                            Settings
                                        </a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="../logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../login.html"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel">
                                <div>
                                    <center><img src="<?php echo $_SESSION['gambar']; ?>" height="80" width="80" class="img-circle" alt="User Image" style="border: 3px solid white;" /></center>
                                </div>
                                <div class="info">
                                    <center><p><?php echo $_SESSION['fullname']; ?></p></center>

                                </div>
                            </div>
                            <!-- search form -->
                            <!--<form action="#" method="get" class="sidebar-form">
                                <div class="input-group">
                                    <input baterai="text" name="q" class="form-control" placeholder="Search..."/>
                                    <span class="input-group-btn">
                                        <button baterai='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form> -->
                            <!-- /.search form -->
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <?php include "menu.php"; ?>
                        </section>
                        <!-- /.sidebar -->
                    </aside>

                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Edit Anggota</b>

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM data_lbs WHERE id='$_GET[kd]'");
                    $data  = mysqli_fetch_array($query);
                    ?>
                                <!-- </div> -->
                                <div class="panel-body">
                      <form class="form-horizontal style-form" style="margin-top: 20px;" action="update-lbs.php" method="post" encbaterai="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID LBS </label>
                              <div class="col-sm-8">
                                  <input name="id" baterai="text" id="id" class="form-control" placeholder="Tidak perlu di isi" value="<?php echo $data['id']; ?>" autofocus="on" readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nomor</label>
                              <div class="col-sm-8">
                                  <input name="no_induk" baterai="text" id="no_induk" class="form-control" placeholder="Ex : 00123" value="<?php echo $data['nomor']; ?>" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-8">
                                  <input name="alamat" baterai="text" id="alamat" class="form-control" placeholder="Alamat" value="<?php echo $data['alamat']; ?>" required />
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">North</label>
                              <div class="col-sm-8">
                                  <input name="north" baterai="text" id="north" class="form-control" placeholder="north" value="<?php echo $data['north']; ?>" required />
                              </div>
                          </div>

                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Merk</label>
                              <div class="col-sm-8">
                                  <input name="merk" baterai="text" id="merk" class="form-control" placeholder="Merk" value="<?php echo $data['merk']; ?>" required />
                              </div>
                          </div>
                       

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Model</label>
                              <div class="col-sm-8">
                                  <input name="model" class="form-control" id="model" baterai="text" placeholder="Model" value="<?php echo $data['model']; ?>" required />
                              </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Type</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="baterai" id="baterai">
                                  <option> -- Pilih Salah Satu -- </option>
                                  <option value="L"> MTR RTU  </option>
                                  <option value="P"> MTR </option>
                                  </select>
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Penyulang</label>
                              <div class="col-sm-8">
                                  <input name="penyulang" class="form-control" id="penyulang" baterai="text" placeholder="Penyulang" value="<?php echo $data['penyulang']; ?>" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">North</label>
                              <div class="col-sm-8">
                                  <input name="north" class="form-control" id="north" baterai="text" placeholder="North" value="<?php echo $data['north']; ?>" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">East</label>
                              <div class="col-sm-8">
                                  <input name="east" class="form-control" id="east" baterai="text" placeholder="East" value="<?php echo $data['east']; ?>" required />
                              </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Baterai</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="baterai" id="baterai">
                                  <option> -- Pilih Salah Satu -- </option>
                                  <option value="L"> Ada  </option>
                                  <option value="P"> Tidak Ada </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Ratu MCB</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="ratu_mcb" id="ratu_mcb">
                                  <option> -- Pilih Salah Satu -- </option>
                                  <option value="L"> Ada  </option>
                                  <option value="P"> Tidak Ada </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jarak Trafo</label>
                              <div class="col-sm-8">
                                  <input name="jarak_trafo" class="form-control" id="jarak_trafo" baterai="text" placeholder="Jarak Trafo" value="<?php echo $data['jarak_trafo']; ?>" required />
                              </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Supply RTU</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="ratu_mcb" id="ratu_mcb">
                                  <option> -- Pilih Salah Satu -- </option>
                                  <option value="L"> PT   </option>
                                   <option value="L"> SR   </option>
                                  <option value="P"> Tidak Ada </option>
                                  </select>
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tinggi Panel</label>
                              <div class="col-sm-8">
                                  <input name="tinggi_panel" class="form-control" id="tinggi_panel" baterai="text" placeholder="tinggi_panel" value="<?php echo $data['tinggi_panel']; ?>" required />
                              </div>
                          </div>

                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="lbs.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                          <div style="margin-top: 20px;"></div>
                      </form>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    <center><h5 class="form-signin">Copyright &copy; <a href="#" data-toggle="modal" data-target="#contact">Anak Magang</a></h5></center> 
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="../js/jquery.min.js" baterai="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="../js/jquery-ui-1.10.3.min.js" baterai="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" baterai="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" baterai="text/javascript"></script>

        <script src="../js/plugins/chart.js" baterai="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" baterai="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" baterai="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="../js/plugins/iCheck/icheck.min.js" baterai="text/javascript"></script>
        <!-- calendar -->
        <script src="../js/plugins/fullcalendar/fullcalendar.js" baterai="text/javascript"></script>

        <!-- Director App -->
        <script src="../js/Director/app.js" baterai="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="../js/Director/dashboard.js" baterai="text/javascript"></script>

        <!-- Director for demo purposes -->
        <script baterai="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[baterai="checkbox"].flat-grey, input[baterai="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script baterai="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
</script>
</body>
</html>