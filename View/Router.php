<?php
namespace View;

class Router {
	/**
	 * Page navigation
	 * 
	 * @return integer
	 */
	public function CheckURL() {
		$page = "page";
		$register = "register";
		$products = "products";
		$login = "login";				
		$url = '';

		if(isset($_GET['page'])) {
			$url = $_GET['page'];
		}

		switch($url) { 			
			case $login:
				return 1;
				break;
			case $register:
				return 2;
				break;
			case $products:
				return 3;
				break;
			default:
				return 0;
		}
	}
}