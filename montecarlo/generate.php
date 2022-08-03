<?php include "../header.php"; ?>
<?php
$con = mysqli_connect('localhost', 'root', '', 'penjualan') or die(mysqli_error());
session_start();
?>
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<h5>Generate Random Number</h5>
				<div class="row">
					<div class="col-md-12 table-responsive">
					<br>
					<br>	
					<!-- DATA TABLE-->
    <form action="random-number.php" method="post">
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card">
                        <div class="card-header">Multiplicative Mixed Congruent Method</div>
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="a" class="control-label mb-1">a</label>
                                    <input id="a" name="a" type="number" class="form-control" value="19">
                                </div>
                                <div class="form-group has-success">
                                    <label for="z" class="control-label mb-1">z</label>
                                    <input id="z" name="z" type="number" class="form-control" value="20">
                                </div>
                                <div class="form-group">
                                    <label for="c" class="control-label mb-1">c</label>
                                    <input id="c" name="c" type="number" class="form-control" value="24">
                                </div>
                                <div class="form-group">
                                    <label for="m" class="control-label mb-1">m</label>
                                    <input id="m" name="m" type="number" class="form-control" value="99">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-info btn-block" name="generate">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span>Generate</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
    <!-- END DATA TABLE-->
					</div>
				</div>

			</div>
		</div>
	</div>
</div>	


<?php include "../footer.php"; ?>