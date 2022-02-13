<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('prodi') ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
                </div>
            </div>
            <?= form_open('prodi/insert') ?>
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
                    <label for="fakultas">Fakultas</label>
                    <select name="fakultas" id="fakultas" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($fakultas as $f) { ?>
                            <option value="<?= $f['id_fakultas'] ?>"><?= $f['fakultas'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kd_prodi">Kode Prodi</label>
                    <input type="text" name="kd_prodi" id="kd_prodi" class="form-control" placeholder="Kode Prodi">
                </div>

                <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <input type="text" name="prodi" id="prodi" class="form-control" placeholder="Prodi">
                </div>

                <div class="form-group">
                    <label for="jenjang">Jenjang</label>
                    <select name="jenjang" id="jenjang" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ka_prodi">Ka. Prodi</label>
                    <select name="ka_prodi" id="ka_prodi" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($dosen as $d) { ?>
                            <option value="<?= $d['nama_dosen'] ?>"><?= $d['nama_dosen'] ?></option>
                        <?php } ?>
                    </select>
                </div>

            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>