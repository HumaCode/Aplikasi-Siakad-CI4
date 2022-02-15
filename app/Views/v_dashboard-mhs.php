<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-success">
            <div class="box-body box-profile">
                <img class=" img-responsive img-circle" src="<?= base_url('fotomhs/' . $mhs['foto_mhs']) ?>" width="100%" alt="User profile picture">

                <h3 class="profile-username text-center"><?= $mhs['nim']  ?></h3>
                <h3 class="profile-username text-center"><?= $mhs['nama_mhs']  ?></h3>
                <br>
                <p class="text-muted text-center"><?= $mhs['prodi']  ?></p>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <div class="col-md-9">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Biodata</h3>
            </div>

            <div class="box-body">

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th width="200">Tahun Akademik</th>
                            <td width="20">:</td>
                            <td><?= $ta['ta'] . '/' . $ta['semester']  ?></td>
                        </tr>

                        <tr>
                            <th>Program Studi</th>
                            <td>:</td>
                            <td><?= $mhs['prodi']  ?></td>
                        </tr>

                        <tr>
                            <th>Fakultas</th>
                            <td>:</td>
                            <td><?= $mhs['fakultas']  ?></td>
                        </tr>

                        <tr>
                            <th>Kelas</th>
                            <td>:</td>
                            <td><?= $mhs['nama_kelas'] . ' - ' . $mhs['th_angkatan']  ?></td>
                        </tr>

                        <tr>
                            <th>Dosen PA</th>
                            <td>:</td>
                            <td><?= $mhs['nama_dosen']  ?></td>
                        </tr>

                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td></td>
                        </tr>

                        <tr>
                            <th>No. Hp</th>
                            <td>:</td>
                            <td></td>
                        </tr>

                        <tr>
                            <th>E-mail</th>
                            <td>:</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>