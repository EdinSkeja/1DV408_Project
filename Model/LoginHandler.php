<?php 
namespace Model;

class LoginHandler {
	
	private $database = null;
	private $uname = 'username';
	private $pword = 'password';

	public function __construct($db) {
		$this -> database = $db;
	}

	public function CheckLoggedIn() {
		return (isset($_SESSION[$this->uname]) && isset($_SESSION[$this->pword]) ? true : false);
	}
	
	public function Login($username, $password) {
		if (isset($username) && isset($password)) {
			$sql = 'SELECT * FROM users where username = ?';
			if ($stmt = $this->database->SqlStatement($sql)) {
				$stmt -> bind_param('s', $username);
				$stmt -> execute();
				$stmt -> bind_result($userid, $dbUsername, $dbPassword, $role);

				while ($stmt->fetch()) {
					if (password_verify($password, $dbPassword)) {
						$_SESSION[$this->uname] = $dbUsername;
						$_SESSION[$this->pword] = $dbPassword;
						return true;
					}
				}
				$stmt->close();
			}
		}
	}

	public function Logout() {
		if (isset($_SESSION[$this -> uname])) {
			session_destroy();
		}
	}

	public function CheckRole($username) {
		if (isset($userid)) { 
			$sql = 'SELECT role FROM users WHERE username = ?';
			$stmt = $this->database->SqlStatement($sql);
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$stmt->bind_result($role);
	        while ($stmt->fetch()) {
	        	return $role ? true : false;
	        }
	        $stmt->close();
		}
	}
}