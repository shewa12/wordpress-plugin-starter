<?php
/**
 * Manage API request per hour
 *
 * @package PluginStarter\API
 *
 * @author Shewa <shewa12kpi@gmail.com>
 *
 * @since v1.0.0
 */

namespace PluginStarter\API;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ManageRequest
 */
class ManageRequest {

	const OPTION_KEY = 'plugin-starter-api-request-per-hour';

	/**
	 * Get the number of allowed request per hour
	 *
	 * @return int
	 */
	public static function request_per_hour(): int {
		$number = get_option( self::OPTION_KEY );
		return $number ? $number : 1;
	}

	/**
	 * Update request per hour limit
	 *
	 * @param  int $number  allowed number per hour.
	 *
	 * @return bool  true on success, false on failure.
	 */
	public static function update_request_per_hour( int $number ) {
		return update_option( self::OPTION_KEY, $number );
	}
}
