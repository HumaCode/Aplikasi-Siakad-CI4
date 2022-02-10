<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('ruangan') ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
                </div>
            </div>
            <?= form_open('ruangan/insert') ?>
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
                    <label for="gedung">Gedung</label>
                    <select name="gedung" id="gedung" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($gedung as $g) { ?>
                            <option value="<?= $g['id_gedung'] ?>"><?= $g['gedung'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gedung">Ruangan</label>
                    <input type="text" name="ruangan" id="ruangan" class="form-control" placeholder="Ruangan" required>
                </div>

            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>