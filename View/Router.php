<?php
namespace View;

class Router {
	
	public function CheckURL() {
		$page = "page";
		$register = "register";
		$newObj = "newobject";
		$login = "login";		
		
		$url = '';
		if(isset($_GET['page'])) {
			$url .= $_GET['page'];
		}
		switch($url) { 			
			case $login:
				return 1;
				break;
			case $register:
				return 2;
				break;
			default:
				return 0;
				break;
		}
	}
}