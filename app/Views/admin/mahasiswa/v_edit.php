<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
                </div>
            </div>
            <?= form_open_multipart('mahasiswa/update/' . $mhs['id_mhs']) ?>
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


                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="number" min="1" name="nim" id="nim" class="form-control" value="<?= $mhs['nim'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Mahasiswa</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $mhs['nama_mhs'] ?>">
                </div>

                <div class="form-group">
                    <label for="nama">Program Study</label>
                    <select name="prodi" id="prodi" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($prodi as $p) { ?>
                            <?php if ($p['id_prodi'] == $mhs['id_prodi']) { ?>
                                <option value="<?= $p['id_prodi'] ?>" selected><?= $p['prodi'] ?></option>
                            <?php } else { ?>
                                <option value="<?= $p['id_prodi'] ?>"><?= $p['prodi'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="<?= $mhs['password'] ?>">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="preview_gambar" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <img src="<?= base_url('fotomhs/' . $mhs['foto']) ?>" id="gambar_load" width="200" alt="">
                        </div>
                    </div>
                </div>





            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>