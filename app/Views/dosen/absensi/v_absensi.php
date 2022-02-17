<div class="row">
    <div class="row">
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


    <div class="col-sm-12">
        <div class="table-responsive">

            <a href="<?= base_url('dsn/printAbsensi/' . $detailJadwal['id_jadwal']) ?>" target="_blank" class="btn btn-info btn-sm pull-right" style="margin-bottom: 10px;"><i class="fa fa-print"></i> &nbsp;Cetak Absensi</a>

            <!-- flasdata -->
            <?php if (session()->getFlashdata('pesan')) { ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php } ?>

            <?= form_open('dsn/simpanAbsen/' . $detailJadwal['id_jadwal']) ?>
            <table class="table table-striped table-bordered text-sm">
                <thead class="label-success">
                    <tr>
                        <th class="text-center" rowspan="2">NO</th>
                        <th class="text-center" rowspan="2" width="150">NIM</th>
                        <th class="text-center" rowspan="2" width="200">Mahasiswa</th>
                        <th class="text-center" colspan="18">Pertemuan</th>
                    </tr>
                    <tr>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>
                        <th class="text-center">3</th>
                        <th class="text-center">4</th>
                        <th class="text-center">5</th>
                        <th class="text-center">6</th>
                        <th class="text-center">7</th>
                        <th class="text-center">8</th>
                        <th class="text-center">9</th>
                        <th class="text-center">10</th>
                        <th class="text-center">11</th>
                        <th class="text-center">12</th>
                        <th class="text-center">13</th>
                        <th class="text-center">14</th>
                        <th class="text-center">15</th>
                        <th class="text-center">16</th>
                        <th class="text-center">17</th>
                        <th class="text-center">18</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    $sks = 0;
                    foreach ($mhs as $dm) {

                        echo form_hidden($dm['id_krs'] . 'id_krs', $dm['id_krs'])
                    ?>
                        <tr>
                            <td class="text-center"><?= $i ?></td>
                            <td class="text-center"><?= $dm['nim'] ?></td>
                            <td><?= $dm['nama_mhs'] ?></td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p1" id="p1">
                                    <option value="0" <?= ($dm['p1'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p1'] == 1) ? 'selected' : '' ?>>I</option>
                                    <option value="2" <?= ($dm['p1'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p2" id="p2">
                                    <option value="0" <?= ($dm['p2'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p2'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p2'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p3" id="p3">
                                    <option value="0" <?= ($dm['p3'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p3'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p3'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p4" id="p4">
                                    <option value="0" <?= ($dm['p4'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p4'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p4'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p5" id="p5">
                                    <option value="0" <?= ($dm['p5'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p5'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p5'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p6" id="p6">
                                    <option value="0" <?= ($dm['p6'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p6'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p6'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p7" id="p7">
                                    <option value="0" <?= ($dm['p7'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p7'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p7'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p8" id="p8">
                                    <option value="0" <?= ($dm['p8'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p8'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p8'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p9" id="p9">
                                    <option value="0" <?= ($dm['p9'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p9'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p9'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p10" id="p10">
                                    <option value="0" <?= ($dm['p10'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p10'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p10'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p11" id="p11">
                                    <option value="0" <?= ($dm['p11'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p11'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p11'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p12" id="p12">
                                    <option value="0" <?= ($dm['p12'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p12'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p12'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p13" id="p13">
                                    <option value="0" <?= ($dm['p13'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p13'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p13'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p14" id="p14">
                                    <option value="0" <?= ($dm['p14'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p14'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p14'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p15" id="p15">
                                    <option value="0" <?= ($dm['p15'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p15'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p15'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p16" id="p16">
                                    <option value="0" <?= ($dm['p16'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p16'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p16'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p17" id="p17">
                                    <option value="0" <?= ($dm['p17'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p17'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p17'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select name="<?= $dm['id_krs'] ?>p18" id="p18">
                                    <option value="0" <?= ($dm['p18'] == 0) ? 'selected' : '' ?>>A</option>
                                    <option value="1" <?= ($dm['p18'] == 1) ? 'selected' : '' ?>>I </option>
                                    <option value="2" <?= ($dm['p18'] == 2) ? 'selected' : '' ?>>H</option>
                                </select>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>

            <button type="submit" class="btn btn-sm btn-success pull-right">Simpan</button>
            <?= form_close() ?>
        </div>
    </div>
</div>