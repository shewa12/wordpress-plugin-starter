<?php
/**
 * Register custom command
 *
 * @package PluginStarter\Commands
 * @author Shewa <shewa12kpi@gmail.com.com>
 * @link https://shewazone.com
 * @since 1.0.0
 */

namespace PluginStarter\Commands;

/**
 * Custom commands
 *
 * @since 1.0.0
 */
class RegisterCommands {

	/**
	 * Register command
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		// WP Cli command.
		add_action( 'cli_init', array( __CLASS__, 'register_cli_command' ) );
	}

	/**
	 * Register custom command
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function register_cli_command() {
		\WP_CLI::add_command(
			'wps',
			Commands::class
		);
	}
}
