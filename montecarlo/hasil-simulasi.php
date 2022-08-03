<?php include "../header.php"; ?>
<?php
$con = mysqli_connect('localhost', 'root', '', 'penjualan') or die(mysqli_error());
session_start();
?>
<?php
if ( empty($_SESSION['hasil']) ) {

} else { ?>
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<h5>Data Montecarlo</h5>
				<div class="row">
				
					<div class="col-md-12 table-responsive">
					<table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th>tahun</th>
                                    <th>Bulan</th>
                                    <th>Random Number</th>
                                    <th>Prediksi</th>
                                    <th>Real</th>
                                    <th>Presentase</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $sqls = mysqli_query($con, "SELECT b.nama_bulan, a.bilangan_acak, aa.penjualan, aa.tahun FROM bulan b, penjualan_acak a, data_penjualan aa WHERE b.kd_bulan = a.kd_bulan AND b.kd_bulan = aa.kd_bulan") or die(mysqli_error($con));
                            foreach ($sqls as $sql) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $sql['tahun'] ?></td>
                                    <td><?= $sql['nama_bulan'] ?></td>
                                    <td><?= $angka = $sql['bilangan_acak'] ?></td>
                                    <td>
                                        <?php
                                        $ranges = mysqli_query($con, "SELECT * FROM range_penjualan") or die(mysqli_error($con));
                                        foreach ($ranges as $range) {
                                            if ( $angka >= $range['awal'] && $angka <= $range['akhir'] ) {
                                                $simulasi =  $range['penjualan'];
                                            }
                                        }
                                        ?>
                                    <?= $simulasi ?>
                                    </td>
                                    <td><?= $real = $sql['penjualan'] ?></td>
                                    <td>
                                    <?php
                                    if ( $real < $simulasi ) { $persen = $real * 100 / $simulasi; } else { $persen = $simulasi * 100 / $real; }
                                    ?>
                                    <?= round($persen, 0) ?> %
                                    </td>
                                </tr>
                            <?php } ?>
                                
                            </tbody>
                            <tfoot>
                                
                            </tfoot>
                        </table>
                        <input type="hidden" name="jumlah" value="<?= $no - 1 ?>">
					</div>
				
				</div>

			</div>
		</div>
	</div>
</div>
<?php } ?>

<?php include "../footer.php"; ?>