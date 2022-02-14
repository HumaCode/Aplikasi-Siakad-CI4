<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-body">



                <table class="table table-bordered table-hover ">
                    <tr>
                        <th width="200">Program Study</th>
                        <td width="25">:</td>
                        <td><?= $prodi['prodi'] ?></td>
                    </tr>

                    <tr>
                        <th>Jenjang</th>
                        <td>:</td>
                        <td><?= $prodi['jenjang'] ?></td>
                    </tr>

                    <tr>
                        <th>Fakultas</th>
                        <td>:</td>
                        <td><?= $prodi['fakultas'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> &nbsp;Tambah</button>
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
                        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php } ?>

                <table id="makul" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" width="50">No</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Semester</th>
                            <th width="200" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($makul as $m) { ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td class="text-center"><?= $m['kd_makul'] ?></td>
                                <td><?= $m['makul'] ?></td>
                                <td class="text-center"><?= $m['sks'] ?></td>
                                <td class="text-center"><?= $m['kategori'] ?></td>
                                <td class="text-center"><?= $m['smt'] ?> (<?= $m['semester'] ?>)</td>
                                <td class="text-center" width="50">
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?= $m['id_makul'] ?>"><i class="fa fa-trash"></i></button>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Mata Kuliah</h4>
            </div>

            <?= form_open('makul/add/' . $prodi['id_prodi']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="kd_makul">Kode Makul</label>
                    <input type="text" name="kd_makul" id="kd_makul" class="form-control" placeholder="Kode Mata Kuliah">
                </div>

                <div class="form-group">
                    <label for="makul">Mata Kuliah</label>
                    <input type="text" name="makul" id="makul" class="form-control" placeholder="Mata Kuliah">
                </div>

                <div class="form-group">
                    <label for="sks">SKS</label>
                    <select name="sks" id="sks" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <select name="semester" id="semester" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php for ($i = 1; $i <= 8; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Wajib">Wajib</option>
                        <option value="Pilihan">Pilihan</option>
                    </select>
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

<!-- modal hapus -->
<?php foreach ($makul as $g) {  ?>
    <div class="modal fade" id="hapus<?= $g['id_makul'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Makul <strong><?= $g['makul'] ?></strong></h4>
                </div>

                <div class="modal-body">
                    <h3>Apakah anda yakin akan menghapus data ini..??</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('makul/hapus/' . $prodi['id_prodi'] . '/' . $g['id_makul']) ?>" class="btn btn-primary">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



<script>
    $(document).ready(function() {
        $('#makul').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': false,
            'autoWidth': false,
            'responsive': true
        })
    })
</script>