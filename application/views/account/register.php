<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link rel="icon" href="<?= APP_URL ?>/public/images/logo.png" type="image/png"/>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap"
          rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet" href="<?= APP_URL ?>/public/css/main.css"/>
    <link rel="stylesheet" href="<?= APP_URL ?>/public/css/style.css"/>
    <title><?= $data['page_title'] . ' | ' . SITE_TITLE; ?></title>
</head>
<body class="login-page-bg <?= SKIN_COLOR ?>">
<div class="container">
    <div class="row justify-content-center align-items-start align-items-md-end">
        <div class="login-box">
            <a href="<?= APP_URL ?>" class="text-center">
                <h2 class="text-white"><b>Alpha</b> Framework</h2>
            </a>

			<?php $this->getMessage(); ?>

            <div class="login-form card _card">
                <div class="card-body">
                    <p class="login-msg"><?= $data['page_heading']; ?></p>
					<?php if ( isset( $_SESSION['reg_otp'] ) ): ?>
                        <form method="post" action="" class="custom-control">

	                        <?= $this->request->verifier ?>
                            <label class="input-group has-feedback mb-3">
                                <input type="text"
                                       class="form-control <?= ( ! empty( $data['otp_err'] ) ? 'is-invalid' : '' ) ?>" name="otp"
                                       placeholder="Enter 6-digit verification code" required/>
                                <i class="fas fa-key form-control-feedback"></i>
                                <span class="invalid-feedback"><?= $data['otp_err'] ?? '' ?></span>
                            </label>


                            <div class="row align-items-center">
                                <div class="col-7">
                                    <a href="<?= APP_URL . '/account/logout/' ?>">Cancel</a>
                                </div>
                                <div class="col-5 d-flex justify-content-end">
                                    <button type="submit" class="btn _btn bg_skin px-4 rounded-0">
                                        Verify
                                    </button>
                                </div>
                            </div>
                        </form>

					<?php else : ?>
                        <form method="post" action="" class="">

	                        <?= $this->request->verifier ?>
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-regular fa-user fs-14"></i>
                                    </span>
                                    <input class="form-control <?= ( ! empty( $data['name_err'] ) ? 'is-invalid' : '' ) ?>" name="name" required="" type="text" value="<?= @$this->data['name'] ?>" placeholder="Full name">
                                    <span class="invalid-feedback"><?= $data['name_err'] ?? '' ?></span>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-regular fa-envelope fs-14"></i>
                                    </span>
                                    <input class="form-control <?= ( ! empty( $data['email_err'] ) ? 'is-invalid' : '' ) ?>" name="email" required="" type="email" value="<?= @$this->data['email'] ?>" placeholder="Email">
                                    <span class="invalid-feedback"><?= $data['email_err'] ?? '' ?></span>
                                </div>
                            </div>


                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-mobile-screen-button fs-14"></i>
                                    </span>
                                    <input class="form-control <?= ( ! empty( $data['mobile_err'] ) ? 'is-invalid' : '' ) ?>" name="mobile" required="" type="text" value="<?= @$this->data['mobile'] ?>" placeholder="Phone">
                                    <span class="invalid-feedback"><?= $data['mobile_err'] ?? '' ?></span>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-regular fa-eye fs-14"></i>
                                    </span>
                                    <input class="form-control <?= ( ! empty( $data['password_err'] ) ? 'is-invalid' : '' ) ?>" name="password" required="" type="password" placeholder="Password">
                                    <span class="invalid-feedback"><?= $data['password_err'] ?? '' ?></span>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-regular fa-eye fs-14"></i>
                                    </span>
                                    <input class="form-control <?= ( ! empty( $data['confirm_password_err'] ) ? 'is-invalid' : '' ) ?>" name="confirm_password" required="" type="password" placeholder="Repeat Password">
                                    <span class="invalid-feedback"><?= $data['confirm_password_err'] ?? '' ?></span>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="agree" required/>
                                    <label class="form-check-label" for="agree" style="font-size: 0.81rem">
                                        I Agree For <a class="fw-800" href="<?= APP_URL . '/terms_and_conditions/' ?>" target="_blank">Terms & Conditions.</a>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn _btn btn-lg btn_primary btn-lg w-100 br-7">Register</button>
                            </div>
                        </form>

                        <a class="text_primary" href="<?= APP_URL . '/account/login/' ?>">I already have an account</a>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= APP_URL ?>/public/js/main.js"></script>
</body>
</html>
