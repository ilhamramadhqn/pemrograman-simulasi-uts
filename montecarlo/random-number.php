<?php include "../header.php"; ?>
<?php
$con = mysqli_connect('localhost', 'root', '', 'penjualan') or die(mysqli_error());
session_start();
?>
<?php 
if ( !isset($_POST['generate']) && !isset($_POST['proses']) ) {
    echo "
    <script>
    window.location='generate.php'
    </script>";
    exit;
}

?>

<?php
if ( isset($_POST['generate']) ) {
$a = $_POST['a'];
$z = $_POST['z'];
$m = $_POST['m'];
$c = $_POST['c'];
?>

<form action="" method="post">
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<h5>Data</h5>
				<div class="row">
					<div class="col-md-12 table-responsive">
                    <button data-toggle="modal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus" type="submit" name="proses"><i class='feather icon-plus'></i>Proses</span></button>
					<br>
					<br>	
                    <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th rowspan="2"> # </th>
                                    <th rowspan="2">Tahun</th>
                                    <th rowspan="2">Bulan</th>
                                    <th rowspan="2">Random Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totals = mysqli_query($con, "SELECT SUM(penjualan) AS total FROM data_penjualan") or die(mysqli_error($con));
                                $total = mysqli_fetch_array($totals);
                                $no = 1;
                                $sqls = mysqli_query($con, "SELECT * FROM data_penjualan a INNER JOIN bulan b ON a.kd_bulan = b.kd_bulan") or die(mysqli_error($con));
                                foreach ($sqls as $sql) { ?>
                                <tr class="spacer"></tr>
                                <tr class="tr-shadow">
                                    <td><?= $no ?></td>
                                    <td><?= $sql['tahun'] ?></td>
                                    <td><?= $sql['nama_bulan'] ?><input type="hidden" name="kode-bulan-<?= $no ?>" id="" value="<?= $sql['kd_bulan'] ?>"></td>
                                    <td><?= $r = ($z * $a + $c ) % $m ?><input type="hidden" name="random-ke-<?= $no ?>" value="<?= $r ?>"></td>
                                </tr>
                                <?php $no++ ?>
                                <?php $z = $r ?>
                                <?php } ?>
                            </tbody>
                    </table>
                    <input type="hidden" name="jumlah" value="<?= $no - 1 ?>">
					</div>
				
				</div>

			</div>
		</div>
	</div>
</div>
</form>	
<?php } ?>


    <?php
    if ( isset($_POST['proses']) ) {

        mysqli_query($con, "DELETE FROM penjualan_acak") or die(mysqli_error($con)); 

        $jumlah = $_POST['jumlah'];
        for ($i=1; $i <= $jumlah ; $i++) { 
            $kode_bulan    = $_POST['kode-bulan-'.$i];
            $random_number = $_POST['random-ke-'.$i];

            mysqli_query($con, "INSERT INTO penjualan_acak ( kd_bulan, bilangan_acak ) VALUES ('$kode_bulan', '$random_number')") or die(mysqli_error($con));
        }

    $_SESSION['hasil'] = "OK";

    echo "
    <script>
    window.location='hasil-simulasi.php'
    </script>
    ";


    }

?>
<?php include "../footer.php"; ?>