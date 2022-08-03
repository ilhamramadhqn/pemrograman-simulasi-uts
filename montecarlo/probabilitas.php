<?php include "../header.php"; ?>
<?php
$con = mysqli_connect('localhost', 'root', '', 'penjualan') or die(mysqli_error());
session_start();
?>
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<h5>Data</h5>
				<div class="row">
					<div class="col-md-12 table-responsive">
					<button data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus">Input Data</span></button>
					<button data-toggle="modal" class="btn btn-danger col-md-2"><span class="glyphicon glyphicon-plus"><i class='feather icon-printer'></i> Import Data</span></button>
					<br>
					<br>	
					<table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th> # </th>
									<th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Frekuensi</th>
                                    <th>Probabilitas</th>
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
                                    <td><?= $sql['nama_bulan'] ?></td>
                                    <td><?= $sql['penjualan'] ?></td>
                                    <td><?= $prob = round($sql['penjualan'] / $total['total'], 2) ?></td>
                                </tr>
                                <?php $no++ ?>
                                <?php @$jmlfreq += $sql['penjualan'] ?>
                                <?php @$jmlprob  += $prob ?>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Jumlah</td>
                                    <td><?= number_format($jmlfreq) ?></td>
                                    <td><?= $jmlprob ?></td>
                                </tr>
                            </tfoot>
                        </table>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Input Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="simpan.php" method="post">
					<div class="form-group">
						<label>Bulan</label>
						<select name="bulan" class="form-control" required>
							<option value=""></option>
							<?php
							for ($i == 1; $i <= 9; $i++) {
								echo "<option value='0".$i."'>0".$i."</option>";
							}
							?>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<select name="tahun" class="form-control" required>
							<option value=""></option>
							<?php
							$now = date('Y');
							for ($i = $now; $i >= 2000; $i--) {
								echo "<option value='".$i."'>".$i."</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Penjualan</label>
						<input name="jumlah" type="number" class="form-control">
					</div>																

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
					<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>		


<?php include "../footer.php"; ?>