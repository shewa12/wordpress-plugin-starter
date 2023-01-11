<?php
/**
 * Contains utility commands
 *
 * @package PluginStarter\Commands
 * @author Shewa <shewa12kpi@gmail.com.com>
 * @link https://shewazone.com
 * @since 1.0.0
 */

namespace PluginStarter\Commands;

use PluginStarter\Utils\Utilities;

/**
 * Custom commands
 *
 * @since 1.0.0
 */
class Commands {

	/**
	 * Replace slug command
	 *
	 * Usage: wp wps replace_slug some-slug
	 *
	 * @param array $args args passed though command.
	 *
	 * @return void
	 */
	public function replace_slug( $args ) {
		if ( is_array( $args ) && count( $args ) ) {
			$slug = $args[0];
			if ( $slug ) {
				Utilities::update_slug( $slug );
				\WP_CLI::success( $slug );
			} else {
				\WP_CLI::error( 'Invalid slug' );
			}
		} else {
			\WP_CLI::warning( 'Slug argument is missing' );
			\WP_CLI::line( 'Example command: wp wps replace_slug some-slug' );
		}
	}
}
