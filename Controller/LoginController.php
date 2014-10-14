<?php 
namespace Controller;

class LoginController {

	public function doControll($lhandler) {
		$xhtml = '';
		$failmess = '';
		$lview = new \View\LoginView();

		if ($lhandler -> CheckLoggedIn()) {
			//Add Logout
		} else {
			//Check Cookies
			if ($lview -> CheckCookies()) {
				$lhandler -> Login($_COOKIE[$lview -> username], $_COOKIE[$lview -> password]);
			}

			if ($lview -> Submit()) {
				//Add username and password validator..
				if ($lhandler -> Login($lview -> Username(), $lview -> Password())) {
					if ($lview -> Remember()) {
						$lview -> CreateCookies($lview -> Username(), $lview -> Password());
					}
				} else {
					$failmess .=  $lview -> WrongCredentials();
				}
			}
			$xhtml .= $lview -> GetLogin($failmess);
		}		
		return $xhtml;
	}	
}