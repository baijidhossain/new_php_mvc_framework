-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2023 at 05:12 AM
-- Server version: 10.3.30-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lxpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl`
--

CREATE TABLE `acl` (
  `id` int(100) UNSIGNED NOT NULL,
  `permission_id` int(10) NOT NULL,
  `group_id` int(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acl`
--

INSERT INTO `acl` (`id`, `permission_id`, `group_id`, `created`) VALUES
(11, 9, 1, '2021-12-04 13:45:15'),
(12, 10, 1, '2021-12-04 13:45:18'),
(109, 1, 1, '2023-05-30 11:08:03'),
(110, 3, 1, '2023-05-30 11:08:06'),
(111, 4, 1, '2023-05-30 11:08:12'),
(112, 5, 1, '2023-05-30 11:08:16'),
(113, 6, 1, '2023-05-30 11:08:19'),
(114, 7, 1, '2023-05-30 11:08:23'),
(115, 8, 1, '2023-05-30 11:08:28'),
(116, 11, 1, '2023-05-30 11:08:47'),
(117, 12, 1, '2023-05-30 11:08:51'),
(118, 13, 1, '2023-05-30 11:08:55'),
(119, 15, 1, '2023-05-30 11:08:59'),
(120, 18, 1, '2023-05-30 11:09:03'),
(121, 19, 1, '2023-05-30 11:09:06'),
(122, 68, 1, '2023-05-30 11:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_url`
--

CREATE TABLE `dynamic_url` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `controller` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL DEFAULT 'Index',
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invalid_login`
--

CREATE TABLE `invalid_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `attempted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(100) UNSIGNED NOT NULL,
  `nav_name` varchar(100) NOT NULL,
  `nav_path` varchar(200) NOT NULL,
  `parent_id` int(100) NOT NULL DEFAULT 0,
  `nav_icon` varchar(50) NOT NULL DEFAULT 'fa fa-circle-o',
  `sort` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `nav_name`, `nav_path`, `parent_id`, `nav_icon`, `sort`) VALUES
(5, 'My Account', '#', 0, 'fa-solid fa-user', 22),
(6, 'Profile', 'Account/Index', 5, 'fa-solid fa-address-card', 24),
(8, 'Logout', 'Account/Logout/', 5, 'fa-solid fa-right-from-bracket', 25),
(9, 'Administration', '#', 0, 'fa-solid fa-gears', 18),
(10, 'Permissions', 'Admin/Permissions/Index', 9, 'fa-solid fa-lock', 21),
(11, 'Navigation', 'Admin/Navs/Index', 9, 'fa-solid fa-bars', 20),
(15, 'Users', 'Admin/Users/Index', 9, 'fa-solid fa-users', 19),
(21, 'Security', 'Account/Security', 5, 'fa-solid fa-user-lock', 23),
(41, 'Home', 'Home/Index', 0, 'fa-solid fa-house', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nav_permission`
--

CREATE TABLE `nav_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `nav_id` int(10) NOT NULL,
  `group_id` int(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nav_permission`
--

INSERT INTO `nav_permission` (`id`, `nav_id`, `group_id`, `created`) VALUES
(1, 41, 1, '2023-05-30 10:54:21'),
(3, 9, 1, '2023-05-30 10:54:46'),
(4, 15, 1, '2023-05-30 10:54:51'),
(5, 11, 1, '2023-05-30 10:54:57'),
(6, 10, 1, '2023-05-30 10:55:01'),
(7, 5, 1, '2023-05-30 10:55:06'),
(8, 21, 1, '2023-05-30 10:55:11'),
(9, 6, 1, '2023-05-30 10:55:16'),
(10, 8, 1, '2023-05-30 10:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) UNSIGNED NOT NULL,
  `event_id` int(10) NOT NULL,
  `template_id` int(10) NOT NULL,
  `type` enum('EMAIL','SMS','ALERT') NOT NULL,
  `group_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `event_id`, `template_id`, `type`, `group_id`, `user_id`, `created`) VALUES
(1, 1, 1, 'EMAIL', 0, 0, '2021-02-13 00:00:00'),
(2, 2, 3, 'EMAIL', 0, 0, '2021-02-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notification_event`
--

CREATE TABLE `notification_event` (
  `id` int(10) UNSIGNED NOT NULL,
  `event` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_event`
--

INSERT INTO `notification_event` (`id`, `event`, `status`, `created`) VALUES
(1, 'USER_REGISTERED', 1, '2021-02-13 09:26:26'),
(2, 'PASSWORD_CHANGED', 1, '2021-02-13 09:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `notification_log`
--

CREATE TABLE `notification_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `event` varchar(100) NOT NULL,
  `template_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `html` mediumtext DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `action` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `action`) VALUES
(1, 'Account/Index'),
(3, 'Admin/Home/Index'),
(4, 'Admin/Navs/Index'),
(5, 'Admin/Navs/Add'),
(6, 'Admin/Navs/UpdateNav'),
(7, 'Admin/Navs/Edit'),
(8, 'Admin/Navs/Delete'),
(9, 'Admin/Permissions/Index'),
(10, 'Admin/Permissions/Edit'),
(11, 'Elements/Index'),
(12, 'Account/Security'),
(13, 'Admin/Users/Index'),
(15, 'Admin/Users/ChangeStatus'),
(18, 'Admin/Users/Add'),
(19, 'Admin/Users/Edit'),
(68, 'Home/Index');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('EMAIL','SMS') NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `html` mediumtext DEFAULT NULL,
  `text` mediumtext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `type`, `name`, `subject`, `html`, `text`, `status`, `created`) VALUES
(1, 'EMAIL', 'email_verification', 'Email Verification', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n		<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n		<head>\r\n			<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n			<!--[if !mso]><!-->\r\n				<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />\r\n			<!--<![endif]-->\r\n			<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />\r\n			<title>{{DATA::SUBJECT}}</title></head>\r\n			<body style=\"margin:0;\">\r\n			<style type=\"text/css\">body{Margin: 0;\r\n					padding: 0;\r\n					min-width: 100%;\r\n					background-color: #ffffff;}\r\n			</style>\r\n			<!--[if (gte mso 9)|(IE)]>\r\n				<style type=\"text/css\">\r\n					table {border-collapse: collapse;}\r\n				</style>\r\n				<![endif]-->\r\n			<center class=\"wrapper\">\r\n			<div class=\"webkit\"><!--[if (gte mso 9)|(IE)]>\r\n						<table width=\"600\" align=\"center\">\r\n						<tr>\r\n						<td>\r\n						<![endif]-->\r\n			<table align=\"center\" style=\"width:100%;max-width:600px;border-spacing:0;\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"padding:0;\">\r\n						<h1 style=\"margin:0;font-size:26px;font-weight:bold;text-align:center;border-bottom:1px solid #ddd;padding-bottom:10px;margin-top:40px;\">{{DATA::SITE_TITLE}}</h1>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"padding:0;\">\r\n						<div style=\"padding:0 40px;\">\r\n						<h4 style=\"margin:30px 0 10px;font-weight:bold;font-size:20px;\">Hi, {{DATA::USER_NAME}}</h4>\r\n\r\n						<p style=\"margin:10px 0;font-size:15px;color:#444;\">Thank you for choosing {{DATA::SITE_TITLE}}</p>\r\n\r\n						<p style=\"margin:5px 0;font-size:15px;color:#444;\">Please confirm that {{DATA::USER_EMAIL}} is your e-mail address by clicking the button below or use the following link <a href=\"{{DATA::VERYFY_LINK}}\">{{DATA::VERYFY_LINK}}</a> within 24 hours.</p>\r\n						</div>\r\n\r\n						<div style=\"padding:0 120px;\"><a href=\"{{DATA::VERYFY_LINK}}\" style=\"display:block;margin:30px 0;background-color:#2d9900;color:#ffffff;font-size:20px;text-decoration:none;padding:10px;font-weight:bold;text-align:center;border-radius:50px;\">Verify you Email</a></div>\r\n\r\n						<p style=\"padding:0 40px;font-size:15px;color:#444;\">If you did not create an account using this address, please ignore this email.</p>\r\n\r\n						<div style=\"margin:40px 0 0;text-align:center;color:#777;\">\r\n						<h4 style=\"margin:0;font-weight:bold;font-size:16px;\">Need Help?</h4>\r\n\r\n						<p style=\"margin:10px 0\">Please send any feedback or bug reports<br />\r\n						to support@{{DATA::DOMAIN}}</p>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"padding:0;\">\r\n						<p style=\"color:#777;border-top:1px solid #ddd;text-align:center;padding-top:8px;margin-bottom:50px;\">&copy; Copyright {{DATA::YEAR}} {{DATA::DOMAIN}}. All rights reserved.</p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			<!--[if (gte mso 9)|(IE)]>\r\n						</td>\r\n						</tr>\r\n						</table>\r\n						<![endif]--></div>\r\n			</center>\r\n\r\n			</body></html>', 'Hi, {{DATA::USER_NAME}}  \r\n\r\nThank you for choosing {{DATA::SITE_TITLE}}  \r\n\r\nPlease confirm that {{DATA::USER_EMAIL}} is your e-mail address by clicking the following link within 24 hours.  \r\n\r\n{{DATA::VERYFY_LINK}}  \r\n\r\nif you did not create an account using this address, please ignore this email.  \r\n\r\n© Copyright {{DATA::YEAR}} {{DATA::DOMAIN}}. All rights reserved.', 1, '2021-02-16 00:00:00'),
(2, 'EMAIL', 'forgot_password', 'Password Recovery', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n		<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n		<head>\r\n			<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n			<!--[if !mso]><!-->\r\n				<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />\r\n			<!--<![endif]-->\r\n			<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />\r\n			<title>{{DATA::SUBJECT}}</title></head>\r\n			<body style=\"margin:0;\">\r\n			<style type=\"text/css\">body{Margin: 0;\r\n					padding: 0;\r\n					min-width: 100%;\r\n					background-color: #ffffff;}\r\n			</style>\r\n			<!--[if (gte mso 9)|(IE)]>\r\n				<style type=\"text/css\">\r\n					table {border-collapse: collapse;}\r\n				</style>\r\n				<![endif]-->\r\n			<center class=\"wrapper\">\r\n			<div class=\"webkit\"><!--[if (gte mso 9)|(IE)]>\r\n						<table width=\"600\" align=\"center\">\r\n						<tr>\r\n						<td>\r\n						<![endif]-->\r\n			<table align=\"center\" style=\"width:100%;max-width:600px;border-spacing:0;\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"padding:0;\">\r\n						<h1 style=\"margin:0;font-size:26px;font-weight:bold;text-align:center;border-bottom:1px solid #ddd;padding-bottom:10px;margin-top:40px;\">{{DATA::SITE_TITLE}}</h1>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"padding:0;\">\r\n						<div style=\"padding:0 40px;\">\r\n						<h4 style=\"margin:30px 0 10px;font-weight:bold;font-size:20px;\">Hi, {{DATA::USER_NAME}}</h4>\r\n\r\n						<p style=\"margin:10px 0;font-size:15px;color:#444;\">Thank you for choosing {{DATA::SITE_TITLE}}</p>\r\n\r\n						<p style=\"margin:5px 0;font-size:15px;color:#444;\">You are receiving this email because we received a password reset request for your IPX Wallet account. Click the button below or use the following link <a href=\"{{DATA::VERYFY_LINK}}\">{{DATA::VERYFY_LINK}}</a> within 12 hours to reset your password.</p>\r\n						</div>\r\n\r\n						<div style=\"padding:0 120px;\"><a href=\"{{DATA::VERYFY_LINK}}\" style=\"display:block;margin:30px 0;background-color:#2d9900;color:#ffffff;font-size:20px;text-decoration:none;padding:10px;font-weight:bold;text-align:center;border-radius:50px;\">Reset Password</a></div>\r\n\r\n						<p style=\"padding:0 40px;font-size:15px;color:#444;\">If you did not request a password reset, please ignore this email.</p>\r\n\r\n						<div style=\"margin:40px 0 0;text-align:center;color:#777;\">\r\n						<h4 style=\"margin:0;font-weight:bold;font-size:16px;\">Need Help?</h4>\r\n\r\n						<p style=\"margin:10px 0\">Please send any feedback or bug reports<br />\r\n						to support@{{DATA::DOMAIN}}</p>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"padding:0;\">\r\n						<p style=\"color:#777;border-top:1px solid #ddd;text-align:center;padding-top:8px;margin-bottom:50px;\">&copy; Copyright {{DATA::YEAR}} {{DATA::DOMAIN}}. All rights reserved.</p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			<!--[if (gte mso 9)|(IE)]>\r\n						</td>\r\n						</tr>\r\n						</table>\r\n						<![endif]--></div>\r\n			</center>\r\n\r\n			</body></html>', 'Hi, {{DATA::USER_NAME}}  \r\n\r\nGreetings from {{DATA::SITE_TITLE}}. \r\n\r\nYou are receiving this email because we received a password reset request for your IPX Wallet account. Use the following link {{DATA::VERYFY_LINK}} . \r\n\r\nif you did not create an account using this address, please ignore this email.  \r\n\r\n© Copyright {{DATA::YEAR}} {{DATA::DOMAIN}}. All rights reserved.', 1, '2021-02-15 00:00:00'),
(3, 'EMAIL', 'admin_alert', 'Password Changed', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n\r\n<head>\r\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />\r\n  <title>{{DATA::SUBJECT}}</title>\r\n</head>\r\n\r\n<body style=\"margin:0;\">\r\n  <style type=\"text/css\">\r\n    body {\r\n      Margin: 0;\r\n      padding: 0;\r\n      min-width: 100%;\r\n      background-color: #ffffff;\r\n    }\r\n  </style>\r\n  <!--[if (gte mso 9)|(IE)]>\r\n				<style type=\"text/css\">\r\n					table {border-collapse: collapse;}\r\n				</style>\r\n				<![endif]-->\r\n  <center class=\"wrapper\">\r\n    <div class=\"webkit\">\r\n      <!--[if (gte mso 9)|(IE)]>\r\n						<table width=\"600\" align=\"center\">\r\n						<tr>\r\n						<td>\r\n						<![endif]-->\r\n      <table align=\"center\" style=\"width:100%;max-width:600px;border-spacing:0;\">\r\n        <tbody>\r\n          <tr>\r\n            <td style=\"padding:0;\">\r\n              <h1 style=\"margin:0;font-size:26px;font-weight:bold;text-align:center;border-bottom:1px solid #ddd;padding-bottom:10px;margin-top:40px;\">{{DATA::SITE_TITLE}}</h1>\r\n            </td>\r\n          </tr>\r\n          <tr>\r\n            <td style=\"padding:0;\">\r\n              <div style=\"padding:0 40px;\">\r\n                <h4 style=\"margin:30px 0 10px;font-weight:bold;font-size:20px;\">Hi, {{DATA::USER_NAME}}</h4>\r\n\r\n                <p style=\"margin:10px 0;font-size:15px;color:#444;\">Greetings from {{DATA::SITE_TITLE}}</p>\r\n\r\n                <p style=\"margin:5px 0;font-size:15px;color:#444;\">Your {{DATA::SITE_TITLE}} account password has been successfully changed.</p>\r\n              </div>\r\n              <h4 style=\"margin:0;font-size: 16px;font-weight:bold;padding: 0 40px;margin-top:20px;\">Didn\'t changed password?</h4>\r\n              <p style=\"padding:0 40px;font-size:15px;color:#444;\">If you didn\'t changed your {{DATA::SITE_TITLE}} account password, please let us know immediately.</p>\r\n\r\n              <div style=\"margin:40px 0 0;text-align:center;color:#777;\">\r\n                <h4 style=\"margin:0;font-weight:bold;font-size:16px;\">Need Help?</h4>\r\n\r\n                <p style=\"margin:10px 0\">Please send any feedback or bug reports<br />\r\n                  to support@{{DATA::DOMAIN}}</p>\r\n              </div>\r\n            </td>\r\n          </tr>\r\n          <tr>\r\n            <td style=\"padding:0;\">\r\n              <p style=\"color:#777;border-top:1px solid #ddd;text-align:center;padding-top:8px;margin-bottom:50px;\">&copy; Copyright {{DATA::YEAR}} {{DATA::DOMAIN}}. All rights reserved.</p>\r\n            </td>\r\n          </tr>\r\n        </tbody>\r\n      </table>\r\n      <!--[if (gte mso 9)|(IE)]>\r\n						</td>\r\n						</tr>\r\n						</table>\r\n						<![endif]-->\r\n    </div>\r\n  </center>\r\n\r\n</body>\r\n\r\n</html>', 'Hi, {{DATA::USER_NAME}}\r\n\r\nGreetings from {{DATA::SITE_TITLE}}\r\n\r\nYour {{DATA::SITE_TITLE}} account password has been successfully changed. \r\n\r\nIf you didn\'t changed your {{DATA::SITE_TITLE}} account password, please let us know immediately. \r\n\r\nPlease send any feedback or bug reports to support@{{DATA::DOMAIN}}\r\n\r\n© Copyright {{DATA::YEAR}} {{DATA::DOMAIN}}. All rights reserved.', 1, '2021-02-17 00:00:00'),
(11, 'EMAIL', 'transaction_alert', 'Transaction Alert', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\"><head><meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\"/> <!--[if !mso]><!--><meta content=\"IE=edge\" http-equiv=\"X-UA-Compatible\"/> <!--<![endif]--><meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\"/><title>{{DATA::SUBJECT}}</title></head><body style=\"margin:0;\"><style type=\"text/css\">body{Margin:0;padding:0;min-width:100%;background-color:#fff}</style><!-- [if !mso]><!--><!--<![endif]--><!-- [if !mso]><!--><!--<![endif]--><!-- [if !mso]><!--><!--<![endif]--><!-- [if !mso]><!--><!--<![endif]--><!-- [if (gte mso 9)|(IE)]><style type=\"text/css\">table{border-collapse:collapse}</style><![endif]--><center class=\"wrapper\">\r\n<div class=\"webkit\"><!-- [if (gte mso 9)|(IE)]>\r\n        <table width=\"600\" align=\"center\">\r\n            <tr>\r\n                <td>\r\n        <![endif]-->\r\n<table align=\"center\" style=\"width: 100%; max-width: 600px; border-spacing: 0;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 0;\">\r\n<h1 style=\"margin: 0; font-size: 26px; font-weight: bold; text-align: center; border-bottom: 1px solid #ddd; padding-bottom: 10px; margin-top: 40px;\">{{DATA::SITE_TITLE}}</h1>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"padding: 0;\">\r\n<div style=\"padding: 0 40px;\">\r\n<h4 style=\"margin: 30px 0 10px; font-weight: bold; font-size: 20px;\">Hi, {{DATA::USER_NAME}}</h4>\r\n<p style=\"margin: 10px 0; font-size: 15px; color: #444;\">Greetings from {{DATA::SITE_TITLE}}</p>\r\n</div>\r\n<div style=\"padding: 0 40px;\">\r\n<p style=\"margin: 10px 0; font-size: 15px; color: #444;\">[Your Content Here2]</p>\r\n</div>\r\n<div style=\"margin: 40px 0 0; text-align: center; color: #777;\">\r\n<h4 style=\"margin: 0; font-weight: bold; font-size: 16px;\">Need Help?</h4>\r\n<p style=\"margin: 10px 0;\">Please send any feedback or bug reports<br />to support@{{DATA::DOMAIN}}</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"padding: 0;\">\r\n<p style=\"color: #777; border-top: 1px solid #ddd; text-align: center; padding-top: 8px; margin-bottom: 50px;\">© Copyright {{DATA::YEAR}} {{DATA::DOMAIN}}. All rights reserved.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- [if (gte mso 9)|(IE)]>\r\n        </td>\r\n        </tr>\r\n        </table>\r\n        <![endif]--></div>\r\n</center></body></html>', 'Delectus dignissimo', 1, '2021-02-17 09:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL DEFAULT 0,
  `token` varchar(64) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `origin` varchar(100) DEFAULT NULL,
  `remember` tinyint(1) NOT NULL DEFAULT 0,
  `data` text DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) DEFAULT '/public/images/no-profile.jpg',
  `password` varchar(100) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `login_key` varchar(100) DEFAULT NULL,
  `email_verified` int(2) NOT NULL DEFAULT 0,
  `email_token` varchar(100) DEFAULT NULL,
  `email_token_expire` datetime DEFAULT NULL,
  `2fa` int(2) NOT NULL DEFAULT 0,
  `2fa_token` varchar(16) DEFAULT NULL,
  `balance` decimal(10,4) NOT NULL DEFAULT 0.0000,
  `status` int(2) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `photo`, `password`, `verified`, `login_key`, `email_verified`, `email_token`, `email_token_expire`, `2fa`, `2fa_token`, `balance`, `status`, `created`) VALUES
(1, 'admim', '8801700000000', 'admin@admin.com', '/public/images/no-profile.jpg', '$2y$10$0PpImXdnR2PqH7Yqbap2JutyuiGU5WR4lUfbJ95y.vqu0KoA2TbHe', 0, '2f84df1b03612959bfcc664f12942af6', 0, NULL, NULL, 0, NULL, '0.0000', 1, '2023-05-29 17:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `group_name`, `created`) VALUES
(1, 'Admin', '2019-11-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_relation`
--

CREATE TABLE `user_group_relation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_group_relation`
--

INSERT INTO `user_group_relation` (`id`, `user_id`, `group_id`, `created`) VALUES
(80, 1, 1, '2021-12-01 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl`
--
ALTER TABLE `acl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_url`
--
ALTER TABLE `dynamic_url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invalid_login`
--
ALTER TABLE `invalid_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nav_permission`
--
ALTER TABLE `nav_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_event`
--
ALTER TABLE `notification_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_log`
--
ALTER TABLE `notification_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group_relation`
--
ALTER TABLE `user_group_relation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acl`
--
ALTER TABLE `acl`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `dynamic_url`
--
ALTER TABLE `dynamic_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invalid_login`
--
ALTER TABLE `invalid_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `nav_permission`
--
ALTER TABLE `nav_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `notification_event`
--
ALTER TABLE `notification_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `notification_log`
--
ALTER TABLE `notification_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_group_relation`
--
ALTER TABLE `user_group_relation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
