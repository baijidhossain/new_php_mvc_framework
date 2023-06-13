<?php require_once( VIEW_PATH . '_common/header.php' ) ?>
    <!--Main layout start-->
    <main>
        <div class="content-wrapper">
            <!-- Content Header (Page Header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row align-items-center my-4">
                        <div class="col-sm-7">
                            <h3 class="m-0"><?= $this->data['page_title'] ?></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
					<?php $this->getMessage(); ?>
                    <div class="row">
                        <div class="col-lg-3 mb-4">
                            <!-- Profile Image -->
                            <div class="card _card border_top_skin">
                                <div class="card-body">
                                    <div class="text-center user-lg-img">
                                        <img class="img-fluid rounded-circle obj_cover" width="100" height="100"
                                             src="<?= APP_URL . $this->data['user']['photo'] ?>" alt="User profile picture">
                                    </div>

                                    <h5 class="text-center" style="margin: 10px 0 5px 0;"> <?= $this->data['user']['name'] ?> </h5>

                                    <p class="text-muted text-center"><?= $this->data['user']['email'] ?></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item"><b>Account Status:</b> <span class="float-end badge bg_success">Active</span></li>
                                        <li class="list-group-item"><b>Account Registered:</b> <span class="float-end"><?= date_create( $this->data['user']['created'] )->format( "d M Y" ) ?></span></li>
                                        <li class="list-group-item"><b>Account Type:</b>
                                            <span class="float-end">
                                                <?php
                                                foreach ( $this->auth->userinfo['groups'] as $g ) {
	                                                echo '<small class="float-end badge bg_skin">' . $g . '</small>';
                                                }
                                                ?>
                                            </span>
                                        </li>
                                    </ul>
                                    <a class="btn _btn bg_skin btn_block"
                                       href="<?= APP_URL . '/account/Security/' ?>"><i class="fas fa-lock"></i> <b>Security</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->

                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-9 mb-4">
                            <div class="card _card border_top_skin">
                                <div class="card-header">
                                    Update Profile
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row my-3">
                                        <div class="col-md-offset-1 col-md-8">
                                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

	                                            <?= $this->request->verifier ?>

                                                <div class="form-group mb-3 row">
                                                    <label class="col-md-3 form-label text-md-end">Name</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="name" value="<?= $this->data['user']['name'] ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="col-md-3 form-label text-md-end">Phone Number</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="phone" value="<?= $this->data['user']['phone'] ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="col-md-3 form-label text-md-end">Email Address</label>

                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" name="email" value="<?= $this->data['user']['email'] ?>" readonly required>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="col-md-3 form-label text-md-end">Profile Photo</label>

                                                    <div class="col-sm-8">
                                                        <input type="file" class="form-control" name="photo" accept="image/png, image/gif, image/jpeg">
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 mt-4 row">
                                                    <div class="col-sm-8 offset-md-3">
                                                        <button class="btn _btn bg_skin">Save Changes</button>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Main layout end-->
<?php include_once( VIEW_PATH . '_common/footer.php' ); ?>