<?php
namespace View;

class LoginView {

	public $username = 'username';
	public $password = 'password';
	private $remember = 'remember';
	private $submit = 'submit';
	
	public function GetLogin($error) {	
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
	                                    <input class='form-control' placeholder='Username' name='$this->username' type='text' value='$this->Username()' autofocus required>
	                                </div>
	                                <div class='form-group'>
	                                    <input class='form-control' placeholder='Password' name='$this->password' type='password' required>
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

	public function OnlyLetters() {
        $ret = "
            <div class='alert alert-warning alert-dismissible' role='alert'>
            	<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
            	<strong>Warning!</strong> Only letters are allowed
            </div>";
		return $ret;
    }

    public function WrongCredentials() {
		$ret = "
			<div class='alert alert-danger alert-dismissable'>
            	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                You have entered wrong username or password! Try again.
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

	public function CreateCookies($username, $password) {
		setcookie($this -> username, $username, time() + 3600 * 24 * 7);
		setcookie($this -> password, $password, time() + 3600 * 24 * 7);
	}

	public function CheckCookies() {
		return isset($_COOKIE[$this -> username]) && isset($_COOKIE[$this -> password]) ? true : false;
	}

	public function RemoveCookies() {
		setcookie($this -> username, '', time() - 3600 * 24 * 7);
		unset($_COOKIE[$this -> username]);
		setcookie($this -> password, '', time() - 3600 * 24 * 7);
		unset($_COOKIE[$this -> password]);
	}
}