<?php include "../header.php"; ?>
<?php include "conn.php"; ?>
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<h5>Data</h5>
				<div class="row">
					<div class="col-md-12 table-responsive">
					<button data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus">Input Data</span></button>
					<button data-toggle="modal" data-target="#myPredict" class="btn btn-warning col-md-2"><span class="glyphicon glyphicon-plus">Prediksi</span></button>
					<button data-toggle="modal" class="btn btn-danger col-md-2"><span class="glyphicon glyphicon-plus"><i class='feather icon-printer'></i> Import Data</span></button>
					<a  href="grafik.php" class="btn btn-light col-md-2"><span class="glyphicon glyphicon-plus"><i class='feather icon-printer'></i> Grafik</span></a>
					<br>
					<br>	
						<table class="table table-bordered table-striped" id="tab">
							<thead>
							<tr>
								<th>No.</th>
								<th class="text-center">Tahun Penjualan</th>
								<th class="text-center">Jumlah Promosi</th>
								<th class="text-center">Jumlah Penjualan</th>
								<th class="text-center">X</th>
								<th class="text-center">Y</th>
								<th class="text-center">XX</th>
								<th class="text-center">XY</th>
							</tr>
							<?php
							$sql = mysqli_query($con, "SELECT * FROM penjualan") or die (mysqli_error($con));
							if (mysqli_num_rows($sql) > 0) {
								$x = 0;
								$jumlah_x = 0;
								$jumlah_y = 0;
								$jumlah_xx = 0;
								$jumlah_xy = 0;
								while ($data = mysqli_fetch_array($sql)) {
									$jumlah_x += $data['promosi'];
									$jumlah_y += $data['jumlah_penjualan'];
									$jumlah_xx += ($data['promosi'] * $data['promosi']);
									$jumlah_xy += ($data['promosi'] * $data['jumlah_penjualan']); 
									?>
									<tr>
										<td class="text-center"><?=$x+1;?>.</td>
										<td class="text-center"><?=$data['tahun_penjualan'];?></td>
										<td class="text-center"><?=$data['promosi'];?></td>
										<td class="text-center"><?=$data['jumlah_penjualan'];?></td>
										<td class="text-center"><?=$data['promosi'];?></td>
										<td class="text-center"><?=$data['jumlah_penjualan'];?></td>
										<td class="text-center"><?=$data['promosi'] * $data['promosi'];?></td>
										<td class="text-center"><?=$data['promosi'] * $data['jumlah_penjualan'];?></td>
									</tr>
									<?php
									$x++;
								}
								?>
								<tr>
									<th colspan="4">Jumlah</th>
									<td class="text-center"><?=$jumlah_x;?></td>
									<td class="text-center"><?=$jumlah_y;?></td>
									<td class="text-center"><?=$jumlah_xx;?></td>
									<td class="text-center"><?=$jumlah_xy;?></td>
								</tr>
								<tr>
									<th colspan="4">Rata-rata</th>
									<td class="text-center">
										<?php
										$rata2_x = $jumlah_x / $x;
										echo $rata2_x;
										?>	
									</td>
									<td class="text-center">
										<?php
										$rata2_y = $jumlah_y / $x;
										echo $rata2_y;
										?>	
									</td>
									<td class="text-center">
										<?php
										$rata2_xx = $jumlah_xx / $x;
										echo $rata2_xx;
										?>	
									</td>
									<td class="text-center">
										<?php
										$rata2_xy = $jumlah_xy / $x;
										echo $rata2_xy;
										?>	
									</td>
								</tr>
								<tr>
									<th colspan="4">a</th>
									<td colspan="4">
										<?=
										$b0 = ((($jumlah_y * $jumlah_xx) - ($jumlah_x * $jumlah_xy)) / ($jumlah_xx - ($jumlah_x * $jumlah_x)));
										echo $b0;
										?>
									</td>
								</tr>
								<tr>
									<th colspan="4">b</th>
									<td colspan="4">
										<?=
										$b1 = ($jumlah_xy - (($jumlah_x * $jumlah_y))) / ($jumlah_xx - ($jumlah_x * $jumlah_x));
										echo $b1;
										?>
									</td>
								</tr>
								
								
							<?php
							}
							?>
							</table>
							<div>
							Rumus Regresi Linear :<br>
							<h5>Y = a + b X</h5>
							<?php
							$y = $b0." + ".$b1." X";
							echo "Y = " .$y;
							?>
						</div>

						<?php
						if(isset($_POST['prediksi'])) {
							$prom = $_POST['prom'];
							$prediksi = $b0 + ($b1 * $prom);
							?>
							<div>
								Prediksi <b>PENJUALAN</b> untuk <?=$tahun;?> tahun berikutnya adalah <?=$prediksi;?>
							</div>
						<?php
						}
						?>
						</div>
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
						<label>Promosi</label>
						<input name="promosi" type="number" class="form-control">
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
<!-- modal predict -->
<div id="myPredict" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Input Prediksi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="index.php" method="post">
					<div class="form-group">
						<label>Promosi</label>
						<input name="prom" type="number" class="form-control">
					</div>														
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
					<input type="submit" name="prediksi" class="btn btn-primary" value="Prediksi">
				</div>
			</form>
		</div>
	</div>
</div>	


<?php include "../footer.php"; ?>