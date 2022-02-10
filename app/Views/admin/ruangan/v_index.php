<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('ruangan/add') ?>" class="btn btn-box-tool"><i class="fa fa-plus"></i> &nbsp;Tambah</a>
                </div>
            </div>
            <div class="box-body">

                <!-- flasdata -->
                <?php if (session()->getFlashdata('pesan')) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php } ?>

                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Gedung</th>
                            <th>Ruangan</th>
                            <th width="200" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($ruangan as $r) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $r['gedung'] ?></td>
                                <td><?= $r['ruangan'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('ruangan/edit/' . $r['id_ruangan']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?= $r['id_ruangan'] ?>"><i class="fa fa-trash"></i></button>
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



<!-- modal hapus -->
<?php foreach ($ruangan as $r) {  ?>
    <div class="modal fade" id="hapus<?= $r['id_ruangan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus <strong><?= $r['ruangan'] ?></strong></h4>
                </div>

                <div class="modal-body">
                    <h3>Apakah anda yakin akan menghapus data ini..??</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('ruangan/hapus/' . $r['id_ruangan']) ?>" class="btn btn-primary">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>