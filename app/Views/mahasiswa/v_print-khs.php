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
    <title>Siakad | Print KHS</title>
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
            <div class="row invoice-info" style="margin-bottom: 10px;">
                <table class=" table-striped">
                    <thead>
                        <tr>
                            <td rowspan="7"><img src="<?= base_url('fotomhs/' . $mhs['foto_mhs']) ?>" width="120" style="padding: 10px;"></td>
                            <th width="150">Tahun Akademik</th>
                            <td width="20">:</td>
                            <td><?= $ta['ta'] . ' - Semester ' . $ta['semester'] ?></td>
                            <td rowspan="7"></td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td><?= $mhs['nim'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Mahasiswa</td>
                            <td>:</td>
                            <td><?= $mhs['nama_mhs'] ?></td>
                        </tr>
                        <tr>
                            <td>Fakultas</td>
                            <td>:</td>
                            <td><?= $mhs['fakultas'] ?></td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>:</td>
                            <td><?= $mhs['prodi'] ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?= $mhs['nama_kelas'] . ' - ' . $mhs['th_angkatan'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Dosen</td>
                            <td>:</td>
                            <td><?= $mhs['nama_dosen'] ?></td>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">

                    <table class="table table-striped table-bordered">
                        <thead class="label-success">
                            <tr>
                                <th width="30" class="text-center">No</th>
                                <th class="text-center">Kode</th>
                                <th class="text-center">Mata Kuliah</th>
                                <th class="text-center">SKS</th>
                                <th class="text-center">SMT</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            $sks = 0;
                            $grand_tot_bobot = 0;

                            foreach ($dataMakul as $dm) {

                                // jumlah sks
                                $sks = $sks + $dm['sks'];

                                // jumlah sks
                                $tot_bobot = $dm['sks'] * $dm['bobot'];
                                $grand_tot_bobot = $grand_tot_bobot + $tot_bobot;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td class="text-center"><?= $dm['kd_makul'] ?></td>
                                    <td>
                                        <?= $dm['makul'] ?>
                                    </td>
                                    <td class="text-center"><?= $dm['sks'] ?></td>
                                    <td class="text-center"><?= $dm['smt'] ?></td>
                                    <td class="text-center"><?= $dm['nilai_huruf'] ?></td>
                                    <td class="text-center"><?= $dm['bobot'] ?></td>

                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-4">
                    <h5><strong>Jumlah SKS : <?= $sks ?></strong> </h5>
                    <h5><strong>IP : <?= (empty($dataMakul) ? '0' : number_format($grand_tot_bobot / $sks, 2)) ?></strong> </h5>

                </div>
                <div class="col-xs-4">

                </div>
                <div class="col-xs-4">
                    Pekalongan, <?= tanggal_indonesia(date('Y-m-d'), false) ?><br>
                    Dosen PA <br>
                    <br>
                    <br>
                    <?= $mhs['nama_dosen'] ?>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>