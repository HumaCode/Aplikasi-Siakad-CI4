<div class="row" style="margin-bottom: 10px;">
    <div class="col-sm-6">
        <div class="table-responsive">
            <table class=" table-striped">
                <thead>
                    <tr>
                        <td width="150">Program Studi</td>
                        <td width="20">:</td>
                        <td><?= $detailJadwal['prodi'] ?></td>
                    </tr>
                    <tr>
                        <td>Fakultas</td>
                        <td>:</td>
                        <td><?= $detailJadwal['fakultas'] ?></td>
                    </tr>
                    <tr>
                        <td>Kode</td>
                        <td>:</td>
                        <td><?= $detailJadwal['kd_makul'] ?></td>
                    </tr>

                </thead>
            </table>
        </div>
    </div>

    <div class="col-sm-6">
        <table>
            <tr>
                <td width="150">Mata Kuliah</td>
                <td width="20">:</td>
                <td><?= $detailJadwal['makul'] ?></td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td><?= $detailJadwal['hari'] . ', ' . $detailJadwal['waktu'] ?></td>
            </tr>
            <tr>
                <td>Nama Dosen</td>
                <td>:</td>
                <td><?= $detailJadwal['nama_dosen'] ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="row">
    <a href="<?= base_url('dsn/printNilai/' . $detailJadwal['id_jadwal']) ?>" target="_blank" class="btn btn-info btn-sm pull-right" style="margin-bottom: 10px;"><i class="fa fa-print"></i> &nbsp;Cetak Nilai</a>



</div>

<div class="row">
    <!-- flasdata -->
    <?php if (session()->getFlashdata('pesan')) { ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            <?= session()->getFlashdata('pesan') ?>
        </div>
    <?php } ?>

    <div class="table-responsive" style="margin-top: 5px;">
        <table class="table table-striped table-bordered">
            <thead class="label-success">

                <tr>
                    <th class="text-center" rowspan="2">NO</th>
                    <th class="text-center" rowspan="2" width="150">NIM</th>
                    <th class="text-center" rowspan="2" width="200">Mahasiswa</th>
                    <th class="text-center" colspan="6">Nilai</th>
                </tr>
                <tr>
                    <th class="text-center">Absensi </th>
                    <th class="text-center" width="100">Tugas </th>
                    <th class="text-center" width="100">UTS </th>
                    <th class="text-center" width="100">UAS </th>
                    <th class="text-center">NA <br> (15%+15%+30%+40%)</th>
                    <th class="text-center">Huruf</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1;
                foreach ($mhs as $dm) {

                    echo form_hidden($dm['id_krs'] . 'id_krs', $dm['id_krs'])
                ?>
                    <tr>
                        <td class="text-center"><?= $i ?></td>
                        <td class="text-center"><?= $dm['nim'] ?></td>
                        <td><?= $dm['nama_mhs'] ?></td>
                        <td class="text-center"><?= $dm['nilai_absen'] ?></td>
                        <td><input type="text" class="form-control" value="<?= $dm['nilai_tugas'] ?>"></td>
                        <td><input type="text" class="form-control" value="<?= $dm['nilai_uts'] ?>"></td>
                        <td><input type="text" class="form-control" value="<?= $dm['nilai_uas'] ?>"></td>
                        <td class="text-center"><?= $dm['nilai_akhir'] ?></td>
                        <td class="text-center"><?= $dm['nilai_huruf'] ?></td>
                    </tr>

                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</div>