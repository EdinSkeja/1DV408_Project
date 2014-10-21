<?php 
namespace Model;

class LoginHandler {	
	private $database = null;
	private $uname = 'username';
	private $pword = 'password';
	const FIELDS_EMPTY = 1;
	const USERNAME_FORMAT_FAIL = 2;	
	const PASSWORD_FORMAT_FAIL = 3;
	const PASSWORD_MATCH_FAIL = 4;
	const LOGGED_IN = 5;

	public function __construct($db) {
		$this -> database = $db;
	}

	/**
	 * Checks if user is logged in
	 * 
	 * @return boolean
	 */
	public function CheckLoggedIn() {
		return (isset($_SESSION[$this->uname]) && isset($_SESSION[$this->pword]) ? true : false);
	}

	/**
	 * User login
	 * 
	 * @param string $username
	 * @param string $password
	 * @return boolean
	 */
	public function Login($username, $password) {
		$vd = new \Common\Validator();
		if (!empty($username) && !empty($password)) {
			if (!$vd -> validateInput($username)) {
				return self::USERNAME_FORMAT_FAIL;
			}

			if (!$vd -> validateInput($password)) {
				return self::PASSWORD_FORMAT_FAIL;
			} else {			
				$sql = 'SELECT * FROM users where username = ?';
				if ($stmt = $this -> database -> SqlStatement($sql)) {
					$stmt -> bind_param('s', $username);
					$stmt -> execute();
					$stmt -> bind_result($userid, $dbUsername, $dbEmail, $dbPassword, $role);
					if ($stmt -> fetch()) {
						if (password_verify($password, $dbPassword)) {
							$_SESSION[$this -> uname] = $dbUsername;
							$_SESSION[$this -> pword] = $dbPassword;
							return self::LOGGED_IN;
						} else {
							return self::PASSWORD_MATCH_FAIL;
						}
					}
					$stmt -> close();
				}
			}
		} else {
			return self::FIELDS_EMPTY;
		}
	}

	/**
	 * User logout
	 * 
	 * @return boolean
	 */
	public function Logout() {
		return isset($_SESSION[$this -> uname]) ? session_destroy() : false;
	}

	/**
	 * Check user role
	 * 
	 * @param string $username
	 * @return boolean
	 */
	public function CheckRole($username) {
		if (isset($username)) { 
			$sql = 'SELECT role FROM users WHERE username = ?';
			$stmt = $this -> database -> SqlStatement($sql);
			$stmt -> bind_param('s', $username);
			$stmt -> execute();
			$stmt -> bind_result($role);
	        if ($stmt -> fetch()) {
	        	return $role ? true : false;
	        }
	        $stmt -> close();
		}
	}
}