<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="label-success">
            <tr>
                <th class="text-center" rowspan="2">NO</th>
                <th class="text-center" rowspan="2">Kode</th>
                <th class="text-center" rowspan="2">Mata Kuliah</th>
                <th class="text-center" colspan="18">Pertemuan</th>
                <th class="text-center" rowspan="2">%</th>
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
            foreach ($dataMakul as $dm) {

                // jumlah sks
                $sks = $sks + $dm['sks'];
            ?>
                <tr>
                    <td class="text-center"><?= $i ?></td>
                    <td class="text-center"><?= $dm['kd_makul'] ?></td>
                    <td><?= $dm['makul'] ?></td>
                    <td class="text-center">
                        <?php if ($dm['p1'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p1'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p1'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>

                    <td class="text-center">
                        <?php if ($dm['p2'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p2'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p2'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p3'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p3'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p3'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>

                    <td class="text-center">
                        <?php if ($dm['p4'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p4'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p4'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>

                    <td class="text-center">
                        <?php if ($dm['p5'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p5'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p5'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p6'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p6'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p6'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p7'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p7'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p7'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p8'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p8'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p8'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p9'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p9'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p9'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p10'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p10'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p10'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p11'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p11'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p11'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p12'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p12'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p12'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p13'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p13'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p13'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p14'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p14'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p14'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p15'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p15'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p15'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p16'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p16'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p16'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p17'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p17'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p17'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dm['p18'] == 0) { ?>
                            <i class="fa fa-times text-danger"></i>
                        <?php } else if ($dm['p18'] == 1) { ?>
                            <i class="fa fa-info text-primary"></i>
                        <?php } else if ($dm['p18'] == 2) { ?>
                            <i class="fa fa-check text-success"></i>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php
                        $absen = ($dm['p1'] + $dm['p2'] + $dm['p3'] + $dm['p4'] + $dm['p5'] + $dm['p6'] + $dm['p7'] + $dm['p8'] + $dm['p9'] + $dm['p10'] + $dm['p11'] + $dm['p12'] + $dm['p13'] + $dm['p14'] + $dm['p15'] + $dm['p16'] + $dm['p17'] + $dm['p18']) / 36 * 100;

                        echo number_format($absen, 0) . ' %';
                        ?>
                    </td>
                </tr>
            <?php $i++;
            } ?>
        </tbody>
    </table>
</div>