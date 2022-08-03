<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list-alt"></span> List Items</h3>
<div>
<button data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Add Stock</button>
</div>
<div>
<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-outline-danger"><i class='feather icon-printer'></i></a>
</div>
 <?php 
$periksa=mysqli_query($koneksi,"select * from barang where jumlah <=3");
while($q=mysqli_fetch_array($periksa)){	
	if($q['jumlah']<=3){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>".$q['nama']."</a> yang tersisa ".$q['jumlah']." . silahkan pesan lagi !!</div>";	
	}
}
?>
<table class="table table-striped">
	<tr>
		<th>No</th>
		<th class="col-md-10">Nama Barang</th>
		<th>Harga Beli</th>
		<th>Harga Jual</th>
		<th>Jumlah</th>
		<th>Action</th>
	</tr>
	<?php
	$brg=mysqli_query($koneksi, "select * from barang");
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>Rp.<?php echo number_format($b['modal']) ?>,-</td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
			<td><?php echo $b['jumlah'] ?></td>
			<td>
				<a href="det_barang.php?id=<?php echo $b['id']; ?>" class="btn btn-info"><i class="feather icon-eye"></i></a>
				<a href="edit.php?id=<?php echo $b['id']; ?>" class="btn btn-warning"><i class="feather icon-edit"></i></a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $b['id']; ?>' }" class="btn  btn-danger"><i class="feather icon-trash"></i></a>
			</td>
		</tr>		
		<?php 
	}
	?>
	<tr>
		<td colspan="5"><b>Total Modal</b></td>
		<td>			
		<?php 
			$x=mysqli_query($koneksi, "select sum(modal*jumlah) as total from barang");	
			$xx=mysqli_fetch_array($x);			
			echo "<b> Rp.". number_format($xx['total']).",-</b>";		
		?>
		</td>
	</tr>
</table>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add New Items</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="tmb_brg_act.php" method="post">
					<div class="form-group">
						<label>Nama Barang</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Barang ..">
					</div>
					<div class="form-group">
						<label>Jenis</label>
						<input name="jenis" type="text" class="form-control" placeholder="Jenis Barang ..">
					</div>
					<div class="form-group">
						<label>Suplier</label>
						<input name="suplier" type="text" class="form-control" placeholder="Suplier ..">
					</div>
					<div class="form-group">
						<label>Harga Modal</label>
						<input name="modal" type="text" class="form-control" placeholder="Modal per unit">
					</div>	
					<div class="form-group">
						<label>Harga Jual</label>
						<input name="harga" type="text" class="form-control" placeholder="Harga Jual per unit">
					</div>	
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
					</div>																	

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
include 'footer.php';

?>