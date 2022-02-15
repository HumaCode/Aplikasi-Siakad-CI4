<div class="row table-responsive">
    <table class=" table-striped">
        <thead>
            <tr>
                <td rowspan="7"><img src="<?= base_url('fotomhs/' . $mhs['foto_mhs']) ?>" width="300" style="padding: 10px;"></td>
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


    <button type="button" class="btn btn-warning btn-sm pull-right " style="margin-left: 10px; margin-bottom: 10px;" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> &nbsp;Tambah Mata Kuliah</button>
    <a href="<?= base_url('krs/print') ?>" target="_blank" class="btn btn-info btn-sm pull-right"><i class="fa fa-print"></i> &nbsp;Cetak KRS</a>

    <div class="col-sm-12">

        <!-- flasdata -->
        <?php if (session()->getFlashdata('pesan')) { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                <?= session()->getFlashdata('pesan') ?>
            </div>
        <?php } ?>

        <table class="table table-striped table-bordered">
            <thead class="label-success">
                <tr>
                    <th width="30" class="text-center">No</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">SMT</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Ruangan</th>
                    <th class="text-center">Dosen</th>
                    <th class="text-center">Jam</th>
                    <th class="text-center"><i class="fa fa-certificate"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                $sks = 0;
                foreach ($dataMakul as $dm) {

                    // jumlah sks
                    $sks = $sks + $dm['sks'];
                ?>
                    <tr>
                        <td class="text-center"><?= $i ?></td>
                        <td class="text-center"><?= $dm['kd_makul'] ?></td>
                        <td>
                            <?= $dm['makul'] ?>
                        </td>
                        <td class="text-center"><?= $dm['sks'] ?></td>
                        <td class="text-center"><?= $dm['smt'] ?></td>
                        <td class="text-center"><?= $dm['nama_kelas'] ?></td>
                        <td class="text-center"><?= $dm['ruangan'] ?></td>
                        <td class="text-center"><?= $dm['nama_dosen'] ?></td>
                        <td class="text-center"><?= $dm['hari'] . ', ' . $dm['waktu'] ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $dm['id_krs'] ?>"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>

        <h5><strong>Jumlah SKS : <?= $sks ?></strong> </h5>
    </div>
</div>


<!-- modal tambah -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Daftar mata kuliah yang ditawarkan</h4>
            </div>

            <div class="modal-body">

                <table id="example1" class="table table-bordered table-striped text-sm">
                    <thead class="label-success">
                        <tr>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">SMT</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Dosen</th>
                            <th class="text-center">Jam</th>
                            <th class="text-center">Kuota</th>
                            <th class="text-center"><i class="fa fa-certificate"></i></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $db = \Config\Database::connect();
                        foreach ($jadwalTawar as $mt) {

                            $jml = $db->table('tbl_krs')
                                ->where('id_jadwal', $mt['id_jadwal'])
                                ->countAllResults();

                        ?>
                            <tr>
                                <td><?= $mt['kd_makul'] ?></td>
                                <td>
                                    <?= $mt['makul'] ?><br>
                                    (<?= $mt['kd_prodi'] ?>)
                                </td>
                                <td><?= $mt['sks'] ?></td>
                                <td><?= $mt['smt'] ?></td>
                                <td><?= $mt['nama_kelas'] ?></td>
                                <td><?= $mt['ruangan'] ?></td>
                                <td><?= $mt['nama_dosen'] ?></td>
                                <td><?= $mt['hari'] . ', ' . $mt['waktu'] ?></td>
                                <td class="text-center"><?= $jml . '/' . $mt['kuota'] ?></td>
                                <td class="text-center">
                                    <?php if ($jml == $mt['kuota']) { ?>
                                        <span class="label label-danger">Full</span>
                                    <?php } else { ?>
                                        <a href="<?= base_url('krs/tambahMakul/' . $mt['id_jadwal']) ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a>

                                    <?php } ?>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- modal hapus -->
<?php foreach ($dataMakul as $dm) {  ?>
    <div class="modal fade" id="hapus<?= $dm['id_krs'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus makul <strong><?= $dm['makul'] ?></strong></h4>
                </div>

                <div class="modal-body">
                    <h3>Apakah anda yakin akan menghapus data ini..??</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('krs/hapus/' . $dm['id_krs']) ?>" class="btn btn-primary">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>