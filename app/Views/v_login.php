<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url() ?>"><b>Login</b> Siakad</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Silahkan Login</p>

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
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Gagal Login!</h4>
                <?= session()->getFlashdata('pesan') ?>
            </div>
        <?php } ?>

        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php } ?>


        <?= form_open('auth/cek_login') ?>
        <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <select name="level" id="level" class="form-control">
                <option value="">-- Pilih --</option>
                <option value="1">1. Admin</option>
                <option value="2">2. Mahasiswa</option>
                <option value="3">3. Dosen</option>
            </select>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-success btn-block btn-flat">Login</button>
            </div>
        </div>
        <?= form_close() ?>
        <a href="register.html" class="text-center">Register a new membership</a>

    </div>
</div>