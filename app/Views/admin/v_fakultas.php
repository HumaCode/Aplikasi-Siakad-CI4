<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>

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

                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Fakultas</th>
                            <th width="200" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($fakultas as $f) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $f['fakultas'] ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $f['id_fakultas'] ?>"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?= $f['id_fakultas'] ?>"><i class="fa fa-trash"></i></button>
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Fakultas</h4>
            </div>

            <?= form_open('fakultas/add') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" name="fakultas" id="fakultas" class="form-control" placeholder="Fakultas" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- modal edit -->
<?php foreach ($fakultas as $f) {  ?>
    <div class="modal fade" id="edit<?= $f['id_fakultas'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Fakultas <?= $f['fakultas'] ?></h4>
                </div>

                <?= form_open('fakultas/edit/' . $f['id_fakultas']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fakultas">Fakultas</label>
                        <input type="text" name="fakultas" id="fakultas" class="form-control" value="<?= $f['fakultas'] ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>

<!-- modal hapus -->
<?php foreach ($fakultas as $f) {  ?>
    <div class="modal fade" id="hapus<?= $f['id_fakultas'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Fakultas <strong><?= $f['fakultas'] ?></strong></h4>
                </div>

                <div class="modal-body">
                    <h3>Apakah anda yakin akan menghapus data ini..??</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('fakultas/hapus/' . $f['id_fakultas']) ?>" class="btn btn-primary">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>