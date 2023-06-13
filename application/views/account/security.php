<?php include_once( VIEW_PATH . '_common/header.php' ); ?>


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
                    <div class="col-md-12">
                        <div class="card mb-4 _card border_top_skin">
                            <div class="card-header with-border">
                                <h5 class="card-title">2 Step Verification (2FA)</h5>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <h5 class="fs-16">Stronger security for your Account. </h5>
                                <p style="font-size: 14px;">Two-factor authentication is an optional but
                                    highly recommended security feature that adds an extra layer of
                                    protection to your <?= SITE_TITLE ?> account.</p>
                                <p> With 2-Step Verification, you'll protect your account with both your
                                    password and your
                                    phone.</p>
                                <p style="font-size: 14px;">Once enabled, <?= SITE_TITLE ?> will require
                                    a six-digit security code in addition to your password whenever you
                                    sign in to <?= SITE_TITLE ?>.</p>
                                <p class="font16" style="margin-top: 20px;margin-bottom: 15px;">2-Step Verification (2FA) is
                                    <strong class="text-<?= $this->data['2fa'] ? 'success' : 'danger' ?>"> <?= $this->data['2fa'] ? 'Enabled' : 'Disabled' ?></strong>
                                </p>
								<?= $this->data['2fa_message'] ?>
                                <form action="" method="post" class="mt-4 custom-control">

	                                <?= $this->request->verifier ?>
                                    <div class="row">
                                        <div class="col-md-2 my-2">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        <div class="col-md-10 my-2">

                                            <input type="hidden" name="2FA" id="2fa" value="enable">

											<?php if ( $this->data['2fa'] ): ?>

                                                <button class="btn _btn btn_default" onclick="$('#2fa').val('reset')" style="margin-right:10px;">Reset (2FA) Token</button>
                                                <button class="btn _btn btn_danger" onclick="$('#2fa').val('disable')">Disable (2FA)</button>

											<?php else: ?>

                                                <button class="btn _btn btn_success">Enable (2FA)</button>

											<?php endif; ?>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mb-4 _card border_top_skin">
                            <div class="card-header with-border">
                                <h5 class="card-title">Change Password</h5>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <form class="form-horizontal" action="" method="post">

	                                        <?= $this->request->verifier ?>
                                            <div class="form-group mb-3 row has-feedback <?= ( ! empty( $this->data['cur_password_err'] ) ? 'has-error' : '' ) ?>">

                                                <label class="col-sm-3 control-label">Current Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="cur_password" value="" placeholder="Enter current password" required>
                                                    <span class="form-text"><?= $this->data['cur_password_err']; ?></span>
                                                </div>

                                            </div>

                                            <div class="form-group mb-3 row has-feedback <?= ( ! empty( $this->data['password_err'] ) ? 'has-error' : '' ) ?>">

                                                <label class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="password" pattern=".{8,}" title="8 characters minimum" placeholder="Enter new password" required>
                                                    <span class="form-text"><?= $this->data['password_err']; ?></span>
                                                </div>

                                            </div>

                                            <div class="form-group mb-3 row has-feedback <?= ( ! empty( $this->data['confirm_password_err'] ) ? 'has-error' : '' ) ?>">

                                                <label class="col-sm-3 control-label">Password (Repeat)</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="password2" pattern=".{8,}" title="8 characters minimum" placeholder="Repeat new password" required>
                                                    <span class="form-text"><?= $this->data['confirm_password_err']; ?></span>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-md-3 col-sm-8">
                                                    <button class="btn _btn btn_primary">Update Password</button>
                                                </div>
                                            </div>


                                        </form>
                                    </div>

                                </div>
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

<?php include_once( VIEW_PATH . '_common/footer.php' ); ?>

<script>
    $('#confirm_password').on('keyup', () => {
        let password = $('#password').val(),
            confirmPassword = $('#confirm_password').val(),
            msg = $('#message');
        ((password !== confirmPassword)) ? msg.html('Not Matching').css('color', 'red') : msg.html('Matching').css('color', 'green');
    })
</script>