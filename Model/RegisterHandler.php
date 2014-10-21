<?php
namespace model;

class RegisterHandler {
	public $database = null;
	const FIELDS_EMPTY = 1;
	const USERNAME_FORMAT_FAIL = 2;
	const EMAIL_FORMAT_FAIL = 3;
	const PASSWORD_FORMAT_FAIL = 4;
	const PASSWORD_MATCH_FAIL = 5;	
	const USERNAME_IN_USE = 5;	
	const EMAIL_IN_USE = 6;
	const REGISTRATION_COMPLETE = 7;

	public function __construct($db) {
		$this -> database = $db;
	}

	/**
	 * Register user
	 * 
	 * @param string $username
	 * @param string $email
	 * @param string $password
	 * @param string $password2
	 * @return boolean
	 */
	public function RegisterUser($username, $email, $password, $password2) {
		$vd = new \Common\Validator();	
		if (!empty($username) && !empty($email) && !empty($password) && !empty($password2)) {
			if (!$vd -> validateUsername($username)) {
				return self::USERNAME_FORMAT_FAIL;
			}

			if (!$vd -> validateEmail($email)) {
				return self::EMAIL_FORMAT_FAIL;
			}

			if (!$vd -> validatePassword($password)) {
				return self::PASSWORD_FORMAT_FAIL;
			}	

			if ($password != $password2) {
				return self::PASSWORD_MATCH_FAIL;
			}				 

			if ($this -> CheckEmail($email)) {
				return self::EMAIL_IN_USE;
			}   
            
            if ($this -> CheckUsername($username)) {	
				return self::USERNAME_IN_USE;
			} else {
				if ($stmt = $this -> database -> SqlStatement('INSERT INTO users (username, email, password) VALUES (?,?,?)')) {
					$cryptpassword = password_hash($password, PASSWORD_BCRYPT);
					$stmt -> bind_param('sss', $username, $email, $cryptpassword);
					$stmt -> execute();
					$stmt -> close();
					return self::REGISTRATION_COMPLETE;
				}
			}
		} else {
			return self::FIELDS_EMPTY;
		}
	}

	/**
	 * Check username
	 * 
	 * @param string $username
	 * @return boolean
	 */
	public function CheckUsername($username) {
		if (isset($username)) {
			$sql = 'SELECT username FROM users where username = ?';
			if ($stmt = $this -> database -> SqlStatement($sql)) {
				$stmt -> bind_param('s', $username);
				$stmt -> execute();
				$stmt -> bind_result($dbUsername);
				if ($stmt -> fetch()) {
					if (strtolower($username) == strtolower($dbUsername)) {
						return true;
					} else {
						return false;
					}
				}
				$stmt -> close();
			}
		}
	}

	/**
	 * Check user email
	 * 
	 * @param string $email
	 * @return boolean
	 */
	public function CheckEmail($email) {
		if (isset($email)) {
			$sql = 'SELECT email FROM users where email = ?';
			if ($stmt = $this -> database -> SqlStatement($sql)) {
				$stmt -> bind_param('s', $email);
				$stmt -> execute();
				$stmt -> bind_result($dbemail);
				if ($stmt -> fetch()) {
					return $dbemail ? true : false;
				}
				$stmt -> close();
			}
		}
	}
}