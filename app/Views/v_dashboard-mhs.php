<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-success">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?= base_url('fotomhs/' . $mhs['foto_mhs']) ?>" alt="User profile picture">

                <h3 class="profile-username text-center"><?= $mhs['nim']  ?></h3>
                <h3 class="profile-username text-center"><?= $mhs['nama_mhs']  ?></h3>

                <p class="text-muted text-center"><?= $mhs['prodi']  ?></p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Followers</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Following</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b> <a class="pull-right">13,287</a>
                    </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>