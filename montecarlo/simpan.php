<?php
$con = mysqli_connect('localhost', 'root', '', 'penjualan') or die(mysqli_error());
session_start();
if(isset($_POST['simpan'])) {
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];
	$jumlah = $_POST['jumlah'];
	$sql = mysqli_query($con, "INSERT INTO data_penjualan VALUES ('$bulan', '$tahun', '$jumlah')") or die (mysqli_error($con));
	if($sql) {
		echo "<script>alert('Berhasil menambahkan data'); window.location='./';</script>";
	}
}
header("location:frekuensi.php");
?>