<?php

function tanggal_indonesia($tgl, $tampil_hari = true)
{
    $nama_hari = array(
        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'
    );

    $nama_bulan = array(
        1 =>
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );

    // format tanggal php
    //  2021-11-26

    $tahun = substr($tgl, 0, 4);
    $bulan = $nama_bulan[(int) substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $text = '';

    if ($tampil_hari) {
        $urutan_hari = date('w', mktime(0, 0, 0, substr($tgl, 5, 2), $tanggal, $tahun));
        $hari = $nama_hari[$urutan_hari];
        $text .= "$hari, $tanggal $bulan $tahun";
    } else {
        $text .= "$tanggal $bulan $tahun";
    }
    return $text;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Siakad | Print Absensi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">


    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css" media="screen"></style>

    <style type="text/css" media="print">
        /* @page {size:landscape}  */
        body {
            page-break-before: avoid;
            width: 100%;
            height: 100%;
            zoom: 100%
        }
    </style>
</head>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-file-o"></i> <?= $title ?>
                    </h2>
                </div>
            </div>

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-6 table-responsive" style="margin-bottom: 10px;">
                    <table class=" table-striped">
                        <thead>

                            <tr>
                                <td width="100">Program Studi</td>
                                <td width="20">:</td>
                                <td><?= $detailJadwal['prodi'] ?></td>
                            </tr>
                            <tr>
                                <td>Fakultas</td>
                                <td>:</td>
                                <td><?= $detailJadwal['fakultas'] ?></td>
                            </tr>
                            <tr>
                                <td>Kode</td>
                                <td>:</td>
                                <td><?= $detailJadwal['kd_makul'] ?></td>
                            </tr>

                        </thead>
                    </table>
                </div>

                <div class="col-xs-6 table-responsive">
                    <table class=" table-striped">
                        <tr>
                            <td width="100">Mata Kuliah</td>
                            <td width="20">:</td>
                            <td><?= $detailJadwal['makul'] ?></td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>:</td>
                            <td><?= $detailJadwal['hari'] . ', ' . $detailJadwal['waktu'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Dosen</td>
                            <td>:</td>
                            <td><?= $detailJadwal['nama_dosen'] ?></td>
                        </tr>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered">
                        <thead class="label-success">

                            <tr>
                                <th class="text-center" rowspan="2">NO</th>
                                <th class="text-center" rowspan="2" width="150">NIM</th>
                                <th class="text-center" rowspan="2" width="200">Mahasiswa</th>
                                <th class="text-center" colspan="6">Nilai</th>
                            </tr>
                            <tr>
                                <th class="text-center">Absensi </th>
                                <th class="text-center" width="100">Tugas </th>
                                <th class="text-center" width="100">UTS </th>
                                <th class="text-center" width="100">UAS </th>
                                <th class="text-center">NA <br> (15%+15%+30%+40%)</th>
                                <th class="text-center">Huruf</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1;
                            foreach ($mhs as $dm) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td class="text-center"><?= $dm['nim'] ?></td>
                                    <td><?= $dm['nama_mhs'] ?></td>
                                    <td class="text-center">
                                        <?php
                                        $absen = ($dm['p1'] + $dm['p2'] + $dm['p3'] + $dm['p4'] + $dm['p5'] + $dm['p6'] + $dm['p7'] + $dm['p8'] + $dm['p9'] + $dm['p10'] + $dm['p11'] + $dm['p12'] + $dm['p13'] + $dm['p14'] + $dm['p15'] + $dm['p16'] + $dm['p17'] + $dm['p18']) / 36 * 100;

                                        echo number_format($absen, 0);

                                        ?>
                                    </td>
                                    <td class="text-center"><?= $dm['nilai_tugas'] ?></td>
                                    <td class="text-center"><?= $dm['nilai_uts'] ?></td>
                                    <td class="text-center"><?= $dm['nilai_uas'] ?></td>
                                    <td class="text-center"><?= $dm['nilai_akhir'] ?></td>
                                    <td class="text-center"><?= $dm['nilai_huruf'] ?></td>
                                </tr>

                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-4">

                </div>
                <div class="col-xs-4">

                </div>
                <div class="col-xs-4">
                    Pekalongan, <?= tanggal_indonesia(date('Y-m-d'), false) ?><br>
                    Dosen PA <br>
                    <br>
                    <br>
                    <?= $detailJadwal['nama_dosen'] ?>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>