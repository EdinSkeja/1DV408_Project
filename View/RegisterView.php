<?php
namespace View;

class RegisterView {

	public $username = 'username';
	public $email = 'email';
	public $password = 'password';
	public $password2 = 'password2';
	public $submit = 'submit';
	
	public function GetRegister($error) {
		$oldUsername = $this -> Username();
		$oldMail = $this ->Email();
		$ret = "
			<div class='row'>
	            <div class='col-md-6 col-md-offset-3'>
	                <div class='login-panel panel panel-primary'>
	                    <div class='panel-heading'>
	                        <h3 class='panel-title'>Register</h3>
	                    </div>
	                    <div class='panel-body'>
	                    	$error
	                        <form role='form' action='' method='post' autocomplete='off'>
	                            <fieldset>
	                                <div class='form-group'>
	                                    <input class='form-control' placeholder='Username' name='$this->username' type='text' value='$oldUsername' autofocus>
	                                </div>
	                                <div class='form-group'>
	                                    <input class='form-control' placeholder='E-mail' name='$this->email' type='email' value='$oldMail'>
	                                </div>
	                                <div class='form-group'>
	                                    <input class='form-control' placeholder='Password' name='$this->password' type='password' >
	                                </div>
	                                <div class='form-group'>
	                                    <input class='form-control' placeholder='Password again' name='$this->password2' type='password' >
	                                </div>
	                                <input type='submit' name='$this->submit' class='btn btn-lg btn-primary btn-block' value='Register' />	                                
	                            </fieldset>
	                        </form>
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
            	Fields are empty! 
            </div>";
		return $ret;
    }

    public function UsernameFormatFail() {
		$ret = "
			<div class='alert alert-danger alert-dismissable'>
         		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              	Username must be between 5-15 letters! Try again.
        	</div>";
        return $ret;
    }

    public function PasswordMatchFail() {
		$ret = "
			<div class='alert alert-danger alert-dismissable'>
         		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                Passwords doesn't match! Try again.
        	</div>";
        return $ret;
    }

    public function EmailFormatFail() {
		$ret = "
			<div class='alert alert-danger alert-dismissable'>
         		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                Email is not correct! Try again.
        	</div>";
        return $ret;
    }

    public function PasswordFormatFail() {
		$ret = "
			<div class='alert alert-danger alert-dismissable'>
         		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                Password must be between 6-12 and contain 1 digit! Try again.
        	</div>";
        return $ret;
    }

    public function EmailInUse() {
		$ret = "
			<div class='alert alert-danger alert-dismissable'>
         		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                The email is already registred to an account!
        	</div>";
        return $ret;
    }

    public function RegistredUser() {
		$ret = "
			<div class='alert alert-danger alert-dismissable'>
         		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                Account has been created. Check your email for more information.
        	</div>";
        return $ret;
    }

    public function UsernameInUse() {
		$ret = "
			<div class='alert alert-danger alert-dismissable'>
         		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                The username is already in use! Try again.
        	</div>";
        return $ret;
    }

    public function Submit() {
		return isset($_POST[$this -> submit]) ? true : false;
	}

	public function Username() {
		return isset($_POST[$this -> username]) ? $_POST[$this -> username] : false;
	}

	public function Email() {
		return isset($_POST[$this -> email]) ? $_POST[$this -> email] : false;
	}

	public function Password() {
		return isset($_POST[$this -> password]) ? $_POST[$this -> password] : false;
	}

	public function Password2() {
		return isset($_POST[$this -> password2]) ? $_POST[$this -> password2] : false;
	}
}