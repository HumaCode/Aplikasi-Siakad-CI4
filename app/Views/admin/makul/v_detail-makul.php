<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-body">

                <table class="table table-bordered table-hover ">
                    <tr>
                        <th width="200">Program Study</th>
                        <td width="25">:</td>
                        <td><?= $prodi['prodi'] ?></td>
                    </tr>

                    <tr>
                        <th>Jenjang</th>
                        <td>:</td>
                        <td><?= $prodi['jenjang'] ?></td>
                    </tr>

                    <tr>
                        <th>Fakultas</th>
                        <td>:</td>
                        <td><?= $prodi['fakultas'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> &nbsp;Tambah</button>
                </div>
            </div>
            <div class="box-body">

                <!-- flasdata -->
                <?php if (session()->getFlashdata('pesan')) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Berhasil!</h4>
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php } ?>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" width="50">No</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Semester</th>
                            <th width="200" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($makul as $m) { ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td class="text-center"><?= $m['kd_makul'] ?></td>
                                <td><?= $m['makul'] ?></td>
                                <td class="text-center"><?= $m['sks'] ?></td>
                                <td class="text-center"><?= $m['kategori'] ?></td>
                                <td class="text-center"><?= $m['smt'] ?> (<?= $m['semester'] ?>)</td>
                                <td class="text-center" width="50">
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?= $m['id_makul'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>