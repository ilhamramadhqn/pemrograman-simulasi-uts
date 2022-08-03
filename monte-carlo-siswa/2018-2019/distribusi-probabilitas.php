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
                                <li class="list-inline-item">Langkah 2 - Distribusi Probabilitas</li>
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
                    <h3 class="title-5 m-b-35">Tabel Distribusi Probabilitas</h3>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th>Bulan</th>
                                    <th>Frekuensi</th>
                                    <th>Probabilitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totals = mysqli_query($con, "SELECT SUM(kehadiran) AS total FROM absen2017_2018") or die(mysqli_error($con));
                                $total = mysqli_fetch_array($totals);
                                $no = 1;
                                $sqls = mysqli_query($con, "SELECT * FROM absen2017_2018 a INNER JOIN bulan b ON a.kd_bulan = b.kd_bulan") or die(mysqli_error($con));
                                foreach ($sqls as $sql) { ?>
                                <tr class="spacer"></tr>
                                <tr class="tr-shadow">
                                    <td><?= $no ?></td>
                                    <td><?= $sql['nama_bulan'] ?></td>
                                    <td><?= $sql['kehadiran'] ?></td>
                                    <td><?= $prob = round($sql['kehadiran'] / $total['total'], 2) ?></td>
                                </tr>
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
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END DATA TABLE-->