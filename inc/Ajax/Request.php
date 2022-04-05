<?php
/**
 * Ajax endpoint for handling ajax request
 *
 * @package PluginStarter\Ajax
 *
 * @since v1.0.0
 */

namespace PluginStarter\Ajax;

use PluginStarter\Users\ManageUsers;

/**
 * Admin Package loader
 *
 * @since v1.0.0
 */
class Request {

	/**
	 * Nonce key
	 */
	const NONCE_KEY = 'aw_task_nonce';

	/**
	 * Register hooks
	 *
	 * @since v1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'wp_ajax_aw_task_user_list', array( __CLASS__, 'get_user_list' ) );
		add_action( 'wp_ajax_nopriv_aw_task_user_list', array( __CLASS__, 'get_user_list' ) );
	}

	/**
	 * Ajax endpoint for getting user list
	 *
	 * @return mixed  user list
	 */
	public static function get_user_list() {
		if ( wp_verify_nonce( $_POST['nonce'], self::NONCE_KEY ) ) {
			wp_send_json_success( ManageUsers::get_all() );
		} else {
			wp_send_json_error( __( 'Nonce verification failed', 'plugin-starter' ) );
		}
		exit;
	}
}
