<?php
/**
 * Handle API requests
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

use WP_Error;
use WP_Http;

/**
 * Handle API request response for
 * manipulating data
 *
 * @package PluginStarter\API
 *
 * @author Shewa <shewa12kpi@gmail.com>
 *
 * @since v1.0.0
 */
class DataHandler {

	/**
	 * Perform all get request on API
	 *
	 * @param string $url  full URL.
	 *
	 * @return array  get request result
	 *
	 * @since v1.0.0
	 */
	public static function get( string $url ): array {
		do_action( 'aw_task_before_get_api_request', $url );
		$http     = new WP_Http();
		$response = $http->request( $url );
		if ( $response instanceof WP_Error ) {
			$response = array(
				'success' => false,
				'data'    => $response->errors,
			);
			return apply_filters( 'aw_task_error_response', $response );
		}
		$response = array(
			'success' => true,
			'data'    => json_decode( $response['body'] ),
		);
		return apply_filters( 'aw_task_user_data', $response );
	}
}
