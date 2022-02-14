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

    <div class="col-sm-12">
        <button type="button" class="btn btn-warning btn-sm pull-right " style="margin-left: 10px; margin-bottom: 10px;" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> &nbsp;Tambah Mata Kuliah</button>
        <button type="button" class="btn btn-info btn-sm pull-right"><i class="fa fa-print"></i> &nbsp;Cetak KRS</button>
        <table class="table table-striped table-bordered">
            <thead class="label-success">
                <tr>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">SMT</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Ruangan</th>
                    <th class="text-center">Dosen</th>
                    <th class="text-center">Jam</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- modal tambah -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Daftar mata kuliah yang ditawarkan</h4>
            </div>

            <div class="modal-body">

                <table id="example1" class="table table-bordered table-striped text-sm">
                    <thead class="label-success">
                        <tr>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">SMT</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Dosen</th>
                            <th class="text-center">Jam</th>
                            <th class="text-center">Kuota</th>
                            <th class="text-center"><i class="fa fa-certificate"></i></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($jadwalTawar as $mt) { ?>
                            <tr>
                                <td><?= $mt['kd_makul'] ?></td>
                                <td><?= $mt['makul'] ?></td>
                                <td><?= $mt['sks'] ?></td>
                                <td><?= $mt['smt'] ?></td>
                                <td><?= $mt['nama_kelas'] ?></td>
                                <td><?= $mt['ruangan'] ?></td>
                                <td><?= $mt['nama_dosen'] ?></td>
                                <td><?= $mt['hari'] . ', ' . $mt['waktu'] ?></td>
                                <td class="text-center">0/<?= $mt['kuota'] ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>