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
                    <tr>
                        <th>Tahun Akademik</th>
                        <td>:</td>
                        <td><?= $ta['ta'] . '/' . $ta['semester'] ?> </td>
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

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" width="50">No</th>
                            <th class="text-center">Semester</th>
                            <th class="text-center">Kode Makul</th>
                            <th class="text-center">Makul</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Dosen</th>
                            <th class="text-center">Hari</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Kuota</th>
                            <th width="100" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($jadwal as $j) { ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td class="text-center"><?= $j['smt'] ?></td>
                                <td class="text-center"><?= $j['kd_makul'] ?></td>
                                <td class="text-center"><?= $j['makul'] ?></td>
                                <td class="text-center"><?= $j['sks'] ?></td>
                                <td class="text-center"><?= $j['nama_kelas'] . ' | ' . $j['th_angkatan'] ?></td>
                                <td><?= $j['nama_dosen'] ?></td>
                                <td><?= $j['hari'] ?></td>
                                <td class="text-center"><?= $j['waktu'] ?></td>
                                <td class="text-center"><?= $j['ruangan'] ?></td>
                                <td class="text-center"><?= $j['kuota'] ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?= $j['id_jadwal'] ?>"><i class="fa fa-trash"></i></button>
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

            <?= form_open('jadwalKuliah/add/' . $prodi['id_prodi'] . '/' . $ta['id_ta']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="makul">Mata Kuliah</label>
                    <select name="makul" id="makul" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($makul as $m) { ?>
                            <?php if ($m['semester'] == $ta['semester']) { ?>
                                <option value="<?= $m['id_makul'] ?>"><?= $m['smt'] . ' | ' . $m['kd_makul'] . ' | ' . $m['makul'] . ' | ' . $m['sks'] ?> SKS</option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dosen">Nama Dosen</label>
                    <select name="dosen" id="dosen" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($dosen as $d) { ?>
                            <option value="<?= $d['id_dosen'] ?>"><?= $d['nama_dosen']  ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($kelas as $k) { ?>
                            <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] . ' | ' . $k['th_angkatan']  ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <select name="hari" id="hari" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jam">Jam</label>
                            <input type="text" name="jam" id="jam" class="form-control" placeholder="Jam">
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ruangan">Ruangan</label>
                            <select name="ruangan" id="ruangan" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($ruangan as $r) { ?>
                                    <option value="<?= $r['id_ruangan'] ?>"><?= $r['ruangan']  ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kuota">Kuota</label>
                            <input type="text" name="kuota" id="kuota" class="form-control" placeholder="Kuota">
                        </div>
                    </div>

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
<?php foreach ($jadwal as $j) {  ?>
    <div class="modal fade" id="hapus<?= $j['id_jadwal'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus data</h4>
                </div>

                <div class="modal-body">
                    <h3>Apakah anda yakin akan menghapus data ini..??</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('jadwalKuliah/hapus/' . $j['id_jadwal'] . '/' . $prodi['id_prodi']) ?>" class="btn btn-primary">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>