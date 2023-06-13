<?php

class Account extends Controller
{

	public function Index()
	{
		if ( ! $this->auth->loggedin()) {
			
			$this->redirect(APP_URL . "/Account/login/");
		}
		
		//Handle POST Request
		if(isset($_POST['name'])){
			
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			if(!empty($_POST['name'])){
				
				if(Util::validateNumber($_POST['phone'])){
					
					$udata['name'] = $_POST['name'];
					
					$udata['phone'] = $_POST['phone'];
					
					$udata['photo'] = $this->auth->userinfo['photo'];
					
					$uploaded = false;
					
					//Upload Image
					if (isset($_FILES['photo']) && $_FILES['photo']['tmp_name'] != "" && getimagesize($_FILES["photo"]["tmp_name"]) !== false) {
						
						if ($_FILES["photo"]["size"] < 500000) {
							
							$image_path = "/public/images/user_img/" . $_SESSION['userid'] .'_'. time() . ".png";
							
							if (move_uploaded_file($_FILES["photo"]["tmp_name"], getcwd() . $image_path)) {
								
								$udata['photo'] = $image_path;
								
								$uploaded = true;
								
							}else{
								
								$this->setMessage('error', 'Failed to Upload Image');
							}
							
						}else{
							
							$this->setMessage('error', 'Sorry, Your file is too large. Maximum allowed size is 500KB');
						}
					}
					
					
					//Update Profile
					if($this->model->updateProfile($udata)){
						
						$this->setMessage('success', 'Profile Successfully Updated');
						
						//Delete old photo
						if($uploaded && $this->auth->userinfo['photo'] != '/public/images/no-profile.jpg'){
							
							unlink( getcwd() . $this->auth->userinfo['photo'] );
						}
						
						//Reload page for load new image
						$this->redirect(APP_URL . "/account/");
						
					}else{
						
						$this->setMessage('error', 'Update Failed.');
						
						//Delete new photo
						if($uploaded){
							
							unlink( getcwd() . $udata['photo'] );
						}
					}
					
				}else{
				
					$this->setMessage('error', 'Please enter a valid phone number');
				}
			}else{
				
				$this->setMessage('error', 'Please enter your name');
			}
			
		}
		
		
		
		$this->data['user'] = $this->model->getUserByEmail($this->auth->userinfo['email']);
		
		$this->data['page_title'] = "Profile";
		
		$this->view = 'account/profile';
		
		$this->response();
		
	}

	

	public function Security()
	{
		if ( ! $this->auth->loggedin()) {
			
			$this->redirect(APP_URL . "/Account/login/");
		}

		$user = $this->model->getUserByEmail($this->auth->userinfo['email']);
		
		$this->data = [
			'page_title'           => "Security",
			'2fa'                  => $user['2fa'],
			'2fa_message'          => '',
			'cur_password_err'     => '',
			'password_err'         => '',
			'confirm_password_err' => '',
		];

		//Handle POST Request
		if ( $this->request->method === 'POST' && $this->request->verified ) {

			if (isset($_POST['cur_password']) && ! empty($_POST['cur_password'])) {

				$this->data['password'] = trim($_POST['password']);

				$this->data['confirm_password'] = trim($_POST['password2']);

				//Verify password
				if ($this->data['password'] != $this->data['confirm_password']) {

					$this->data['confirm_password_err'] = 'Passwords do not match';

				} elseif (strlen($this->data['password']) < 8 || strlen($this->data['password']) > 20) {

					$this->data['password_err'] = 'Password must be between 8 and 20 characters';

				} else {

					if ($this->auth->password_verify($_POST['cur_password'], $user['password'])) {

						$update_password = $this->model->setPassword($user['id'], $this->auth->password_hash($this->data['password']));

						if ($update_password) {

							$notification = new Notification;

							$notification->event = 'PASSWORD_CHANGED';

							$notification->Notify();

							$this->setMessage('success', 'Your password has been updated successfully.');

						} else {

							$this->setMessage('error', 'Unknown error occurred.');
						}

					} else {

						$this->data['cur_password_err'] = 'Wrong password';
					}
				}
			}


			if (isset($_POST['2FA']) && ! empty($_POST['2FA'])) {

				if ( ! strlen($_POST['password']) < 8 || ! strlen($_POST['password']) > 20) {

					if ($this->auth->password_verify($_POST['password'], $user['password'])) {

						if ($_POST['2FA'] == 'enable' || $_POST['2FA'] == 'reset') {

							require_once(FRAMEWORK_PATH . 'libraries/GoogleAuthenticator/GoogleAuthenticator.php');

							$GA = new GoogleAuthenticator();

							$twoFactorCode = $GA->createSecret();

							$qrCode = $GA->getQRCodeGoogleUrl(SITE_TITLE, $twoFactorCode);

							if ($this->model->set2FA($user['id'], $twoFactorCode)) {

								$this->data['2fa'] = 1;

								$this->data['2fa_message'] = "
                                    <div class='alert alert-warning alert-dismissible text-white'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <h4><i class='icon fa fa-warning'></i> Setup Authentication Key</h4>
                                        <p>Two factor authentication is now active. Download your preferred authenticator app to your phone (any will work). If you don't have a preferred app, we recommend using
                                        <a href='https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2'>Google Authenticator</a>.
                                        You will be asked to verify your account using Authenticator App whenever you log in.</p>
                                        <p>Please scan the following QR Code with your Authenticator App. You may also enter the Key manually.</p>
                                        <p class='font16' style='margin-top: 15px; color: #8a0000;font-weight: 600'>You will not see this key after leaving this page.</p><br>
                                        <p class='font18' style='font-weight: 600; margin-bottom: 10px;'><i class='fa fa-key'></i> Key: {$twoFactorCode}</p>

                                        <p style='margin-bottom: 5px;'>Scan QR Code</p>
                                        <style>
                                        .qr_code {width: 220px;height: 220px;background-color: #fff;display: flex;align-items: center;justify-content: center;position: relative;}
                                        .qr_code::after{content: 'QR Code is loading';position: absolute;color: #000;text-align: center;}
                                        .qr_code img {position: relative;z-index: 1;}
                                        </style>
                                        <div class='qr_code'>
                                            <img height='200' width='200' src='{$qrCode}' alt='QR Code is loading...' class='img-responsive'>
                                        </div>
                                        <p style='margin-top: 10px'>If you are unable to active two-factor authentication with Google Authenticator at this time, please disable two-factor authentication for now otherwise you will not be able to log into your account next time.</p>
                                    </div>
                                ";

							} else {

								$this->setMessage('error', '2FA not configured.');
							}

						} elseif ($_POST['2FA'] == 'disable') {

							if ($this->model->unset2FA($user['id'])) {

								$this->data['2fa'] = 0;

								$this->setMessage('success', 'Two-factor authentication disabled');

							} else {

								$this->setMessage('error', '2FA not configured.');
							}
						}

					} else {

						$this->setMessage('error', 'Wrong password');
					}

				} else {

					$this->setMessage('error', 'Please enter a valid password');
				}
			}

		}

		$this->view = 'account/security';
		
		$this->response();
	}


	

	public function onAuthenticate()
	{
		if ( ! $this->auth->loggedin()) {
			
			$this->redirect(APP_URL . "/account/login/");
		}
		
		
		if (isset($_SESSION['redirect'])) {
			
			$this->redirect($_SESSION['redirect']);
			
		} 
	
		$this->redirect(APP_URL . "/");
		
	}

	public function Login()
	{
		if ($this->auth->loggedin()) {
			
			$this->redirect(APP_URL . "/Account/onAuthenticate/");
		}

		if (isset($_POST['login'])) {
			
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			if (empty($_POST['login']) || empty($_POST['password'])) {
				
				$this->setMessage('error', "Please enter your login details.");
				
			} elseif ($canLogin = $this->model->canLogin($_POST['login'])) {
				
				$user = $this->model->getUserByEmail($_POST['login']);
				
				$remember_me = isset($_POST['remember_me']) ? 1 : 0;
				

				if ($user && $user['status'] === 1 && $this->auth->password_verify($_POST['password'], $user['password'])) {

					if ($user['2fa'] == 1) {
						
						if( $this->request->type == 'API' && ENABLE_TOKEN_AUTHENTICATION ){
							
							$token_data = [
								'token' => Util::generateRandomString(64),
								'type' => '2FA',
								'origin' => $this->request->origin,
								'remember' => $remember_me,
								'ip' => $this->request->client_ip,
								'data' => ''
							];
							
							$this->model->registerToken($token_data);
							
							$this->data['token'] = $token_data['token'];
							
							$this->setMessage('success', "2FA Required");
							
						}else{
							
							$_SESSION['2FA'] = $user['email'];
							
							$_SESSION['remember_me'] = $remember_me;
						}
						
					} else {
						
						$this->model->addValidLogin($_POST['login']);
						
						if( $this->request->type == 'API' && ENABLE_TOKEN_AUTHENTICATION){
							
							$token_data = [
								'token' => Util::generateRandomString(64),
								'type' => 'login',
								'origin' => $this->request->origin,
								'remember' => $remember_me,
								'ip' => $this->request->client_ip,
								'data' => ''
							];
							
							$this->model->registerToken($token_data);
							
							$this->data['token'] = $token_data['token'];
							
						}else{
							
							$this->session->login($_POST['login'], $remember_me);
							
							$this->redirect(APP_URL . "/Account/onAuthenticate/");
						}
						
					}
					
				} else {
					
					$this->model->addInvalidLogin($_POST['login']);
					
					$this->setMessage('error', "Invalid login details.");
				}
				
			} else {
				
				$this->setMessage('error', "Your account has been locked for 30 minutes. Please try again after 30 minutes.");
			}
		}


		//Handle 2FA Request
		if (!empty($_POST['2FA_otp'])) {
			
			$user = false;
			
			if(isset($_SESSION['2FA'])){
				
				$user = $this->model->getUserByEmail($_SESSION['2FA']);
				
			}elseif( ! empty($_POST['token']) ){
				
				$user = $this->model->getUserByToken('2FA', $_POST['token'], $this->request->origin);
			}
			
			
			if($user){
				
				require_once(FRAMEWORK_PATH . 'libraries/GoogleAuthenticator/GoogleAuthenticator.php');
			
				$GA = new GoogleAuthenticator();

				if ($GA->verifyCode($user['2fa_token'], trim($_POST['2FA_otp']), 2)) {
					
					$this->model->addValidLogin($user['email']);
					
					if( $this->request->type == 'API' ){
						
						$this->session->login($user['email'], $_SESSION['remember_me']);
					
						unset($_SESSION['2FA']);
						
						$this->redirect(APP_URL . "/Account/onAuthenticate/");
						
					}else{
						
						$this->db->Query("UPDATE token SET type='login' WHERE uid=? AND token=?", $user['id'], $_POST['token']);
						
						$this->setMessage('success', 'Token Verfied');
					}
					
					
				} else {
					
					$this->setMessage('error', 'Wrong OTP');
				}
			}

			
		}

		$this->data['page_title'] = isset($_SESSION['2FA']) ? 'Two Factor Authentication' : 'Login';
		
		$this->view = 'account/login';
		
		$this->response();
		
	}


	public function Register()
	{
		if ($this->auth->loggedin()) {
			
			$this->redirect(APP_URL . "/Account/onAuthenticate/");
		}

		if ( ! ALLOW_REGISTRATION) {
			
			$this->setMessage('error', 'Registration is currently disabled.');
			
			if($this->request->type == 'WEB'){

				$this->redirect("/Account/login/");
				
			}
			
		}

		$this->data = [
			'page_heading'         => 'Register a new account',
			'name'                 => '',
			'email'                => '',
			'password'             => '',
			'confirm_password'     => '',
			'mobile'               => '',
			'name_err'             => '',
			'email_err'            => '',
			'country_err'          => '',
			'password_err'         => '',
			'confirm_password_err' => '',
			'mobile_err'           => '',
			'otp_err'              => '',
		];


		if (isset($_SESSION['reg_otp'])) {
			
			$this->data['page_heading'] = '<b>Mobile Number Verification</b><br>A verification code has been sent to ' . $_SESSION['reg_mobile'];
			
			$this->data['otp_err'] = '';
		}


		if (!empty($_POST['otp'])) {
			
			$otp = false;
			
			if (trim($_POST['otp']) == $_SESSION['reg_otp']) {
				
				$otp = true;
				
			}elseif( !empty($_POST['token']) ){
				
				$t_data = $this->model->getUserByToken('register', $_POST['token'], $this->request->origin);
				
				if($t_data){
					
					$t_data = json_decode($t_data['data'], true);
					
					if($t_data['otp'] == trim($_POST['otp'])){
						
						$_SESSION['reg_name'] = $t_data['reg_name'];
						$_SESSION['reg_email'] = $t_data['reg_email'];
						$_SESSION['reg_mobile'] = $t_data['reg_mobile'];
						$_SESSION['reg_country'] = $t_data['reg_country'];
						$_SESSION['reg_password'] = $t_data['reg_password'];
						$_SESSION['reg_email_token'] = $t_data['reg_email_token'];
						
						$otp = true;
					}
				}
				
			}
			
			if ($otp) {
				
				if ($this->model->register()) {
					
					$this->setMessage('success', 'Your account has been successfully registered.');

					$this->onRegister($_SESSION['reg_email']);
					
					if($this->request->type == 'WEB'){
						
						$this->redirect(APP_URL . "/");
					}
					
				} else {
					
					$this->setMessage('error', 'Unknown error occurred.');
				}
				
			} else {
				
				$this->data['otp_err'] = 'Invalid OTP Code';
			}
		}
		

		if (isset($_POST['email'])) {
			
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$this->data['name'] = trim($_POST['name']);
			$this->data['email'] = trim($_POST['email']);
			$this->data['country'] = trim($_POST['country']);
			$this->data['password'] = trim($_POST['password']);
			$this->data['confirm_password'] = trim($_POST['password2']);
			$this->data['mobile'] = trim($_POST['mobile']);


			//Verfiy Name
			if (strlen($this->data['name']) < 5 || strlen($this->data['name']) > 40) {
				
				$this->data['name_err'] = 'Name must be between 5 and 40 characters';
			}
			
			//Verfiy Email
			if ( ! filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
				
				$this->data['email_err'] = 'Please enter a valid email';
				
			} else {
				
				if ($this->model->getUserByEmail($this->data['email'])) {
					
					$this->data['email_err'] = 'Email already registered';
				}
			}
			

			//Verify password
			if ($this->data['password'] != $this->data['confirm_password']) {
				
				$this->data['confirm_password_err'] = 'Passwords do not match';
				
			} elseif (strlen($this->data['password']) < 8 || strlen($this->data['password']) > 20) {
				
				$this->data['password_err'] = 'Password must be between 8 and 20 characters';
			}

			//Verfiy Mobile Number Format
			$checked_number = Util::validateNumber($this->data['mobile']);
			
			if ( ! $checked_number) {
				
				$this->data['mobile_err'] = 'Please enter a valid mobile number';
				
			} else {
				
				$this->data['mobile'] = $checked_number;
				
				if ($this->model->numberExists($checked_number)) {
					
					$this->data['mobile_err'] = 'Mobile number already exists';
				}
			}


			//Check data and proceed
			
			if (empty($this->data['name_err']) && empty($this->data['email_err']) && empty($this->data['password_err']) && empty($this->data['confirm_password_err']) && empty($this->data['mobile_err'])) {
				
				$_SESSION['reg_name'] = $this->data['name'];
				$_SESSION['reg_email'] = $this->data['email'];
				$_SESSION['reg_mobile'] = $this->data['mobile'];
				$_SESSION['reg_country'] = $this->data['country'];
				$_SESSION['reg_password'] = $this->auth->password_hash($this->data['password']);
				$_SESSION['reg_email_token'] = Util::generateRandomString();

				if (VERIFY_PHONE_AT_REGISTRATION) {
					
					$_SESSION['reg_otp'] = $this->generateOTP();

					require FRAMEWORK_PATH . 'helpers/sms.class.php';

					$sms_sender = new SMS;

					$sms_sender->sendSMS($this->data['mobile'], "Your " . SITE_TITLE . " Verification Code is: " . $_SESSION['reg_otp']);
					
					if($this->request->type == 'API'){
						
						$token_data = [
							'token' => Util::generateRandomString(64),
							'type' => 'register',
							'origin' => $this->request->origin,
							'remember' => 0,
							'ip' => $this->request->client_ip,
							'data' => json_encode(['otp'=>$_SESSION['reg_otp'], 'reg_name'=>$_SESSION['reg_name'], 'reg_email'=>$_SESSION['reg_email'], 'reg_mobile'=>$_SESSION['reg_mobile'], 'reg_country'=>$_SESSION['reg_country'], 'reg_password'=>$_SESSION['reg_password'], 'reg_email_token'=>$_SESSION['reg_email_token']])
						];
							
						$this->model->registerToken($token_data);
							
						$this->data['token'] = $token_data['token'];
							
						$this->setMessage('success', "OTP Required");
						
					}else{
						
						$this->data['page_heading'] = '<b>Mobile Number Verification</b><br>A verification code has been sent to ' . $this->data['mobile'];
					}
					
					
				} else {
					
					if ($this->model->register()) {
						
						$this->setMessage('success', 'Your account has been successfully registered.');

						$this->onRegister($_SESSION['reg_email']);
						
						if($this->request->type == 'WEB'){
							
							$this->redirect(APP_URL . "/");
						}
						
						
					} else {
						
						$this->setMessage('error', 'Unknown error occurred.');
					}
				}
			}
		}

		$this->data['page_title'] = 'Registration';
		
		$this->view = 'account/register';
		
		$this->response();
	}


	private function onRegister($email){
		
		$user = $this->model->getUserByEmail($email);
		
		if (VERIFY_EMAIL_AT_REGISTRATION) {
							
			$notification = new Notification;

			$notification->event = 'USER_REGISTERED';

			$notification->user_id = $user['id'];

			$notification->setData('VERYFY_LINK', APP_URL . '/account/confirm_email/' . $_SESSION['reg_email_token']);

			if ($notification->Notify()) {
								
				$this->setMessage('warning', 'A verification mail has been sent to ' . $email . '. Please check & verify your email address.');
			}
		}
	}



	public function Recovery($token = NULL)
	{
		if ($this->auth->loggedin()) {
			
			$this->redirect(APP_URL . "/Account/onAuthenticate/");
		}

		if ( ! ALLOW_FORGET_PASSWORD) {
			
			$this->setMessage('error', 'Password Recovery is currently disabled.');
			
			if($this->request->type == 'WEB'){

				$this->redirect("/Account/login/");
			}
		}

		$this->data = [
			'page_title'           => 'Forgot Password',
			'password'             => '',
			'confirm_password'     => '',
			'mode'                 => NULL,
			'password_err'         => '',
			'confirm_password_err' => '',
		];

		if (isset($_POST['recovery_email'])) {
			
			$this->data['email'] = strtolower(trim($_POST['recovery_email']));

			//Verify Email
			if ( ! filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
				
				$this->setMessage('error', 'Please enter a valid email');
				
			} elseif ($user = $this->model->getUserByEmail($this->data['email'])) {
				
				$Gtoken = Util::generateRandomString();

				$this->model->setRecovery($user, $Gtoken, $this->request->client_ip);

				$notification = new Notification();

				$notification->event = 'PASSWORD_RECOVERY';

				$notification->user_id = $user['id'];

				$notification->setData('VERYFY_LINK', APP_URL . '/account/recovery/' . $Gtoken);

				if ($notification->Notify()) {
					
					$this->setMessage('success', 'We have sent you an email with instructions on how to reset your password.');
					
				} else {
					
					$this->setMessage('error', 'Something went wrong.');
				}
				
			} else {
				
				$this->setMessage('error', 'No account found with that email.');
			}
		}

		if (isset($token)) {
			
			if ($recovery = $this->model->getRecoveryInfo(trim($token))) {
				
				if (time() < strtotime($recovery['last_activity'])) {
					
					$this->data['page_title'] = "Set new password";
					
					$this->data['mode'] = "recovery";

					if (isset($_POST['password'])) {
						
						$this->data['password'] = trim($_POST['password']);
						
						$this->data['confirm_password'] = trim($_POST['password2']);

						//Verify password
						if ($this->data['password'] != $this->data['confirm_password']) {
							
							$this->data['confirm_password_err'] = 'Passwords do not match';
							
						} elseif (strlen($this->data['password']) < 8 || strlen($this->data['password']) > 20) {
							
							$this->data['password_err'] = 'Password must be between 8 and 20 characters';
						}

						if (empty($this->data['password_err']) && empty($this->data['confirm_password_err'])) {
							
							if ($this->model->setPassword($recovery['uid'], $this->auth->password_hash($this->data['password']))) {
								
								$notification = new Notification;

								$notification->event = 'PASSWORD_CHANGED';

								$notification->user_id = $recovery['uid'];

								$notification->Notify();

								$this->setMessage('success', 'Your password has been reset.');

								$this->redirect(APP_URL . "/account/login/");
								
							} else {
								
								$this->setMessage('error', 'Unknown error occurred.');
							}
						}
					}
					
				} else {
					
					$this->setMessage('error', 'Token Expired');
				}
				
			} else {
				
				$this->setMessage('error', 'Invalid token');
			}
		}

		$this->view = 'account/recovery';
		
		$this->response();
	}



	public function Confirm_email($token)
	{
		$user = $this->model->getTokenInfo($token);

		if ($user) {
			
			$datediff = time() - strtotime($user['email_token_expire']);
			
			if (floor($datediff / (60 * 60 * 24)) < 1) {
				
				$this->model->verifyEmail($user['email']);
				
				$this->setMessage('success', 'Thank You! Your email has been successfully verified.');
				
			} else {
				
				$this->setMessage('error', 'Token Expired');
			}
			
		} else {
			
			$this->setMessage('error', 'Invalid token.');
		}

		$this->redirect(APP_URL . "/account/login");
	}
	

	public function Logout()
	{
		$this->session->destroy();

		$this->redirect(APP_URL . "/account/login");
	}
	
	
	
	//PRIVATE FUNCTIONS
	
	private function generateOTP()
	{
		$otp = '';

		for ($i = 0; $i < 4; $i++) {
			$otp .= mt_rand(0, 9);
		}

		return $otp;
	}
	

}