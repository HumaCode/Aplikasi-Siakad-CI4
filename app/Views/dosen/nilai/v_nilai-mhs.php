<div class="row">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="label-success">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Mata Kuliah</th>
                    <th class="text-center">Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Dosen</th>
                    <th class="text-center">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($jadwal as $j) { ?>
                    <tr>
                        <td class="text-center"><?= $i ?></td>
                        <td><?= $j['kd_makul'] ?></td>
                        <td><?= $j['makul'] ?></td>
                        <td><?= $j['sks'] ?></td>
                        <td><?= $j['nama_kelas'] . ' | ' . $j['th_angkatan'] ?></td>
                        <td><?= $j['nama_dosen'] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('dsn/dataNilai/' . $j['id_jadwal']) ?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-table"></i> &nbsp;Lihat Nilai</a>
                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</div>