<?php
namespace Controller;

class RegisterController {
	public function DoControll($rhandler) {
		$xhtml = '';
		$failmess = '';
		$rview = new \View\RegisterView();

		if ($rview -> Submit()) {
			$failmess = $rhandler -> RegisterUser($rview -> Username(), $rview -> Email(), $rview -> Password(), $rview -> Password2());
			if ($failmess == \Model\RegisterHandler::FIELDS_EMPTY) {
				$failmess = $rview -> FieldsAreEmpty();
			} elseif ($failmess == \Model\RegisterHandler::USERNAME_FORMAT_FAIL) {
				$failmess = $rview -> UsernameFormatFail();
			} elseif ($failmess == \Model\RegisterHandler::EMAIL_FORMAT_FAIL) {
				$failmess = $rview -> EmailFormatFail();
			} elseif ($failmess == \Model\RegisterHandler::PASSWORD_FORMAT_FAIL) {
				$failmess = $rview -> PasswordFormatFail();
			} elseif ($failmess == \Model\RegisterHandler::PASSWORD_MATCH_FAIL) {
				$failmess = $rview -> PasswordMatchFail();
			} elseif ($failmess == \Model\RegisterHandler::USERNAME_IN_USE) {
				$failmess = $rview -> UsernameInUse();
			} elseif ($failmess == \Model\RegisterHandler::EMAIL_IN_USE) {
				$failmess = $rview -> EmailInUse();
			} elseif ($failmess == \Model\RegisterHandler::REGISTRATION_COMPLETE) {
				$failmess = $rview -> RegistredUser();
			}
		}
		$xhtml = $rview -> GetRegister($failmess);
		return $xhtml;
	}
}