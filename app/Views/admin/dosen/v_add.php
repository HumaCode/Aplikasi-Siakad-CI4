<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('dosen') ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
                </div>
            </div>
            <?= form_open_multipart('dosen/insert') ?>
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
                    <label for="kd_dosen">Kode Dosen</label>
                    <input type="text" name="kd_dosen" id="kd_dosen" class="form-control" placeholder="Kode Dosen">
                </div>

                <div class="form-group">
                    <label for="nidn">NIDN</label>
                    <input type="number" min="1" name="nidn" id="nidn" class="form-control" placeholder="NIDN">
                </div>

                <div class="form-group">
                    <label for="nama">Nama Dosen</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Dosen">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
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
                            <img src="<?= base_url('fotodosen/default.png') ?>" id="gambar_load" width="200" alt="">
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