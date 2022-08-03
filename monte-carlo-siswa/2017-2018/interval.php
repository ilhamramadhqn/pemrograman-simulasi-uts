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
                                <li class="list-inline-item">Langkah 4 - Interval Angka</li>
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

    

    <!-- DATA TABLE-->
    <form action="" method="post">
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-1">
                    <h3 class="title-5 m-b-35">Interval Angka</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left"></div>
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" type="submit" name="simpan-interval">
                                <i class="zmdi zmdi-plus"></i>Simpan Interval</button>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th rowspan="2"> # </th>
                                    <th rowspan="2">Bulan</th>
                                    <th rowspan="2">Frekuensi</th>
                                    <th rowspan="2">Probabilitas</th>
                                    <th rowspan="2">probabilitas Kumulatif</th>
                                    <th colspan="2">Interval</th>
                                </tr>
                                <tr>
                                    <th>Awal</th>
                                    <th>Akhir</th>
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
                                    <td><?= $sql['nama_bulan'] ?></td>
                                    <td><?= $sql['kehadiran'] ?><input type="hidden" name="kehadiran-<?= $no ?>" value="<?= $sql['kehadiran'] ?>"></td>
                                    <td><?= $prob = round($sql['kehadiran'] / $total['total'], 2) ?></td>
                                    <td><?= @$probkum += $prob  ?></td>
                                    <td><?php if ( $no == 1 ) { $awal = 1; } else { $awal = $akhiratas + 1; } ?><?= $awal ?><input type="hidden" name="awal-ke-<?= $no ?>" value="<?= $awal ?>"></td>
                                    <td><?= $akhir = $probkum * 100 ?><input type="hidden" name="akhir-ke-<?= $no ?>" value="<?= $akhir ?>"></td>
                                </tr>
                                <?php $akhiratas = $akhir ?>
                                <?php $no++ ?>
                                <?php @$jmlfreq += $sql['kehadiran'] ?>
                                <?php @$jmlprob  += $prob ?>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Jumlah</td>
                                    <td><?= number_format($jmlfreq) ?></td>
                                    <td><?= $jmlprob ?></td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                </tr>
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

<?php
if ( isset($_POST['simpan-interval']) ) {

    mysqli_query($con, "DELETE FROM range2016_2017") or die(mysqli_error($con));

    $jumlah = $_POST['jumlah'];
    for ($i=1; $i <= $jumlah; $i++) { 
        $kehadiran = $_POST['kehadiran-'.$i];
        $awal       = $_POST['awal-ke-'.$i];
        $akhir      = $_POST['akhir-ke-'.$i];

        mysqli_query($con, "INSERT INTO range2016_2017 (kehadiran, awal, akhir) VALUES ('$kehadiran', '$awal', '$akhir')") or die(mysqli_error($con));

        
    }

    $_SESSION['random-number'] = "OKE";

    echo "
    <script>
    window.location='home.php?p=interval'
    </script>
    ";
}
?>

