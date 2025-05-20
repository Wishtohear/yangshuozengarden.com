<?php

/**
 * @package aapanel-wp-toolkit
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' )
     || ! defined( 'AAP_WP_TOOLKIT_BASEURL' )
     || ! defined( 'AAP_WP_TOOLKIT_BASENAME' )
     || ! defined( 'AAP_WP_TOOLKIT_BASEPATH' )) {
	exit();
}

// The utils of plugin aapanel-wp-toolkit
class aapanel_WP_Toolkit_Utils {

	/**
	 * Generate a random string
	 * @param $length
	 * @return string
	 */
	public static function generateRandomString($length) {
		$symbols = array_merge(
			(array)range('a', 'z'),
			(array)range('A', 'Z'),
			(array)range(0, 9)
		);
		$randomSymbols = array();

		for ($i = 0; $i < $length; $i++) {
			$randomSymbols[] = $symbols[wp_rand(0, count($symbols) - 1)];
		}
		shuffle($randomSymbols);
		return implode("", $randomSymbols);
	}

	/**
	 * Parse request body to array
	 * @return array
	 */
	public static function parseRequestBody() {
		static $params;

		if (!empty($params)) {
			return $params;
		}

		$params = array_merge([], $_GET, $_POST, $_REQUEST);

		if (wp_is_json_request()) {
			 $extra_data = \json_decode(file_get_contents('php://input'), true);
			$params = array_merge($params, $extra_data);
		}

		return $params;
	}
}
