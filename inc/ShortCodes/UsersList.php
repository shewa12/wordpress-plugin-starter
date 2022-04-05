<?php
/**
 * Users List Short code
 *
 * @package PluginStarter\ShortCode
 *
 * @since v1.0.0
 */

namespace PluginStarter\ShortCodes;

use PluginStarter\Blocks\Block;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register endpoints
 */
class UsersList {

	/**
	 * Namespace for API
	 */
	const SHORT_CODE_NAME = 'plugin-starter-users-list';

	/**
	 * Register hooks
	 *
	 * @since v1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'init', array( __CLASS__, 'register_short_code' ) );
	}

	/**
	 * Register ShortCode
	 *
	 * @return void
	 */
	public static function register_short_code() {
		add_shortcode(
			self::SHORT_CODE_NAME,
			array( __CLASS__, 'short_code_callback' )
		);
	}

	/**
	 * Handle short code callback
	 *
	 * @since v1.0.0
	 *
	 * @param  array $attrs  visibility args.
	 *
	 * @return string  short code template
	 */
	public static function short_code_callback( $attrs ) {
		// prepare default attributes.
		$default_attrs = array(
			'id'    => 'on',
			'fname' => 'on',
			'lname' => 'on',
			'email' => 'on',
			'date'  => 'on',
		);
		$attrs         = shortcode_atts( $default_attrs, $attrs );
		// if attr off then set false otherwise true.
		$refactor_attrs = array_map(
			function( $attr ) {
				return 'off' === $attr ? false : true;
			},
			$attrs
		);
		// using existing block template.
		return Block::frontend_template( $refactor_attrs );
	}
}
