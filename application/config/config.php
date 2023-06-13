<?php

define('APP_URL', 'https://lx.dev.alpha.net.bd');
define('FORCE_HTTPS', true);

define('DB_HOST', 'localhost');
define('DB_USER', 'mdriaz');
define('DB_PASS', 'mdriaz@786');
define('DB_NAME', 'lxpanel');

define('MAILER', 'SMTP'); // Values(SMTP OR PHP Mail)
define('SMTP_HOST', '');
define('SMTP_PORT', 587);
define('SMTP_USER', '');
define('SMTP_PASS', '');

define('ENABLE_TOKEN_AUTHENTICATION', true);
define('ALLOW_ORIGINS', ""); //Comma separated domain or * for all
define('SITE_TITLE', 'ZM Admin');
define('SITE_NAME', 'ZM Admin');
define('APP_MODE', 'Debug'); //Values (Debug OR Live)
define('TIMEZONE', 'Asia/Dhaka');
define('ALLOW_FORGET_PASSWORD', false);

define('ALLOW_REGISTRATION', false);
define('DEFAULT_REGISTRATION_GROUP', 3);
define('VERIFY_PHONE_AT_REGISTRATION', false);
define('VERIFY_EMAIL_AT_REGISTRATION', false);
define('REGISTRATION_CAPTCHA', false);
define('LOGIN_CAPTCHA', false);
define('PAGINATION_LIMIT', 20);
define('SKIN_COLOR', 'skin-blue');
define('ENCRYPTION_KEY', 'ZmFjZWJvb2s=');

setlocale(LC_MONETARY, 'en_IN');



