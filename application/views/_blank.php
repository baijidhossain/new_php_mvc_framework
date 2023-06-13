<?php require_once( VIEW_PATH . '_common/header.php' ); ?>

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
            <!-- Content Header (Page Header) End-->

            <div class="content">
                <div class="container-fluid">
					<?php $this->getMessage(); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4 _card">
                                <div class="card-header with-border">
                                    <h5 class="card-title">
                                        Box Title
                                    </h5>

                                    <div class="card-options">
                                        <a class="btn _btn purple_gradient rounded-pill" href="<?= APP_URL ?>/admin/" data-bs-toggle="modal" data-bs-target="#ajaxModal">
                                            <i class="fas fa-plus"></i> New Item
                                        </a>
                                    </div>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <p>Your text</p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!--Main layout end-->

<?php require_once( VIEW_PATH . '_common/footer.php' ); ?>