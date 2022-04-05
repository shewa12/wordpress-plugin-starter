<?php
/**
 * Rest API Endpoints
 *
 * @package PluginStarter\API
 *
 * @since v1.0.0
 */

namespace PluginStarter\WPRestApi;

use PluginStarter\Users\ManageUsers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register endpoints
 */
class EndPoints {

	/**
	 * Namespace for API
	 */
	const NAMESPACE = 'plugin-starter/v1';

	/**
	 * Register hooks
	 *
	 * @since v1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'rest_api_init', array( __CLASS__, 'register_routes' ) );
	}

	/**
	 * Register routes
	 *
	 * @return void
	 */
	public static function register_routes() {
		$get_users_endpoint = 'users';
		// register users route and get data.
		register_rest_route(
			self::NAMESPACE,
			$get_users_endpoint,
			array(
				'methods'             => 'GET',
				'callback'            => array( ManageUsers::class, 'get_all' ),
				'permission_callback' => '__return_true',
			),
		);
	}
}
