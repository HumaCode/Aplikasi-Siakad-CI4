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
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Program Studi</th>
                            <th class="text-center">Nama Dosen</th>
                            <th class="text-center">Angkatan</th>
                            <th class="text-center">Jumlah Mahasiswa</th>
                            <th width="100" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;

                        $db = \Config\Database::connect();


                        foreach ($kelas as $g) {

                            $jml = $db->table('tbl_mhs')
                                ->where('id_kelas', $g['id_kelas'])
                                ->countAllResults();

                        ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $g['nama_kelas'] ?></td>
                                <td><?= $g['prodi'] ?></td>
                                <td><?= $g['nama_dosen'] ?></td>
                                <td class="text-center"><?= $g['th_angkatan'] ?></td>
                                <td class="text-center">
                                    <span class="label label-success"><?= $jml ?></span><br>
                                    <a href="<?= base_url('kelas/detailKelas/' . $g['id_kelas']) ?>">Mahasiswa</a>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?= $g['id_kelas'] ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Tambah Kelas</h4>
            </div>

            <?= form_open('kelas/add') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="kelas">Nama Kelas</label>
                    <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Nama Kelas">
                </div>

                <div class="form-group">
                    <label for="prodi">Program Studi</label>
                    <select name="prodi" id="prodi" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($prodi as $p) { ?>
                            <option value="<?= $p['id_prodi'] ?>"><?= $p['prodi'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dosen">Nama Dosen</label>
                    <select name="dosen" id="dosen" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($dosen as $d) { ?>
                            <option value="<?= $d['id_dosen'] ?>"><?= $d['nama_dosen'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="th_angkatan">Tahun Angkatan</label>
                    <select name="th_angkatan" id="th_angkatan" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php for ($i = 2021; $i <= date('Y'); $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
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
<?php foreach ($kelas as $g) {  ?>
    <div class="modal fade" id="hapus<?= $g['id_kelas'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus kelas <strong><?= $g['nama_kelas'] ?></strong></h4>
                </div>

                <div class="modal-body">
                    <h3>Apakah anda yakin akan menghapus data ini..??</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('kelas/hapus/' . $g['id_kelas']) ?>" class="btn btn-primary">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>