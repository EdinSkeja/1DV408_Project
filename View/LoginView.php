<?php
namespace View;

class LoginView {

	public $username = 'username';
	public $password = 'password';
	private $remember = 'remember';
	private $submit = 'submit';
	
	public function GetLogin($error) {	
		$old = $this -> Username();
		$ret ="
			<div class='row'>
	            <div class='col-md-4 col-md-offset-4'>
	                <div class='login-panel panel panel-primary'>
	                    <div class='panel-heading'>
	                        <h3 class='panel-title'>Please Sign In</h3>
	                    </div>
	                    <div class='panel-body'>
	                    	$error
	                        <form role='form' action='' method='post' autocomplete='on'>
	                            <fieldset>
	                                <div class='form-group'>
	                                    <input class='form-control' placeholder='Username' name='$this->username' type='text' value='$old' autofocus>
	                                </div>
	                                <div class='form-group'>
	                                    <input class='form-control' placeholder='Password' name='$this->password' type='password'>
	                                </div>
	                                <div class='checkbox'>
	                                    <label>
	                                        <input name='$this->remember' type='checkbox' value='Remember Me'>Remember Me
	                                    </label>
	                                </div>
	                                <!-- Change this to a button or input when using this as a form -->
	                                <input type='submit' name='$this->submit' class='btn btn-lg btn-primary btn-block' value='Sign in' />	                                
	                            </fieldset>
	                        </form>
	                    </div>
	                </div>
	            </div>
        	</div>";
		return $ret;
	}

	public function GetLoggedIn() {	
		$uname = $_SESSION[$this -> username];
		$ret ="
			<div class='row'>
	            <div class='col-md-8 col-md-offset-2'>
	                <div class='panel panel-primary'>
	                    <div class='panel-heading'>
	                        <h3 class='panel-title'>Welcome $uname</h3>
	                    </div>
	                    <div class='panel-body'>
	                    	<p>Hello</p>
	                    </div>
	                </div>
	            </div>
        	</div>";
		return $ret;
	}

	public function FieldsAreEmpty() {
        $ret = "
            <div class='alert alert-warning alert-dismissible' role='alert'>
            	<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
            	<strong>Warning!</strong> Fields are empty! 
            </div>";
		return $ret;
    }

    public function UsernameFormatFail() {
		$ret = "
			<div class='alert alert-danger alert-dismissable'>
            	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Warning!</strong> Username contains invalid characters!
        	</div>";
        return $ret;
    }

    public function PasswordFormatFail() {
		$ret = "
			<div class='alert alert-danger alert-dismissable'>
            	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Warning!</strong> Password contains invalid characters!
        	</div>";
        return $ret;
    }

    public function UsernameMatchFail() {
		$ret = "
			<div class='alert alert-danger alert-dismissable'>
            	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Warning!</strong> Password is not correct!
        	</div>";
        return $ret;
    }

	public function Submit() {
		return isset($_POST[$this -> submit]) ? true : false;
	}

	public function Username() {
		return isset($_POST[$this -> username]) ? $_POST[$this -> username] : false;
	}

	public function Password() {
		return isset($_POST[$this -> password]) ? $_POST[$this -> password] : false;
	}

	public function Remember() {
		return isset($_POST[$this -> remember]) ? true : false;
	}

	/**
	 * Skapar kakor för användarnamn och lösenord
	 * 
	 * @param string $value
	 * @param string $password
	 */
	public function CreateCookies($username, $password) {
		setcookie($this -> username, $username, time() + 3600 * 24 * 7);
		setcookie($this -> password, $password, time() + 3600 * 24 * 7);
	}

	/**
	 * Kontrollera om cookies finns
	 * 
	 * @return boolean
	 */
	public function CheckCookies() {
		return isset($_COOKIE[$this -> username]) && isset($_COOKIE[$this -> password]) ? true : false;
	}

	/**
	 * Raderar cookies
	 * 
	 */
	public function RemoveCookies() {
		setcookie($this -> username, '', time() - 3600 * 24 * 7);
		unset($_COOKIE[$this -> username]);
		setcookie($this -> password, '', time() - 3600 * 24 * 7);
		unset($_COOKIE[$this -> password]);
	}

	/**
	 * Crypterar en sträng.
	 * 
	 * @param string $value
	 * @return string | boolean
	 */
	public function encrypt($value){
	   if ($value) {
		   $key = 'Do not touch my cookie';
		   $text = $value;
		   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		   $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv);
		   return trim(base64_encode($crypttext));
		} else {
			return false;
		}
	}

	/**
	 * Dekrypterar sträng krypterad med funktionen encrypt.
	 * 
	 * @param string $value
	 * @return string | boolean
	 */
	public function decrypt($value){
		if ($value) {
			$key = 'Do not touch my cookie';
			$crypttext = base64_decode($value); 
			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
			$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
			$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $crypttext, MCRYPT_MODE_ECB, $iv);
			return trim($decrypttext);
		} else {
			return false;
		}		
	}
}