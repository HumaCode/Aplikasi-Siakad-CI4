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
                        <i class="fa fa-file-o"></i> Cetak Absensi.
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
                    <table class="table table-striped table-bordered text-sm">
                        <thead class="label-success">
                            <tr>
                                <th class="text-center" rowspan="2">NO</th>
                                <th class="text-center" rowspan="2">NIM</th>
                                <th class="text-center" rowspan="2">Mahasiswa</th>
                                <th class="text-center" colspan="18">Pertemuan</th>
                                <th class="text-center" rowspan="2">%</th>
                            </tr>
                            <tr>
                                <th class="text-center">1</th>
                                <th class="text-center">2</th>
                                <th class="text-center">3</th>
                                <th class="text-center">4</th>
                                <th class="text-center">5</th>
                                <th class="text-center">6</th>
                                <th class="text-center">7</th>
                                <th class="text-center">8</th>
                                <th class="text-center">9</th>
                                <th class="text-center">10</th>
                                <th class="text-center">11</th>
                                <th class="text-center">12</th>
                                <th class="text-center">13</th>
                                <th class="text-center">14</th>
                                <th class="text-center">15</th>
                                <th class="text-center">16</th>
                                <th class="text-center">17</th>
                                <th class="text-center">18</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            $sks = 0;
                            foreach ($mhs as $dm) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td class="text-center"><?= $dm['nim'] ?></td>
                                    <td><?= $dm['nama_mhs'] ?></td>
                                    <td class="text-center">
                                        <?php if ($dm['p1'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p1'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p1'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if ($dm['p2'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p2'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p2'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p3'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p3'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p3'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if ($dm['p4'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p4'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p4'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if ($dm['p5'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p5'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p5'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p6'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p6'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p6'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p7'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p7'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p7'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p8'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p8'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p8'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p9'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p9'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p9'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p10'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p10'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p10'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p11'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p11'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p11'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p12'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p12'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p12'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p13'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p13'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p13'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p14'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p14'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p14'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p15'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p15'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p15'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p16'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p16'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p16'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p17'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p17'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p17'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($dm['p18'] == 0) { ?>
                                            <i class="fa fa-times text-danger"></i>
                                        <?php } else if ($dm['p18'] == 1) { ?>
                                            <i class="fa fa-info text-primary"></i>
                                        <?php } else if ($dm['p18'] == 2) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        $absen = ($dm['p1'] + $dm['p2'] + $dm['p3'] + $dm['p4'] + $dm['p5'] + $dm['p6'] + $dm['p7'] + $dm['p8'] + $dm['p9'] + $dm['p10'] + $dm['p11'] + $dm['p12'] + $dm['p13'] + $dm['p14'] + $dm['p15'] + $dm['p16'] + $dm['p17'] + $dm['p18']) / 36 * 100;

                                        echo number_format($absen, 0) . ' %';
                                        ?>
                                    </td>
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