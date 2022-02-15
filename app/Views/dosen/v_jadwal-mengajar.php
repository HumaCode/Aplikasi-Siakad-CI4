<div class="row">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="label-success">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Program Studi</th>
                    <th class="text-center">Hari</th>
                    <th class="text-center">Kode Mata Kuliah</th>
                    <th class="text-center">Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Ruangan</th>
                    <th class="text-center">Dosen</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($jadwal as $j) { ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $j['prodi'] ?></td>
                        <td><?= $j['hari'] . ', ' . $j['waktu'] ?></td>
                        <td><?= $j['kd_makul'] ?></td>
                        <td><?= $j['makul'] ?></td>
                        <td><?= $j['sks'] ?></td>
                        <td><?= $j['nama_kelas'] . ' | ' . $j['th_angkatan'] ?></td>
                        <td><?= $j['ruangan'] ?></td>
                        <td><?= $j['nama_dosen'] ?></td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</div>