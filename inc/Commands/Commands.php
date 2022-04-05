<?php
/**
 * Manage custom commands
 *
 * @package  PluginStarter\Commands
 *
 * @author   Shewa <shewa12kpi@gmail.com>
 *
 * @since    v1.0.0
 */

namespace PluginStarter\Commands;

use PluginStarter\Commands\ApiRequestPerHour;

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Handle custom commands
 */
class Commands {

	/**
	 * Register hooks
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'cli_init', array( __CLASS__, 'register' ) );
	}

	/**
	 * Register commands
	 *
	 * @return void
	 */
	public static function register() {
		\WP_CLI::add_command( 'plugin-starter', new ApiRequestPerHour() );
	}
}
