<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-body">

                <table id="example2" class="table table-bordered table-hover ">
                    <thead class="text-center">
                        <tr>
                            <th width="50" class="text-center">No</th>
                            <th class="text-center">Fakultas</th>
                            <th class="text-center">Kode Prodi</th>
                            <th class="text-center">Prodi</th>
                            <th class="text-center">Jenjang</th>
                            <th width="200" class="text-center">Jadwal</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($prodi as $p) { ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td class="text-center"><?= $p['fakultas'] ?></td>
                                <td class="text-center"><?= $p['kd_prodi'] ?></td>
                                <td class="text-center"><?= $p['prodi'] ?></td>
                                <td class="text-center"><?= $p['jenjang'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('jadwalKuliah/detailJadwal/' . $p['id_prodi']) ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-table"></i></a>
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



<script>
    $(document).ready(function() {
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': false,
            'autoWidth': false,
            'responsive': true
        })
    })
</script>