<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('mahasiswa/add') ?>" class="btn btn-box-tool"><i class="fa fa-plus"></i> &nbsp;Tambah</a>
                </div>
            </div>
            <div class="box-body">

                <!-- alert error -->
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <!-- flasdata -->
                <?php if (session()->getFlashdata('pesan')) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Berhasil!</h4>
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php } ?>

                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">No</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Program Study</th>
                            <th class="text-center">Foto</th>
                            <th width="200" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($mhs as $m) { ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $m['nim'] ?></td>
                                <td><?= $m['nama_mhs'] ?></td>
                                <td><?= $m['prodi'] ?></td>
                                <td class="text-center">
                                    <img src="<?= base_url('fotomhs/' . $m['foto']) ?>" width="70" class="img-circle" alt="User Image">
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('mahasiswa/edit/' . $m['id_mhs']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?= $m['id_mhs'] ?>"><i class="fa fa-trash"></i></button>
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

<!-- modal hapus -->
<?php foreach ($mhs as $r) {  ?>
    <div class="modal fade" id="hapus<?= $r['id_mhs'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus mahasiswa dengan nama <strong><?= $r['nama_mhs'] ?></strong></h4>
                </div>

                <div class="modal-body">
                    <h3>Apakah anda yakin akan menghapus data ini..??</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('mahasiswa/hapus/' . $r['id_mhs']) ?>" class="btn btn-primary">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>