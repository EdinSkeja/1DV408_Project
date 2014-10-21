<?php 
namespace Controller;

class LoginController {
	public function DoControll($lhandler) {
		$xhtml = '';
		$failmess = '';
		$lview = new \View\LoginView();

		if ($lhandler -> CheckLoggedIn()) {
			$xhtml = $lview -> GetLoggedIn();
		} else {
			if ($lview -> CheckCookies()) {	
				$lhandler -> Login($lview -> decrypt($_COOKIE[$lview -> username]), $lview -> decrypt($_COOKIE[$lview -> password]));
			}

			if ($lview -> Submit()) {
				$failmess = $lhandler -> Login($lview -> Username(), $lview -> Password());
				if ($failmess == \Model\LoginHandler::FIELDS_EMPTY) {
					$failmess = $lview -> FieldsAreEmpty();
				} elseif ($failmess == \Model\LoginHandler::USERNAME_FORMAT_FAIL) {
					$failmess = $lview -> UsernameFormatFail();
				} elseif ($failmess == \Model\LoginHandler::PASSWORD_FORMAT_FAIL) {
					$failmess = $lview -> PasswordFormatFail();
				} elseif ($failmess == \Model\LoginHandler::PASSWORD_MATCH_FAIL) {
					$failmess = $lview -> PasswordMatchFail();
				} elseif ($failmess == \Model\LoginHandler::LOGGED_IN) {
					if ($lview -> Remember()) {
						$lview -> CreateCookies($lview -> encrypt($lview -> Username()), $lview -> encrypt($lview -> Password()));
					}
				}
			}
			$xhtml = $lview -> GetLogin($failmess);
		}		
		return $xhtml;
	}	
}