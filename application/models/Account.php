<?php

class AccountModel extends Model
{
	
	public function register()
	{
		$token_expire = date("Y-m-d H:i:s", strtotime('+1 day', time()));

		$insert = $this->db->query('INSERT INTO user (name,phone,email,password,email_token,email_token_expire,created) VALUES (?,?,?,?,?,?,?)', $_SESSION['reg_name'], $_SESSION['reg_mobile'], $_SESSION['reg_email'], $_SESSION['reg_password'], $_SESSION['reg_email_token'], $token_expire, TIMESTAMP);

		if ($insert) {
			
			$userid = $this->db->lastInsertID();
			
			$this->db->query('INSERT INTO user_group_relation (user_id,group_id,created) VALUES (?,?,?)', $userid, DEFAULT_REGISTRATION_GROUP, TIMESTAMP);

			return true;
		}

		return false;
	}
	

	public function getUserByEmail($email)
	{
		$email_search = $this->db->query("SELECT * FROM user WHERE email = ?", $email);
		
		if ($email_search->numRows() > 0) {
			
			return $email_search->fetchArray();
		}

		return false;
	}
	
	
	public function getUserByToken($type, $token, $origin){
		
		$timeout = date("Y-m-d H:i:s", strtotime('-2 minutes'));
		
		$token_search = $this->db->query("SELECT u.*,t.data FROM user AS u JOIN token AS t ON t.uid=u.id WHERE t.type=? AND t.token = ? AND origin=? AND t.last_activity > '$timeout'", $type, $token, $origin);
		
		if ($token_search->numRows() > 0) {
			
			return $token_search->fetchArray();
		}

		return false;
	}


	public function registerToken($data){
		
		$user_id = $_SESSION['user_id'] ?? 0;
		
		$insert = $this->db->query("INSERT INTO token (uid, token, type, origin, remember, data, ip_address, last_activity, created) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", $user_id, $data['token'], $data['type'], $data['origin'], $data['remember'], $data['data'], $data['ip'], TIMESTAMP, TIMESTAMP );
		
		if ($insert) {
			
			return true;
		}
		
		return false;
	}


	public function verifyEmail($email)
	{
		$verify = $this->db->query('UPDATE user SET email_verified = ? WHERE email = ?', '1', $email);

		if ($verify) {
			return true;
		} else {
			return false;
		}
	}

	public function getTokenInfo($token)
	{
		$token_search = $this->db->query("SELECT * FROM user WHERE email_token = ? AND email_verified = ?", $token, '0');
		
		if ($token_search->numRows() > 0) {
			
			return $token_search->fetchArray();
		}

		return false;
	}

	public function getVerificationEmailTemplate()
	{
		$content = $this->db->query("SELECT subject,html,text FROM mail_template WHERE name = ?", 'email_verification_template')->fetchArray();

		return $content;
	}

	public function numberExists($num)
	{
		$number_search = $this->db->query("SELECT * FROM user WHERE phone = ?", $num);
		
		if ($number_search->numRows() > 0) {
			return true;
		}

		return false;
	}

	public function getRecoveryEmailTemplate()
	{
		$content = $this->db->query("SELECT subject,html,text FROM mail_template WHERE name = ?", 'forgot_password_template')->fetchArray();

		return $content;
	}

	public function setRecovery($user, $token, $ip)
	{
		$token_expire = date("Y-m-d H:i:s", strtotime('+12 hours', time()));

		$insert = $this->db->query('INSERT INTO `token` (uid, token, type, ip_address, last_activity, created) VALUES (?,?,?,?)', $user['id'], $token, 'password_recovery', $ip, $token_expire, TIMESTAMP);

		if ($insert->affectedRows() > 0) {
			return true;
		}

		return false;
	}

	public function getRecoveryInfo($token)
	{
		$token_search = $this->db->query("SELECT * FROM token WHERE type = 'password_recovery' AND token = ?", $token);
		
		if ($token_search->numRows() > 0) {
			return $token_search->fetchArray();
		}

		return false;
	}

	public function setPassword($user_id, $password)
	{
		$update = $this->db->query("UPDATE user SET password = ? WHERE id = ?", $password, $user_id);

		if ($update->affectedRows() > 0) {

			$this->db->query("DELETE FROM token WHERE uid = ? ", $user_id);

			return true;
		}

		return false;
	}

	public function set2FA($id, $token)
	{
		$update = $this->db->query("UPDATE user SET 2fa = 1, 2fa_token = ? WHERE id = ?", $token, $id);

		if ($update->affectedRows() > 0) {
			return true;
		}

		return false;
	}

	public function unset2FA($id)
	{
		$update = $this->db->query("UPDATE user SET 2fa = 0 WHERE id = ?", $id);

		if ($update->affectedRows() > 0) {
			return true;
		}

		return false;
	}


	public function addInvalidLogin($email)
	{
		$insert = $this->db->query('INSERT INTO `invalid_login` (ip_address, email, attempted) VALUES (?,?,?)',
			$_SERVER['REMOTE_ADDR'], $email, TIMESTAMP);

		if ($insert->affectedRows() > 0) {
			return true;
		}

		return false;
	}

	public function addValidLogin($email)
	{
		$insert = $this->db->query('DELETE FROM `invalid_login` WHERE email = ? AND ip_address = ?', $email,
			$_SERVER['REMOTE_ADDR']);

		if ($insert->affectedRows() > 0) {
			return true;
		}

		return false;
	}

	public function canLogin($email)
	{
		$before30Min = date("Y-m-d H:i:s", strtotime('-30 minutes', time()));
		$rows = $this->db->query("SELECT id FROM `invalid_login` WHERE email = ? AND ip_address = ? AND attempted >= ? ", $email, $_SERVER['REMOTE_ADDR'], $before30Min);

		if ($rows->numRows() > 5) {
			return false;
		}

		return true;
	}

	public function updateProfile($data)
	{
		$update = $this->db->query("UPDATE user SET name=?,phone=?,photo=? WHERE id=?", $data['name'], $data['phone'], $data['photo'], $_SESSION['userid']);

		if ($update) {
			return true;
		}

		return false;
	}
}