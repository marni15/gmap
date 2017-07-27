<?php
include "../conn.php";
$id = $_GET['kd'];

$query = mysqli_query($con, "DELETE FROM data_lbs WHERE id='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'lbs.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'lbs.php'</script>";	
}
?>