<?php 
if ( !isset($_POST['generate']) && !isset($_POST['proses']) ) {
    echo "
    <script>
    window.location='home.php?p=generate'
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

<div class="page-content--bgf7">
    <!-- BREADCRUMB-->
    <section class="au-breadcrumb2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="#">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Langkah 4 - Generate Random Number</li>
                            </ul>
                        </div>
                        <form class="au-form-icon--sm" action="" method="post">
                            <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for datas &amp; reports...">
                            <button class="au-btn--submit2" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BREADCRUMB-->

    <!-- WELCOME-->
    <!-- <section class="welcome p-t-10">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title-4">Welcome back
                        <span>John!</span>
                    </h1>
                    <hr class="line-seprate">
                </div>
            </div>
        </div>
    </section> -->
    <!-- END WELCOME-->

    

    <form action="" method="post">
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <h3 class="title-5 m-b-35">Interval Angka</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left"></div>
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" type="submit" name="proses">
                                <i class="zmdi zmdi-plus"></i>Proses</button>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th rowspan="2"> # </th>
                                    <th rowspan="2">Bulan</th>
                                    <th rowspan="2">Random Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totals = mysqli_query($con, "SELECT SUM(kehadiran) AS total FROM absen2016_2017") or die(mysqli_error($con));
                                $total = mysqli_fetch_array($totals);
                                $no = 1;
                                $sqls = mysqli_query($con, "SELECT * FROM absen2016_2017 a INNER JOIN bulan b ON a.kd_bulan = b.kd_bulan") or die(mysqli_error($con));
                                foreach ($sqls as $sql) { ?>
                                <tr class="spacer"></tr>
                                <tr class="tr-shadow">
                                    <td><?= $no ?></td>
                                    <td><?= $sql['nama_bulan'] ?><input type="hidden" name="kode-bulan-<?= $no ?>" id="" value="<?= $sql['kd_bulan'] ?>"></td>
                                    <td><?= $r = ($z * $a + $c ) % $m ?><input type="hidden" name="random-ke-<?= $no ?>" value="<?= $r ?>"></td>
                                </tr>
                                <?php $no++ ?>
                                <?php $z = $r ?>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <th> # </th>
                                <th>Bulan</th>
                                <th>Random Number</th>
                            </tfoot>
                        </table>
                        <input type="hidden" name="jumlah" value="<?= $no - 1 ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
    <!-- END DATA TABLE-->
<?php } ?>


    <?php
    if ( isset($_POST['proses']) ) {

        mysqli_query($con, "DELETE FROM acak2017_2018") or die(mysqli_error($con)); 

        $jumlah = $_POST['jumlah'];
        for ($i=1; $i <= $jumlah ; $i++) { 
            $kode_bulan    = $_POST['kode-bulan-'.$i];
            $random_number = $_POST['random-ke-'.$i];

            mysqli_query($con, "INSERT INTO acak2017_2018 ( kd_bulan, bilangan_acak ) VALUES ('$kode_bulan', '$random_number')") or die(mysqli_error($con));
        }

    $_SESSION['hasil'] = "OK";

    echo "
    <script>
    window.location='home.php?p=hasil-simulasi'
    </script>
    ";


    }

?>






