<?php
include "conn.php";
if(isset($_POST['simpan'])) {
	$tahun = $_POST['tahun'];
	$promosi = $_POST['promosi'];
	$jumlah = $_POST['jumlah'];
	$sql = mysqli_query($con, "INSERT INTO penjualan VALUES (null, '$tahun', '$promosi', '$jumlah')") or die (mysqli_error($con));
	if($sql) {
		echo "<script>alert('Berhasil menambahkan data'); window.location='./';</script>";
	}
}
header("location:index.php");
?>