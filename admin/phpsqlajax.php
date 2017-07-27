<?php
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// mengkoneksikan pada database

$url="localhost";
$username="root";
$password="";
$database = "peta" ;

$connection=mysql_connect ($url, $username, $password);
if (!$connection) {
die('Not connected : ' . mysql_error());
}

$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
die ('Can\'t use db : ' . mysql_error());
}
// menampilkan semua yang ada pada tabel markers
$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);
if (!$result) {
die('Invalid query: ' . mysql_error());
}
header("Content-type: text/xml");

echo '<markers>';

while ($row = @mysql_fetch_assoc($result)){

echo '<marker ';
echo 'nama="' . parseToXML($row['nama']) . '" ';
echo 'alamat="' . parseToXML($row['alamat']) . '" ';
echo 'lat="' . $row['lat'] . '" ';
echo 'lng="' . $row['lng'] . '" ';
echo 'tipe="' . $row['tipe'] . '" ';
echo '/>';
}

echo '</markers>';
?>