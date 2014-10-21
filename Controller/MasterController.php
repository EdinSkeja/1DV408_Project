<?php
namespace Controller;

class MasterController {
	public static function DoControll() {
		$xhtml = "";
		$pageview = new \Common\Page();
		$database = new \Model\Database();
		$database -> Connect(new \Model\DBConfig());
		$loginhandler = new \Model\LoginHandler($database);
		$registerhandler = new \Model\RegisterHandler($database);
		$logincontroller = new LoginController();
		$registercontroller = new RegisterController();
		$route = new \View\Router();

		if ($route -> CheckURL() == 1) {
			$xhtml = $logincontroller -> DoControll($loginhandler);
		} elseif ($route -> CheckURL() == 2) {
			$xhtml = $registercontroller -> DoControll($registerhandler);
		} else {
			// Should be homepage
		}

		$database -> Close();
		return $pageview -> GetHTMLPage($xhtml);
	}
}