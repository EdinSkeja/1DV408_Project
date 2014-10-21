<?php
namespace Common;

class Validator {

	/**
	 * Validates email
	 *
	 * @param string $email
	 * @return boolean
	 */
	public static function validateEmail($email) {
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
		
		// Ersätter '[a]' med '@' och kollar mot det reguljära uttrycket
		return preg_match($regex, str_replace("[a]", "@", $email)) == 0 ? false : true;
	}

	/**
	 * Validates password
	 * 
	 * @param string $password
	 * @return boolean
	 */
	public static function validatePassword($password) {
		$pattern = '/^.*(?=.{6,12})(?=.*\d)(?=.*[a-z]).*$/';
		return preg_match($pattern, $password) == 0 ? false : true;
	}
	
	/**
	 * Validates username
	 * 
	 * @param string $username
	 * @return boolean
	 */
	public static function validateUsername($username) {
		$regex = '/^[A-Za-z0-9_-]{5,15}$/';
		return preg_match($regex, $username) == 0 ? false : true;
	}
	
	/**
	 * Validates input invalid characters
	 * 
	 * @param string $input
	 * @return boolean
	 */
	public static function validateInput($input) {
		$regex = '/^[A-Za-z0-9_-]$/';
		return preg_match($regex, $input) == 0 ? false : true;
	}

}