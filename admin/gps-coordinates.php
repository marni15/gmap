<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta http-equiv="content-language" content="en">
<meta name="description" content="GPS coordinates, points of interest, POI, waypoints, tracks and routes for GPS receivers as garmin and navigation systems as tomtom">
<meta name="keywords" content="GPS, coordinates, GPS coordinates, points of interest, POI, point of interest, place of interest, waypoints, routes, tracks, route, track, GPS receivers, garmin, navigation, systemes, navigationsystem, navigationsystems, tomtom, maps, locations">
<meta name="robots" content="index, follow">
<meta name="author" content="ARiS websitewerk - www.websitewerk.nl">
<meta name="publisher" content="ARiS websitewerk - www.websitewerk.nl">
<meta name="copyright" content="ARiS websitewerk - www.websitewerk.nl">
<meta name="revisit-after" content="5 days">
<title>GPS coordinates, points of interest, POI, waypoints, routes, tracks, maps, locations</title>
<link href="style008.css" rel="stylesheet" type="text/css" />
<link href="jqueryslidemenu.css"  rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="shtm/gpsnlsize004P.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="jqueryslidemenu002.js"></script>
<script type="text/javascript" src="adaptstyle001.js"></script>
<script type="text/javascript">
//<![CDATA[
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
<body>
<div id="logo">
<a href="http://www.gpscoordinates.eu" title="go to homepage of gpscoordinates.eu"><img src="several/logo-gpscoordinates.eu.png" alt="logo gpscoordinates.eu" width="190" height="22" /></a>
</div>
<div id="topmenu">
<p style="padding: 5px;">
<a href="login.php?ref=/gps-coordinates.php">log in</a> | <a href="adsfree-recommend.php">adsfree</a> | <a href="privacy.php">privacy</a> | <a href="disclaimer.php">disclaimer</a> | <a href="conditions.php">conditions</a> | <a href="contact.php">contact</a> | <a href="feedback.php">feedback</a> | <a href="links.php">links</a> | <a href="faq.php">FAQ</a> | <a href="help.php">help</a> | <a href="http://www.gpscoordinaten.nl">nederlandse versie</a></p>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-286751-3");
pageTracker._initData();
pageTracker._trackPageview();
</script></div>
<div id="top">
	<div id="adda">
	<div id="koekbalk">&nbsp;This website uses <a href="../privacy.php" style="color:#FFF; font-weight:bold; text-decoration:underline">cookies</a> to improve your experience. By using this site you agree.&nbsp;&nbsp;&nbsp;
<a href="#" onclick="koekbalkuitschakelen();" style="color:#FFF; font-weight:bold; text-decoration:underline">Message off</a>&nbsp;&nbsp;&nbsp;
</div>
<p style="padding: 8px;">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7492269444587274";
/* gpsnlHeadAd */
google_ad_slot = "5848732671";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</p>
<script type="text/javascript">
function koekbalkuitschakelen() {
	document.getElementById('koekbalk').style.visibility='hidden';
	document.getElementById('koekbalk').style.display='none';
	createCookie('Ckoek','1',1000);
}

if (readCookie('Ckoek')==null) {
	document.getElementById('koekbalk').style.visibility='visible';
	document.getElementById('koekbalk').style.display='block';
}

</script>
	</div>
	<div id="topcontrol">
	<span id="control"></span>
	</div>
</div>
<div id="myslidemenu" class="jqueryslidemenu" style="float:left;">
<ul>
<li style="width: 140px; text-align:center"><a href="../index.php">Home</a></li>
<li><a href="../gps-coordinates.php">GPS coordinates</a>
  <ul>
  <li style="z-index:1000"><a href="../determine-gps-coordinates.php">determine GPS coordinates</a></li>
  <li style="z-index:1000"><a href="../show-gps-coordinates.php">show location of GPS coordinates</a></li>
  <li style="z-index:1000"><a href="../convert-gps-coordinates.php">convert GPS coordinates</a></li>
  <li style="z-index:1000"><a href="../convert-rd-coordinates.php">convert RD coordinates</a></li>
  <li style="z-index:1000"><a href="../convert-utm-coordinates.php">convert UTM coordinates</a></li>
  </ul>
</li>
<li><a href="../points-of-interest.php">Points of Interest</a>
  <ul>
  <li style="z-index:1000"><a href="../search-poi.php">search Points of Interest</a></li>
  <li style="z-index:1000"><a href="../add-poi.php">add Point of Interest</a></li>
  <!--<li style="z-index:1000"><a href="../add-poi-from-file.php">add Points of Interest from file</a></li>-->
  <li style="z-index:1000"><a href="../all-points-of-interest.php">all Points of Interest</a></li>
  </ul>
</li>
<li><a href="routes-tracks.php">Routes/Tracks</a>
  <ul>
  <li style="z-index:1000"><a href="../plan-route-overview.php">plan Route / make Track</a>
    <ul>
  		<li style="z-index:1000"><a href="../plan-route.php?t=auto/motorcycle">auto/motorcycle</a></li>
  		<li style="z-index:1000"><a href="../plan-route.php?t=cycle NL">cycle <span style="font-size:0.8em">(NL,A,AUS,B,CH,DK,F,FL,IRL,L,N,P,S,SF,UK,USA)</span></a></li>
  		<li style="z-index:1000"><a href="../plan-route.php?t=cycle">cycle <span style="font-size:0.8em">(other countries)</span></a></li>
  		<li style="z-index:1000"><a href="../plan-route.php?t=hike/ATB">hike/ATB</a></li>
  		<li style="z-index:1000"><a href="../plan-route.php?t=others">others</a></li>
  		<li style="z-index:1000"><a href="../plan-route.php?t=personal settings">personal settings</a></li>
	</ul>
  </li>
  <li style="z-index:1000"><a href="../show-route-track.php">show and modify R/T</a></li>
  <li style="z-index:1000"><a href="../search-route-track.php">search R/T</a></li>
  <li style="z-index:1000"><a href="../add-route-track.php">add R/T</a></li>
  <li style="z-index:1000"><a href="../all-routes-tracks.php">all Routes/Tracks</a></li>
  </ul>
</li>
<li><a href="../afstand-meten-overzicht.php">Measure distance</a>
    <ul>
  		<li style="z-index:1000"><a href="../measure-distance.php?t=auto/motorcycle">auto/motorcycle</a></li>
  		<li style="z-index:1000"><a href="../measure-distance.php?t=cycle NL">cycle <span style="font-size:0.8em">(NL,A,AUS,B,CH,DK,F,FL,IRL,L,N,P,S,SF,UK,USA)</span></a></li>
  		<li style="z-index:1000"><a href="../measure-distance.php?t=cycle">cycle <span style="font-size:0.8em">(other countries)</span></a></li>
  		<li style="z-index:1000"><a href="../measure-distance.php?t=hike/ATB">hike/ATB</a></li>
  		<li style="z-index:1000"><a href="../measure-distance.php?t=others">others</a></li>
  		<li style="z-index:1000"><a href="../measure-distance.php?t=personal settings">personal settings</a></li>
	</ul>
</li>
<li><a href="../my-gps.php">My GPS</a>
  <ul>
  <li style="z-index:1000"><a href="../mv-poi.php">my collection Points of Interest</a></li>
  <li style="z-index:1000"><a href="../mv-routes-tracks.php">my collection Routes/Tracks</a></li>
  <li style="z-index:1000"><a href="../mb-poi.php">contributed Points of Interest</a></li>
  <!--<li style="z-index:1000"><a href="../mb-poi-files.php">contributed Point of Interest files</a></li>-->
  <li style="z-index:1000"><a href="../mb-routes-tracks.php">contributed Routes/Tracks</a></li>
  <li style="z-index:1000"><a href="../mb-friends.php">my friends</a></li>
  <li style="z-index:1000"><a href="../mb-data.php">my personal data</a></li>
  </ul>
</li>
<li><a href="../link-map-my-location.php">Make map</a></li>
</ul>
</div>
<div id="breadcrums">
<span class="smallfontstrong">GPS coordinates</span>
</div>


<div id="container">
<div id="sidebar1">
<p class="help">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7492269444587274";
/* gpseuLeft */
google_ad_slot = "7244740674";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</p>
<!-- end #sidebar1 -->
</div>
<!-- middle begin *************** -->
  <div id="middle" style="padding:5px;">

<p>
<a href="determine-gps-coordinates.php"><strong>determine GPS coordinates</strong></a><br />
You want to know the GPS coordinates of a location in or outside your country? Determine, by first using the 'go to' function and than clicking on the map, the GPS coordinates of any location. The found GPS coordinates can be exported to navigation systems such as TomTom and GPS receivers such as Garmin.


<br /><br /></p>

<p>
<a href="show-gps-coordinates.php"><strong>show locatie of GPS coordinates</strong></a><br />
You know the GPS coordinates of a location and would like to know where the location on the map is. Enter the coordinates, and the location is shown on the map.
<br /><br /></p>

<p>
<a href="convert-gps-coordinates.php"><strong>convert GPS coordinates</strong></a><br />
The units of GPS coordinates that you want to use are not suitable for your navigation system or GPS receiver. Here you can can convert the GPS coordinates to the desired units.<br /><br /></p>

<p>
<a href="convert-rd-coordinates.php"><strong>convert RD coordinates</strong></a><br />
Here you can can convert the GPS coordinates to RD coordinates (Dutch Rijks Driehoek measurements) and vice versa.
<br /><br /></p>



</div>
<!-- middle end *************** -->

<!-- right begin *************** -->
<div id="sidebar2">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7492269444587274";
/* gpseuRight */
google_ad_slot = "1198207074";
google_ad_width = 120;
google_ad_height = 600;

if ($(window).width()>1100) {//no ipad (980)
	document.write('<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>');
} else {
// ipad : skip sidebar2
	document.getElementById('sidebar2').style.display='none';	
}
//-->
</script>

<!-- end #sidebar2 --></div>
<!-- right end *************** -->

<!-- end #container --></div>

</body>
</html>

