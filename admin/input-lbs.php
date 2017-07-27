<?php 
session_start();
if (empty($_SESSION['username'])){
  header('location:../index.php');  
} else {
  include "../conn.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Google Maps</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Hakko Bio Richard">
    <meta name="keywords" content="Perpus, Website, Aplikasi, Perpustakaan, Online">
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <style type="text/css">

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
                                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                                    <span class="input-group-btn">
                                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
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
                                    <b>Tambah Data LBS</b>

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body">
                      <form class="form-horizontal style-form" style="margin-top: 20px;" action="insert-lbs.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID LBS</label>
                              <div class="col-sm-8">
                                  <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nomor</label>
                              <div class="col-sm-8">
                                  <input name="nomor" type="text" id="no_induk" class="form-control" placeholder="Ex : 00xx" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-8">
                                  <input name="alamat" type="text" id="alamat" class="form-control" placeholder="Alamat" required />
                              </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Merk</label>
                              <div class="col-sm-8">
                                  <input name="merk" type="text" id="merk" class="form-control" placeholder="Merk" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Model</label>
                              <div class="col-sm-8">
                                  <input name="model" type="text" id="model" class="form-control" placeholder="Model" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Type</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="type" id="type">
                                  <option> -- Pilih Salah Satu --</option>
                                  <option value="L"> MTR RTU</option>
                                  <option value="P"> MTR</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Penyulang</label>
                              <div class="col-sm-8">
                                  <input name="penyulang" class="form-control" id="penyulang" type="text" placeholder="Penyulang" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">North</label>
                              <div class="col-sm-8">
                                  <input name="north" class="form-control" id="north" type="text" placeholder="North" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">East</label>
                              <div class="col-sm-8">
                                  <input name="east" class="form-control" id="east" type="text" placeholder="East" required />
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Baterai</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="baterai" id="baterai">
                                  <option> -- Pilih Salah Satu --</option>
                                  <option value="L"> Ada </option>
                                  <option value="P"> Tidak Ada </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Ratu MCB</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="ratu_mcb" id="ratu_mcb">
                                  <option> -- Pilih Salah Satu --</option>
                                  <option value="L"> Hidup </option>
                                  <option value="P"> Mati </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jarak Trafo</label>
                              <div class="col-sm-8">
                                  <input name="jarak_trafo" class="form-control" id="jarak_trafo" type="text" placeholder="Jarak Trafo" required />
                              </div>
                            </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Supply RTU</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="supply_rtu" id="supply_rtu">
                                  <option> -- Pilih Salah Satu --</option>
                                  <option value="L"> PT </option>
                                  <option value="P"> SR </option>
                                  <option value="P"> Tidak Ada </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tinggi Panel</label>
                              <div class="col-sm-8">
                                  <input name="tinggi_panel" class="form-control" id="tinggi_panel" type="text" placeholder="Tinggi Panel" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Grounding</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="grounding" id="grounding">
                                  <option> -- Pilih Salah Satu --</option>
                                  <option value="L"> Ada </option>
                                  <option value="P"> Tidak Ada </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nomor Kontrak</label>
                              <div class="col-sm-8">
                                  <input name="no_kontrak" class="form-control" id="no_kontrak" type="text" placeholder="Nomor Kontrak" required />
                              </div>
                           </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode Rayon</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="kd_rayon" id="kd_rayon">
                                  <option> -- Pilih Salah Satu --</option>
                                  <option value="L"> 12001 </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode LBS</label>
                              <div class="col-sm-8">
                                  <input name="kode_lbs" class="form-control" id="kode_lbs" type="text" placeholder="Kode LBS" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="keterangan" id="keterangan">
                                  <option> -- Pilih Salah Satu --</option>
                                  <option value="L"> BAIK </option>
                                  <option value="L"> PERLU PEMELIHARAAN </option>
                                  <option value="L"> TIDAK ADA PANEL </option>
                                  </select>
                              </div>
                          </div>
          
                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" value="Save" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="input-lbs.php" class="btn btn-sm btn-danger">Cancel</a>
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
        <script src="../js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="../js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="../js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="../js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="../js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
        <script type="text/javascript">
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

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
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