<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Anggota <?= $title ?> </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> &nbsp;Tambah</button>
                </div>
            </div>
            <div class="box-body">

                <!-- flasdata -->
                <?php if (session()->getFlashdata('pesan')) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Berhasil!</h4>
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php } ?>

                <table class="table">
                    <tr>
                        <th width="150">Nama Kelas</th>
                        <td width="30">:</td>
                        <td width="200"><?= $kelas['nama_kelas'] ?></td>
                        <th width="150">Angkatan</th>
                        <td width="30">:</td>
                        <td><?= $kelas['th_angkatan'] ?></td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td>:</td>
                        <td><?= $kelas['prodi'] ?></td>
                        <th>Jumlah Mahasiswa</th>
                        <td>:</td>
                        <td><?= $jml ?></td>
                    </tr>
                </table>

                <table class="table table-bordered">
                    <thead class="label-success">

                        <tr>
                            <th class="text-center" width="50">No</th>
                            <th class="text-center" width="200">NIM</th>
                            <th class="text-center">Nama Mahasiswa</th>
                            <th class="text-center" width="150">Aksi</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($mhs as $m) { ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $m['nim'] ?></td>
                                <td><?= $m['nama_mhs'] ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-flat btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $m['id_mhs'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<!-- modal tambah -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Anggota</h4>
            </div>

            <div class="modal-body">

                <table id="example1" class="table table-bordered table-hover">
                    <thead class="label-success">
                        <tr>
                            <th width="50" class="text-center">No</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Nama Mahasiswa</th>
                            <th class="text-center">Program Studi</th>
                            <th width="50" class="text-center"><i class="fa fa-certificate"></i></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($mhsAll as $ml) { ?>
                            <?php if ($kelas['id_prodi'] == $ml['id_prodi']) { ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td><?= $ml['nim'] ?></td>
                                    <td><?= $ml['nama_mhs'] ?></td>
                                    <td><?= $ml['prodi'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('kelas/tambahAnggota/' . $ml['id_mhs'] . '/' . $kelas['id_kelas']) ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php $i++;
                        } ?>

                    </tbody>
                </table>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<!-- modal hapus -->
<?php foreach ($mhs as $g) {  ?>
    <div class="modal fade" id="hapus<?= $g['id_mhs'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Anggota</h4>
                </div>

                <div class="modal-body">
                    <h3>Apakah anda yakin akan anggota ini..??</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('kelas/hapusAnggota/' . $g['id_mhs'] . '/' . $kelas['id_kelas']) ?>" class="btn btn-primary">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>