<?php
if ( empty($_SESSION['hasil']) ) {

} else { ?>

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
                                <li class="list-inline-item">Hasil Simulasi</li>
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
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <h3 class="title-5 m-b-35">Hasil Simulasi</h3>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th> # </th>
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
                            $sqls = mysqli_query($con, "SELECT b.nama_bulan, a.bilangan_acak, aa.kehadiran FROM bulan b, acak2016_2017 a, absen2017_2018 aa WHERE b.kd_bulan = a.kd_bulan AND b.kd_bulan = aa.kd_bulan") or die(mysqli_error($con));
                            foreach ($sqls as $sql) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $sql['nama_bulan'] ?></td>
                                    <td><?= $angka = $sql['bilangan_acak'] ?></td>
                                    <td>
                                        <?php
                                        $ranges = mysqli_query($con, "SELECT * FROM range2016_2017") or die(mysqli_error($con));
                                        foreach ($ranges as $range) {
                                            if ( $angka >= $range['awal'] && $angka <= $range['akhir'] ) {
                                                $simulasi =  $range['kehadiran'];
                                            }
                                        }
                                        ?>
                                    <?= $simulasi ?>
                                    </td>
                                    <td><?= $real = $sql['kehadiran'] ?></td>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END DATA TABLE-->

<?php } ?>