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

<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <?php if (session()->get('level') == 1) {  ?>
            <li class="<?= ($title == 'Dashboard') ? "active" : "" ?>"><a href="<?= base_url('admin') ?>">Dashboard</a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= base_url('gedung') ?>">Gedung</a></li>
                    <li><a href="<?= base_url('ruangan') ?>">Ruang Kelas</a></li>
                    <li><a href="<?= base_url('fakultas') ?>">Fakultas</a></li>
                    <li><a href="<?= base_url('prodi') ?>">Program Study</a></li>
                    <li><a href="<?= base_url('ta') ?>">Tahun Akademik</a></li>
                    <li><a href="<?= base_url('makul') ?>">Mata Kuliah</a></li>
                    <li><a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a></li>
                    <li><a href="<?= base_url('dosen') ?>">Dosen</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= base_url('kelas') ?>">Kelas</a></li>
                    <li><a href="<?= base_url('jadwalKuliah') ?>">Jadwal Kuliah</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= base_url('user') ?>">User</a></li>
                    <li><a href="<?= base_url('ta/setting') ?>">Tahun Akademik</a></li>
                </ul>
            </li>

            <li><a href="#">About</a></li>
        <?php } else if (session()->get('level') == 2) { ?>
            <li class="<?= ($title == 'Dashboard') ? "active" : "" ?>"><a href="<?= base_url('mhs') ?>">Dashboard</a></li>


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= base_url('krs') ?>">Kartu Rencana Studi (KRS)</a></li>
                    <li><a href="#">KArtu Hasil Studi (KHS)</a></li>
                </ul>
            </li>
        <?php } else if (session()->get('level') == 3) { ?>
            <li class="<?= ($title == 'Dashboard') ? "active" : "" ?>"><a href="<?= base_url('dsn') ?>">Dashboard</a></li>


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Menu 1</a></li>
                    <li><a href="#">Menu 2</a></li>
                </ul>
            </li>
        <?php } ?>
    </ul>
</div>
<!-- /.navbar-collapse -->
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

        <?php if (session()->get('username') == "") { ?>
            <li class="<?= ($title == 'Login') ? "active" : "" ?>"><a href="<?= base_url('auth') ?>"><i class="fa fa-sign-in"></i> &nbsp;Login</a></li>

        <?php } else { ?>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <!-- foto dropdown -->
                    <?php if (session()->get('level') == 1) {  ?>
                        <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                    <?php } else if (session()->get('level') == 2) { ?>
                        <img src="<?= base_url('fotomhs/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                    <?php } else if (session()->get('level') == 3) { ?>
                        <img src="<?= base_url('fotodosen/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                    <?php } ?>

                    <span class="hidden-xs"><?= session()->get('nama_user') ?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                        <?php if (session()->get('level') == 1) {  ?>
                            <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
                        <?php } else if (session()->get('level') == 2) { ?>
                            <img src="<?= base_url('fotomhs/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
                        <?php } else if (session()->get('level') == 3) { ?>
                            <img src="<?= base_url('fotodosen/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
                        <?php } ?>



                        <p>
                            <?= session()->get('nama_user') ?> -

                            <?php if (session()->get('level') == 1) { ?>
                                <span>Admin</span>
                            <?php } else if (session()->get('level') == 2) { ?>
                                <span><?= session()->get('username') ?></span>
                            <?php } else if (session()->get('level') == 3) { ?>
                                <span>Dosen</span>
                            <?php } ?>

                            <small><?= tanggal_indonesia(date('Y-m-d')) ?></small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat">Profil</a>
                        </div>
                        <div class="pull-right">
                            <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                        </div>
                    </li>
                </ul>
            </li>

        <?php } ?>
    </ul>
</div>
<!-- /.navbar-custom-menu -->
</div>
<!-- /.container-fluid -->
</nav>
</header>

<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->

        <?php if ($title != 'Home' && $title != 'Login') { ?>
            <section class="content-header">
                <h1>
                    <?= $title ?>
                </h1>

                <?php if ($title == 'Detail Mata Kuliah') { ?>
                    <div class="text-danger">
                        <small><?= $prodi['prodi'] ?></small>
                    </div>
                <?php } else if ($title == 'Jadwal Kuliah' || $title == 'Kartu Rencana Studi (KRS)') { ?>
                    <small><strong>Tahun Akademik : <?= $ta['ta'] . ' - Semester ' . $ta['semester'] ?></strong></small>
                <?php } else if ($title == 'Detail Jadwal') { ?>
                    <small><strong><?= $prodi['prodi'] ?></strong></small>
                <?php } ?>

                <ol class="breadcrumb">
                    <li><a href="#"> Siakad</a></li>
                    <li><a href="#"><?= $title ?></a></li>
                </ol>
            </section>
        <?php } ?>


        <!-- Main content -->
        <section class="content">