<?php

include "../conn.php";

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $id = $_POST['id'];
        $nomor = $_POST['nomor'];
		$alamat= $_POST['alamat'];
		$merk=$_POST['merk'];
        $model = $_POST['model'];
        $type = $_POST['type'];
        $penyulang=$_POST['penyulang'];
        $north=$_POST['north'];
        $east=$_POST['east'];
        $baterai=$_POST['baterai'];
        $ratu_mcb=$_POST['ratu_mcb'];
        $jarak_trafo=$_POST['jarak_trafo'];
        $supply_rtu=$_POST['supply_rtu'];
        $tinggi_panel=$_POST['tinggi_panel'];
        $grounding=$_POST['grounding'];
        $no_kontrak=$_POST['no_kontrak'];
        $kd_rayon=$_POST['kd_rayon'];
        $kode_lbs=$_POST['kode_lbs'];
        $keterangan=$_POST['keterangan'];

	
			$sql= "INSERT INTO data_lbs (id,nomor,alamat,merk,model,type,penyulang,north,east,baterai,ratu_mcb,jarak_trafo,supply_rtu,tinggi_panel,grounding,no_kontrak,kd_rayon,kode_lbs,keterangan) VALUES ('$id','$nomor','$alamat','$merk','$model','$type','$penyulang','$north','$east','$baterai','$ratu_mcb','$jarak_trafo','$supply_rtu','$tinggi_panel','$grounding','$no_kontrak','$kd_rayon','$kode_lbs','$keterangan')";
			$res=mysqli_query($con, $sql) or die (mysqli_error());
            echo "<h3><a href='input-lbs.php'> Input Lagi</a></h3>";
            echo "<h3><a href='lbs.php'> Data LBS</a></h3>";	   

?>