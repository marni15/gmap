<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"maps");

//fungsi format rupiah 
/**function format_rupiah($rp) {
	$hasil = "Rp." . number_format($rp, 0, "", ".") . ",00";
	return $hasil;
    }**/
?>