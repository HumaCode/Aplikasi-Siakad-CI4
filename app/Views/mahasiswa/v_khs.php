<div class="row table-responsive">
    <table class=" table-striped">
        <thead>
            <tr>
                <td rowspan="7"><img src="<?= base_url('fotomhs/' . $mhs['foto_mhs']) ?>" width="300" style="padding: 10px;"></td>
                <th width="150">Tahun Akademik</th>
                <td width="20">:</td>
                <td><?= $ta['ta'] . ' - Semester ' . $ta['semester'] ?></td>
                <td rowspan="7"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><?= $mhs['nim'] ?></td>
            </tr>
            <tr>
                <td>Nama Mahasiswa</td>
                <td>:</td>
                <td><?= $mhs['nama_mhs'] ?></td>
            </tr>
            <tr>
                <td>Fakultas</td>
                <td>:</td>
                <td><?= $mhs['fakultas'] ?></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td><?= $mhs['prodi'] ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= $mhs['nama_kelas'] . ' - ' . $mhs['th_angkatan'] ?></td>
            </tr>
            <tr>
                <td>Nama Dosen</td>
                <td>:</td>
                <td><?= $mhs['nama_dosen'] ?></td>
            </tr>
        </thead>
    </table>


    <a href="<?= base_url('mhs/printKHS') ?>" target="_blank" style="margin-left: 10px; margin-bottom: 10px;" class="btn btn-info btn-sm pull-right"><i class="fa fa-print"></i> &nbsp;Cetak KHS</a>

    <div class="col-sm-12">

        <table class="table table-striped table-bordered">
            <thead class="label-success">
                <tr>
                    <th width="30" class="text-center">No</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">SMT</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Bobot</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                $sks = 0;
                $grand_tot_bobot = 0;

                foreach ($dataMakul as $dm) {

                    // jumlah sks
                    $sks = $sks + $dm['sks'];

                    // jumlah sks
                    $tot_bobot = $dm['sks'] * $dm['bobot'];
                    $grand_tot_bobot = $grand_tot_bobot + $tot_bobot;
                ?>
                    <tr>
                        <td class="text-center"><?= $i ?></td>
                        <td class="text-center"><?= $dm['kd_makul'] ?></td>
                        <td>
                            <?= $dm['makul'] ?>
                        </td>
                        <td class="text-center"><?= $dm['sks'] ?></td>
                        <td class="text-center"><?= $dm['smt'] ?></td>
                        <td class="text-center"><?= $dm['nilai_huruf'] ?></td>
                        <td class="text-center"><?= $dm['bobot'] ?></td>

                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>

        <h5><strong>Jumlah SKS : <?= $sks ?></strong> </h5>
        <h5><strong>IP : <?= (empty($dataMakul) ? '0' : number_format($grand_tot_bobot / $sks, 2)) ?></strong> </h5>
    </div>
</div>