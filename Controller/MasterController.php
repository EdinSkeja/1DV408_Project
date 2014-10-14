<?php
namespace Controller;

class MasterController {

	public static function doControll() {
		$xhtml = "";
		$pageview = new \Common\Page();
		$database = new \Model\Database();
		$database -> Connect(new \Model\DBConfig());
		$loginhandler = new \Model\LoginHandler($database);
		$logincontroller = new LoginController();
		$route = new \View\Router();

		if($route -> CheckURL()) {
			$xhtml = $logincontroller -> DoControll($loginhandler);
		} else {

		}

		$database -> Close();

		return $pageview -> GetHTMLPage($xhtml);
	}
}