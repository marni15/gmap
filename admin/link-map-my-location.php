

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
<title>GPS coordinates, map, roadmap, plan</title>
<link href="style008.css" rel="stylesheet" type="text/css" />
<link href="jqueryslidemenu.css"  rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="include-eu/txt002.js"></script>
<link rel="image_src" type="image/gif" href="http://www.gpscoordinaten.nl/several/logo4facebook.gif" />
<script type="text/javascript" src="shtm/gpsnlsize004P.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.20&key=AIzaSyCyfxAZpisuWRldwu11llaylYDeWdOK700&sensor=false&libraries=places"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="jqueryslidemenu002.js"></script>
<script type="text/javascript" src="adaptstyle001.js"></script>
<script type="text/javascript" src="shtm/gpsnlnp008P.js"></script>
<script type="text/javascript" src="shtm/gpsnlcommon001P.js"></script>
<script type="text/javascript">
//<![CDATA[

var mapzoom;
var maptype;
var markericon="gmap2/markerGPS.png";

var osmMapType = new google.maps.ImageMapType({
	getTileUrl: function(coord, zoom) {
		return "http://tile.openstreetmap.org/" +
		zoom + "/" + coord.x + "/" + coord.y + ".png";
	},
	tileSize: new google.maps.Size(256, 256),
	isPng: true,
	alt: "OpenStreetMap layer",
	name: "OSM",
	maxZoom: 19
});
var otmMapType = new google.maps.ImageMapType({
	getTileUrl: function(coord, zoom) {
		return "https://tile.thunderforest.com/outdoors/" +
		zoom + "/" + coord.x + "/" + coord.y + ".png?apikey=2c58956a5ed84a97ae925f3ad3740261";
	},
	tileSize: new google.maps.Size(256, 256),
	isPng: true,
	alt: "Outdoors layer",
	name: "OTM",
	maxZoom: 18
});
var ocmMapType = new google.maps.ImageMapType({
	getTileUrl: function(coord, zoom) {
		return "https://tile.thunderforest.com/cycle/" +
		zoom + "/" + coord.x + "/" + coord.y + ".png?apikey=2c58956a5ed84a97ae925f3ad3740261";
	},
	tileSize: new google.maps.Size(256, 256),
	isPng: true,
	alt: "OpenCycleMap layer",
	name: "OCM",
	maxZoom: 18
});

function ga_naar_toon_kaart_mijn_locatie () {
map_width = document.getElementById("width").value;
map_height = document.getElementById("height").value;
label = document.getElementById("naam").value;
window_width = parseInt (map_width)+15;
window_height = parseInt (map_height)+90;
myUrl = url_toon_kaart_mijn_locatie_php+"?lat="+latitude+"&lng="+longitude+"&w="+map_width+"&h="+map_height+"&mt="+maptype+"&z="+map.getZoom()+"&lab="+label;
//window.location.href = myUrl;
myWindowChar = "width="+window_width+", height="+window_height+",toolbar=0,status=0,scrollbars=0,resizable=1";
winNew=window.open(myUrl,"", myWindowChar);
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
			alert(txt_code_is_geselecteerd);
		}
	}
}

function adaptLink() {
    newlink=eval("document.getElementById('linkanchor')");
    newlink.childNodes[0].nodeValue=newtext=document.getElementById("linktext").value;
	updateCode();
}


function limitWidth() {
if (parseInt (document.getElementById('width').value) > 800) {
	document.getElementById('width').value = 800;
} else if (parseInt (document.getElementById('width').value) < 300){
	document.getElementById('width').value = 300;
}
updateCode();
}

function limitHeight() {
if (parseInt (document.getElementById('height').value) > 800) {
	document.getElementById('height').value = 800;
} else if (parseInt (document.getElementById('height').value) < 300){
	document.getElementById('height').value = 300;
}
updateCode();
}

function updateCode() {
		map_width = document.getElementById("width").value;
		map_height = document.getElementById("height").value;
		link_text = document.getElementById("linktext").value;
		name = document.getElementById("naam").value;
		name = name.replace (/\"/g, '' );
		name = name.replace (/\'/g, '' );
		document.getElementById("naam").value = name;
		window_width = parseInt (map_width)+5;
		window_height = parseInt (map_height)+80;
mycode = txt_mycode_deel1;
mycode = mycode +'<a href="#" onclick="javascript:'+js_mijnlocatie+'('+(Math.round(latitude*100000.0)/100000.0)+','+(Math.round(longitude*100000.0)/100000.0)+','+map_width+','+map_height+',\''+maptype+'\','+map.getZoom()+',\''+name+'\'); return false;">';
mycode = mycode + link_text + "</a>\n";		

		document.getElementById('code').value = mycode;
}

function updateInfo(point) {
		latitude = point.lat().toFixed(5);
		longitude = point.lng().toFixed(5);
		updateCode();
}


var map;
var points = [];

var localgeocoder = new google.maps.Geocoder();

function showLocalAddress(adresstring) {
localgeocoder.geocode( { 'address': adresstring}, function(results, status) {       
	if (status == google.maps.GeocoderStatus.OK) { 
		mymarker.setMap(null); 
		mymarker = new google.maps.Marker({position:results[0].geometry.location, icon:markericon, draggable:true});
		mymarker.setMap(map);
		updateInfo (results[0].geometry.location);	
		map.panTo(results[0].geometry.location);
	} else {         
		alert(txt_probleem_met_ingevoerde_locatie);
		document.getElementById('adres').value="";
	}     
}); 					   
}


function handleCookiesLocal () {
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

}



function load() {
		handleCookiesLocal (); 
		readCookies ();// zoom & maptype
		var point = new google.maps.LatLng(latitude, longitude); //alert (point);
		maptype = readCookie('Cmaptype')
		if (maptype==null) {
			maptype='roadmap';
			createCookie('Cmaptype','roadmap',1000);
		}
		var myOptions = {zoom: parseInt(mapzoom),
						center: point,       
  	  			 		mapTypeId: maptype, // from cookie
						panControl: false,
						draggableCursor: 'crosshair',
						streetViewControl: true,
						zoomControl: true,
      					zoomControlOptions: {
        					style: google.maps.ZoomControlStyle.SMALL
      					},
						scrollwheel: true,
  	  			  		mapTypeControlOptions: {
  	  	 	 	  		mapTypeIds: ['OCM','OTM','OSM', google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID , google.maps.MapTypeId.TERRAIN]
  	  	  				}
		};    
				
		map = new google.maps.Map(document.getElementById("map"),myOptions);
map.mapTypes.set('OCM',ocmMapType);
map.mapTypes.set('OTM',otmMapType);
map.mapTypes.set('OSM',osmMapType);

		mymarker = new google.maps.Marker({position:point, icon:markericon, draggable:true});
		google.maps.event.addListener(mymarker, "dragend", function() {
			point=mymarker.getPosition();
			map.panTo(point);
			updateInfo(point);
		});

		mymarker.setMap(map);

		google.maps.event.addListener(map, "click", function(event) {
			mymarker.setMap(null);
			point=event.latLng; 
			mymarker = new google.maps.Marker({position:point, icon:markericon, draggable:true});
			google.maps.event.addListener(mymarker, "dragend", function() {
				point=mymarker.getPosition();
				map.panTo(point);
				updateInfo(point);
			});

			mymarker.setMap(map);
			updateInfo (point);	
		});		
		google.maps.event.addListener(map,'maptypeid_changed',function(){ 
				createCookie('Cmaptype',map.getMapTypeId() ,1000); 
				maptype=map.getMapTypeId();
				updateCode();
				onMapTypeIdChanged();
		});
		google.maps.event.addListener(map, 'zoom_changed', function() {
			zoom = map.getZoom ();
			createCookie('Czoom',zoom ,1000); 
			updateCode();
		});		

var adresinput = document.getElementById('adres');
var autocomplete = new google.maps.places.Autocomplete(adresinput);
autocomplete.bindTo('bounds', map);

google.maps.event.addListener(autocomplete, 'place_changed', function() {
	var place = autocomplete.getPlace();
});	

		updateCode();


copyrightDiv = document.createElement("div")
copyrightDiv.id = "map-copyright"
copyrightDiv.style.fontSize = "11px"
copyrightDiv.style.fontFamily = "Arial, sans-serif"
copyrightDiv.style.margin = "0 2px 2px 0"
copyrightDiv.style.whiteSpace = "nowrap"
copyrightDiv.style.backgroundColor = "#FFF";
map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(copyrightDiv)

copyrights = {}
copyrights["OCM"] = "Maps © <a href=\"http://www.thunderforest.com\">Thunderforest</a>, Data © <a href=\"http://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributers"
copyrights["OSM"] = "© <a target=\"_blank\" href=\"http://www.openstreetmap.org/\">OpenStreetMap</a> contributers"
copyrights["OTM"] = "Maps © <a href=\"http://www.thunderforest.com\">Thunderforest</a>, Data © <a href=\"http://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributers"

function onMapTypeIdChanged()
{
    newMapType = map.getMapTypeId();

    copyrightDiv = document.getElementById("map-copyright");
    if(newMapType in copyrights)
        copyrightDiv.innerHTML = copyrights[newMapType];
    else
        copyrightDiv.innerHTML = "";
}

setTimeout(onMapTypeIdChanged, 500);



     	}


var adsyes=true;		
var adsno=false;		
		   
$(document).ready(function() {
	updateMiddleSize();
	if (adsno){adaptstyle();}
});

window.onresize=function(){updateMiddleSize()};


//]]>
</script>

</head>
<body onLoad="load()">
<div id="logo">
<a href="http://www.gpscoordinates.eu" title="go to homepage of gpscoordinates.eu"><img src="several/logo-gpscoordinates.eu.png" alt="logo gpscoordinates.eu" width="190" height="22" /></a>
</div>
<div id="topmenu">
<p style="padding: 5px;">
<a href="login.php?ref=/link-map-my-location.php">log in</a> | <a href="adsfree-recommend.php">adsfree</a> | <a href="privacy.php">privacy</a> | <a href="disclaimer.php">disclaimer</a> | <a href="conditions.php">conditions</a> | <a href="contact.php">contact</a> | <a href="feedback.php">feedback</a> | <a href="links.php">links</a> | <a href="faq.php">FAQ</a> | <a href="help.php">help</a> | <a href="http://www.gpscoordinaten.nl">nederlandse versie</a></p>
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
<span class="smallfontstrong">
Make map
</span></div>
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
  <div id="middle" style="height:780px; padding:5px;">

<div id="maphead">
<table width="100%"><tr><td></td>
<h2 style="color:#008080;">Create in 4 steps a link to a personal map with own location</h2></tr></table>
<table cellpadding="1" cellspacing="1"><tr><td style="width:460px" valign="top"><div id="map" style="width:450px; height:450px"></div></td>
<td valign="top">
	<form action="" onSubmit="showLocalAddress(this.adres.value); return false" name="mygeo">
	<table cellpadding="1" cellspacing="0">
	<tr><td><span class="selected10b">Step 1</span> <strong> Determine location</strong><br />
	<span class="color7">Fill in address, city, country or company and push 'Go to'-button to get close to the desired location. Click on the map or draw marker to adjust location.</span></td></tr>
	<tr><td>
<input type="text" size="30" name="adres" id="adres" value="" onClick="this.value=''; return false" />
	</td></tr>
	<tr><td>
	<input type="submit" value="Go to" class="button" alt="Go to location"  title="Go to location" /> <input type="reset" value="X" class="button" alt="Reset" /></td></tr>
</table>
</form>	
	<table cellpadding="1" cellspacing="0">
	<tr><td colspan="2"><span class="selected10b"><br />Step 2</span> <strong>Subject, text and size</strong><br />
	<span class="color7"></span>Location subject, text to be clicked on, mapsize.</span></td></tr>
	<tr><td>subject:</td><td><input name="naam" id="naam" value="my location" size="20" maxlength="50"  onblur="updateCode();"/></td></tr>
	<tr><td>text link:</td><td><input name="linktext" id="linktext" value="click here for the map" size="20" maxlength="50"  onblur="adaptLink();"/></td></tr>
	<tr><td>width:</td><td><input name="width" id="width" value="450" size="3" maxlength="3" onBlur="limitWidth();" class="normal8" />pixels</td></tr>

	<tr><td>height:</td><td><input name="height" id="height" value="450"  size="3" maxlength="3" onBlur="limitHeight();" class="normal8" />pixels</td></tr>
	<tr><td colspan="2"><span class="selected10b"><br />Step 3</span> <strong>Check the result</strong><br />
	<span class="color7">Click on link below, to check the result.</span></td></tr>
	<tr><td colspan="2"><a href="show-map-my-location.php" onClick="javascript:ga_naar_toon_kaart_mijn_locatie(); return false;" id="linkanchor" name="linkanchor">click here for the map</a></td></tr>
	<tr><td colspan="2"><span class="selected10b"><br />Step 4</span> <strong>Copy code</strong><br />
	<span class="color7">Read the <a href="conditions.php">conditions</a> to use a link.<br />
	Select code and copy code to own website.</span></td></tr>
	<tr><td colspan="2"><a href="#" onClick="javascript:selectcode(document.getElementById('code')); return false;" id="linkanchor" name="linkanchor"></a></a></td></tr></table>
</td>
</tr>
<tr><td colspan="2">
<textarea name="code" id="code" rows="4"  class="normal8" readonly style="background-color:#CCCCCC; border:thin; width:750px">
</textarea>
</td></tr>
<tr><td colspan="2">
<span class="selected10b">Additional step?</span> <strong><a href="add-poi.php">Add your location to this website as Point of Interest</a></strong><br />
	<span class="color7">On this website Points of Interest are collected. If your location is in one or more of the categories mountains, buildings, nature, recreation, sports, holidays, traffic or companies, you can add the location as Point of Interest (POI) to this website. Read <a href="conditions.php">conditions</a> to add Points of Interest.</span></td></tr>



</table>

</div>

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

