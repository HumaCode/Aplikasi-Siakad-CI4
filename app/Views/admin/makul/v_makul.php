<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-body">

                <table id="example2" class="table table-bordered table-hover ">
                    <thead class="text-center">
                        <tr>
                            <th width="50">No</th>
                            <th>Fakultas</th>
                            <th>Kode Prodi</th>
                            <th>Prodi</th>
                            <th>Jenjang</th>
                            <th>Mata Kuliah</th>
                            <th width="200" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        $db = \Config\Database::connect();



                        foreach ($prodi as $r) {

                            $jml = $db->table('tbl_makul')
                                ->where('id_prodi', $r['id_prodi'])
                                ->countAllResults();

                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $r['fakultas'] ?></td>
                                <td><?= $r['kd_prodi'] ?></td>
                                <td><?= $r['prodi'] ?></td>
                                <td class="text-center"><?= $r['jenjang'] ?></td>
                                <td class="text-center"><span class="label label-success"><?= $jml ?></span></td>
                                <td class="text-center">
                                    <a href="<?= base_url('makul/detail/' . $r['id_prodi']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-th-list"> &nbsp;Mata Kuliah</i></a>
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