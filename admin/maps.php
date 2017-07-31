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
$logout_redirect_url = "../index.php"; // Set logout URL

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
                                    <b>Google Maps</b>

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body">
                      <form class="form-horizontal style-form" style="margin-top: 20px;"  method="post" enctype="multipart/form-data" name="form1" id="form1">
                         
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">North</label>
                              <div class="col-sm-8">
                                  <input id = "north" type="text"  class="form-control" placeholder="North">
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                         

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">East</label>
                              <div class="col-sm-8">
                                 <input id = "east" type="text"  class="form-control" placeholder="East">
                              </div>
                          </div>
                           <div class="form-group" style="margin-left: 750px;" >
                              <label class="col-sm-3 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                         <button type = "button" onclick="fungsiku()">Combine</button>
                          </div>
                          </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Input</label>
                              <div class="col-sm-8">
                               <p id="coordinat"></p> 
                              </div>



<link href="style008.css" rel="stylesheet" type="text/css" />
<link href="jqueryslidemenu.css"  rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="include-eu/txt002.js"></script>
<script type="text/javascript" src="shtm/gpsnlsize004P.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="jqueryslidemenu002.js"></script>
<script type="text/javascript" src="adaptstyle001.js"></script>
<script type="text/javascript" src="shtm/gpsnlparsegps001P.js"></script>
<script type="text/javascript" src="shtm/gpsnlautoparsegps001P.js"></script>
<script type="text/javascript" src="shtm/gpsnlparselatlng005P.js"></script>
<script type="text/javascript" src="shtm/gpsnlrd002P.js"></script>
<script type="text/javascript" src="shtm/gpsnlutm001P.js"></script>
<script type="text/javascript" src="shtm/gpsnlcommon001P.js"></script>
<script type="text/javascript">
//<![CDATA[

function ga_naar_toon_kaart_mijn_locatie () {
composedlatlng=document.getElementById('a-latlongd').value;
tmplength=composedlatlng.split(',').length;
if (tmplength==2) {
  splittedlatlng=composedlatlng.split(',');
  thislatitude=splittedlatlng[0];
  thislongitude=splittedlatlng[1];
  map_width = 450;
  map_height = 450;
  mapzoom = readCookie('Czoom')
  if (mapzoom==null) {
    mapzoom=7;
    createCookie('Czoom',7,1000);
  }
  maptype = readCookie('Cmaptype')
  if (maptype==null) {
    maptype='roadmap';
    createCookie('Cmaptype','roadmap',1000);
  }

  label = '';
  window_width = parseInt (map_width)+15;
  window_height = parseInt (map_height)+90;
  myUrl = url_toon_kaart_mijn_locatie_php+"?lat="+thislatitude+"&lng="+thislongitude+"&w="+map_width+"&h="+map_height+"&mt="+maptype+"&z="+mapzoom+"&lab="+label;
  //window.location.href = myUrl;
  //alert('myUrl:'+myUrl);
  myWindowChar = "width="+window_width+", height="+window_height+",toolbar=0,status=0,scrollbars=0,resizable=1";
  winNew=window.open(myUrl,"", myWindowChar);
} else {
  alert (txt_geen_geldige_locatie);
}
}
function showlink () {
  document.getElementById('maplink').style.visibility = 'visible'; 
}
function hidelink () {
  document.getElementById('maplink').style.visibility = 'hidden'; 
}

function selectcode(What){
  if (What.value=="") 
  {
    alert(txt_niets_te_selecteren) 
  }else{
    What.focus();
    What.select();
    if (document.all)
    {
      What.createTextRange().execCommand("Copy");
      //alert("code is geselecteerd\n(plakken kan met Ctrl V)");
    }
  }
}
function checkEnter(e, id){
var characterCode

if(e && e.which)
{
  e = e;
  characterCode = e.which;
}else{
  e = event;
  characterCode = e.keyCode;
}
if(characterCode == 13)
{
  if (id==1) {convertinput();}
}
}

function ajax_log(input2log)
{
  $.ajax({
    type: "GET",
  url: "loginput.php?data="+input2log,
  dataType: "xml",
  success: function(data){}
  });
} 


function convertinput() {
ajax_log (document.getElementById('a-latlong').value);
flexibleinput2latlng(document.getElementById('a-latlong').value);
if (basezone==nullvalue && ((baselatitude==nullvalue || (baselatitude <=90.0 && baselatitude >=-90.0)) && (baselongitude==nullvalue || (baselongitude <=180.0 && baselongitude >=-180.0)))) { 
  if (baselatitude==nullvalue && baselongitude==nullvalue){
    document.getElementById('a-latlongd').value = '';
    document.getElementById('a-latlongdm').value = '';
    document.getElementById('a-latlongdms').value = '';
    document.getElementById('a-latlongxy').value = '';
    document.getElementById('a-latlongutm').value = '';
    hidelink();
  } else if (baselatitude==nullvalue){// baselatitude only
    document.getElementById('a-latlongd').value = d2d(baselongitude);
    document.getElementById('a-latlongdm').value = d2dm(baselongitude,'longitude');
    document.getElementById('a-latlongdms').value = d2dms(baselongitude,'longitude');
    document.getElementById('a-latlongxy').value = '';
    document.getElementById('a-latlongutm').value = '';
    hidelink();
  } else if (baselongitude==nullvalue){// baselongitude only
    document.getElementById('a-latlongd').value = d2d(baselatitude);
    document.getElementById('a-latlongdm').value = d2dm(baselatitude,'latitude');
    document.getElementById('a-latlongdms').value = d2dms(baselatitude,'latitude');
    document.getElementById('a-latlongxy').value = '';
    document.getElementById('a-latlongutm').value = '';
    hidelink();
  } else {
    document.getElementById('a-latlongd').value = d2d(baselatitude)+', '+d2d(baselongitude);
    document.getElementById('a-latlongdm').value = d2dm(baselatitude,'latitude')+', '+d2dm(baselongitude,'longitude');
    document.getElementById('a-latlongdms').value = d2dms(baselatitude,'latitude')+', '+d2dms(baselongitude,'longitude');
    document.getElementById('a-latlongxy').value = d2xy(baselatitude,baselongitude);
    utmresult=latlng2UTM(tmplat,tmplng);
    document.getElementById('a-latlongutm').value = utmresult.utmzone+utmresult.utmband+' '+utmresult.easting+' '+utmresult.northing;
    showlink();
  }
} else if (basezone==nullvalue && (baselatitude>=7000 && baselatitude<=300000 && baselongitude>=289000 && baselongitude<=629000)) {//XY instead of latlng
  tmplat=RD2lat(baselatitude,baselongitude);
  tmplng=RD2lng(baselatitude,baselongitude);
  document.getElementById('a-latlongd').value = d2d(tmplat)+', '+d2d(tmplng);
  document.getElementById('a-latlongdm').value = d2dm(tmplat,'latitude')+', '+d2dm(tmplng,'longitude');
  document.getElementById('a-latlongdms').value = d2dms(tmplat,'latitude')+', '+d2dms(tmplng,'longitude');
  document.getElementById('a-latlongxy').value = d2xy(tmplat,tmplng);
  utmresult=latlng2UTM(tmplat,tmplng);
  document.getElementById('a-latlongutm').value = utmresult.utmzone+utmresult.utmband+' '+utmresult.easting+' '+utmresult.northing;
  showlink();
} else if (basezone!=nullvalue && (baselatitude>=0 && baselatitude<=10000000 && baselongitude>=166000 && baselongitude<=836000)) {//UTM instead of latlng
  tmplatlng=UTM2latlng(basezone,baseband,baselatitude,baselongitude);
  tmplat=tmplatlng.latitude;
  tmplng=tmplatlng.longitude;
  document.getElementById('a-latlongd').value = d2d(tmplat)+', '+d2d(tmplng);
  document.getElementById('a-latlongdm').value = d2dm(tmplat,'latitude')+', '+d2dm(tmplng,'longitude');
  document.getElementById('a-latlongdms').value = d2dms(tmplat,'latitude')+', '+d2dms(tmplng,'longitude');
  document.getElementById('a-latlongxy').value = d2xy(tmplat,tmplng);
  utmresult=latlng2UTM(tmplat,tmplng);
  document.getElementById('a-latlongutm').value = utmresult.utmzone+utmresult.utmband+' '+utmresult.easting+' '+utmresult.northing;
  showlink();
} else {
  alert ('illegal input');
}
}

function resetall() {
  document.getElementById('a-latlong').value = '';
  document.getElementById('a-latlongd').value = '';
  document.getElementById('a-latlongdm').value = '';
  document.getElementById('a-latlongdms').value = '';
  document.getElementById('a-latlongxy').value = '';
}


latitude = readCookie('Clatitude')
if (latitude==null) {
  latitude=52.37269;
  createCookie('Clatitude',52.37269,1000);
}
longitude = readCookie('Clongitude')
if (longitude==null) {
  longitude=4.89299;
  createCookie('Clongitude',4.89299,1000);
}

var adsyes=true;    
var adsno=false;    
$(document).ready(function(){
  updateMiddleSize();
  if (adsno){adaptstyle();}
});

window.onresize=function(){updateMiddleSize()};

//]]>
</script>

</head>


</script>
  
<!-- middle begin *************** -->
  <div id="middle" style="padding:5px;">

  <table>
  
  <tr>
    <td class="smallfontstrong"><em>input:</em></td>  
  <td><input type="text" id="a-latlong" value="" size="25" style="font-size:large" onKeyDown="checkEnter(event,'1')"></td>
  <td colspan="2" class="normal8"><em>flexible input!</em></td></tr>

  <tr><td colspan="2"></td><td colspan="2"><input type="button" value="X" onClick="resetall();" class="button" /> <input type="button" value="Convert" onClick="convertinput();" class="button" /> </td></tr>
  <tr style="height:35px"><td colspan="4"></td></tr>
  <tr><td></td><td class="smallfontstrong"><em>latitude, longitude</em> or <em>X, Y</em></td><td colspan="2"></td></tr>


  <tr>
    <td class="smallfontstrong"><em>result:</em></td>  
  <td><input type="text" id="a-latlongd" value="" size="25" class="nb" readonly style="font-size:large" ></td>
  <td><a href="#" onClick="javascript:selectcode(document.getElementById('a-latlongd')); return false;"><img src="several/copy.gif" alt="select and copy result" width="25" height="25" /></a></td>
  <td class="normal8">degrees (DD.dddddd&deg; notation)</td></tr>

  <tr>
    <td class="smallfontstrong"><em>result:</em></td>  
  <td><input type="text" id="a-latlongdm" value="" size="25" class="nb" readonly style="font-size:large" ></td>
  <td><a href="#" onClick="javascript:selectcode(document.getElementById('a-latlongdm')); return false;"><img src="several/copy.gif" alt="select and copy result" width="25" height="25" /></a></td>
  <td class="normal8">degrees and minutes (DD&deg;MM.mmm&#8217; notation)</td></tr>

  <tr>
    <td class="smallfontstrong"><em>result:</em></td>  
  <td><input type="text" id="a-latlongdms" value="" size="25" class="nb" readonly style="font-size:large" ></td>
  <td><a href="#" onClick="javascript:selectcode(document.getElementById('a-latlongdms')); return false;"><img src="several/copy.gif" alt="select and copy result" width="25" height="25" /></a></td>
  <td class="normal8">degrees, minutes and seconds (DD&deg;MM&#8217;SS.s&#8221; notation)</td></tr>

  <tr>
    <td class="smallfontstrong"><em>result:</em></td>  
  <td><input type="text" id="a-latlongxy" value="" size="25" class="nb" readonly style="font-size:large" ></td>
  <td><a href="#" onClick="javascript:selectcode(document.getElementById('a-latlongxy')); return false;"><img src="several/copy.gif" alt="select and copy result" width="25" height="25" /></a></td>
  <td class="normal8">RD coordinates (Dutch Rijks Driehoek measurement X,Y in meters)</td></tr>

  <tr>
    <td class="smallfontstrong"><em>result:</em></td>  
  <td><input type="text" id="a-latlongutm" value="" size="25" class="nb" readonly style="font-size:large" ></td>
  <td><a href="#" onClick="javascript:selectcode(document.getElementById('a-latlongutm')); return false;"><img src="several/copy.gif" alt="select and copy result" width="25" height="25" /></a></td>
  <td class="normal8"></td></tr>
<tr><td></td><td></td><td id="maplink" style="visibility:hidden" colspan="2">
<input type="button" value="Show result on map" onClick="ga_naar_toon_kaart_mijn_locatie();" class="button" />
</td></tr>
  </table>


<br /><br /></p>
</div>
<!-- middle end *************** -->
   
<!-- right begin *************** -->


<!-- end #sidebar2 --></div>
<!-- right end *************** -->

<!-- end #container --></div>
</body>
</html>


                              
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
 <script>
  function fungsiku(){
    var x,y,text;
    x = document.getElementById("north").value;
    y = document.getElementById("east").value;
    
    document.getElementById("coordinat").innerHTML = x+" , "+y;
    document.getElementById("a-latlong").setAttribute('value', x + ", " + y);
  }
</script>
</html
