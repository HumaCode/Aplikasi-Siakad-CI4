<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('prodi') ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
                </div>
            </div>
            <?= form_open('prodi/update/' . $prodi['id_prodi']) ?>
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
                        <?php foreach ($fakultas as $g) { ?>
                            <?php if ($g['id_fakultas'] == $prodi['id_fakultas']) { ?>
                                <option value="<?= $g['id_fakultas'] ?>" selected><?= $g['fakultas'] ?></option>
                            <?php } else { ?>
                                <option value="<?= $g['id_fakultas'] ?>"><?= $g['fakultas'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kd_prodi">Kode Prodi</label>
                    <input type="text" name="kd_prodi" id="kd_prodi" class="form-control" value="<?= $prodi['kd_prodi'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <input type="text" name="prodi" id="prodi" class="form-control" value="<?= $prodi['prodi'] ?>">
                </div>

                <div class="form-group">
                    <label for="jenjang">Jenjang</label>
                    <select name="jenjang" id="jenjang" class="form-control">
                        <option value="D3" <?= ($prodi['jenjang'] == 'D3') ? 'selected' : '' ?>>D3</option>
                        <option value="S1" <?= ($prodi['jenjang'] == 'S1') ? 'selected' : '' ?>>S1</option>
                    </select>
                </div>

            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>