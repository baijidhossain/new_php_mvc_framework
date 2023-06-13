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
                    <p class="login-msg pb-0"><?= $data['page_heading']; ?></p>
					<?php if ( $data['mode'] === "recovery" ) : ?>
                        <form method="post" action="" class="custom-control" autocomplete="off">

	                        <?= $this->request->verifier ?>
                            <label class="input-group has-feedback mb-3">
                                <input type="password"
                                       class="form-control <?= ( ! empty( $data['password_err'] ) ? 'is-invalid' : '' ) ?>"
                                       name="password"
                                       placeholder="New Password" required/>
                                <i class="fas fa-key form-control-feedback"></i>
                                <span class="invalid-feedback"><?= $data['password_err'] ?? '' ?></span>
                            </label>

                            <label class="input-group has-feedback mb-3">
                                <input type="password"
                                       class="form-control <?= ( ! empty( $data['confirm_password_err'] ) ? 'is-invalid' : '' ) ?>"
                                       name="confirm_password"
                                       placeholder="Password Repeat" required/>
                                <i class="fas fa-key form-control-feedback"></i>
                                <span class="invalid-feedback"><?= $data['confirm_password_err'] ?? '' ?></span>
                            </label>


                            <div class="row align-items-center">
                                <div class="col-7">
                                    <a href="<?= APP_URL ?>/account/logout/">Cancel</a>
                                </div>
                                <div class="col-5 d-flex justify-content-end">
                                    <button type="submit" class="btn _btn bg_skin px-4 rounded-0">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>

					<?php else : ?>
                        <p class="mt-0-75r">Please enter your email address. We will email you with instructions.</p>
                        <form method="post" action="" class="mt-4">

	                        <?= $this->request->verifier ?>
                            <div class="form-group mb-0-75r">
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-regular fa-envelope fs-14"></i>
                                </span>
                                    <input type="email" class="form-control" name="recovery_email" placeholder="Enter your email">
                                </div>
                            </div>

                            <div class="form-group my-3">
                                <button type="submit" class="btn _btn btn-lg btn_primary btn-lg w-100 br-7">Submit</button>
                            </div>
                        </form>

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
