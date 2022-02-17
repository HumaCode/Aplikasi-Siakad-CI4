<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-success">
            <div class="box-body box-profile">
                <img class=" img-responsive img-circle" src="<?= base_url('fotodosen/' . $dsn['foto']) ?>" width="100%" alt="User profile picture">

                <h3 class="profile-username text-center"><?= $dsn['nidn']  ?></h3>
                <h3 class="profile-username text-center"><?= $dsn['nama_dosen']  ?></h3>
                <br>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <div class="col-md-9">
        <div class="box box-success">

            <div class="box-body">

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Tahun Akademik</th>
                            <td>:</td>
                            <td></td>
                        </tr>

                        <tr>
                            <th>Program Studi</th>
                            <td>:</td>
                            <td></td>
                        </tr>

                        <tr>
                            <th>Kode Dosen</th>
                            <td>:</td>
                            <td><?= $dsn['nidn']  ?></td>
                        </tr>

                        <tr>
                            <th>Tempat Tanggal Lahir</th>
                            <td>:</td>
                            <td></td>
                        </tr>

                        <tr>
                            <th>Pendidikan Terakhir</th>
                            <td>:</td>
                            <td></td>
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