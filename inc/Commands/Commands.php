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

use Exception;
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
	 * ## OPTIONS
	 *
	 * [--slug=<some-slug>]
	 *
	 * [--namespace=<NameSpace>]
	 *
	 * @param array $args args passed though command.
	 *
	 * @return void
	 */
	public function replace( $args, $assoc_args ) {
		$slug = $assoc_args['slug'] ?? '';
		$namespace = $assoc_args['namespace'] ?? '';
		if ( '' === $slug || '' === $namespace ) {
			\WP_CLI::warning( 'slug & namespace arguments are required' );
		} else {
			try {
				Utilities::update_slug( $slug, $namespace );
			} catch ( Exception $e ) {
				\WP_CLI::error( $slug );
			}
		}
	}
}
