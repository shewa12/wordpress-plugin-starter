<?php
/**
 * Update API request per hour
 *
 * @package  PluginStarter\Commands
 *
 * @author   Shewa <shewa12kpi@gmail.com>
 *
 * @since    v1.0.0
 */

namespace PluginStarter\Commands;

use PluginStarter\API\ManageRequest;

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * ApiRequestPerHour
 */
class ApiRequestPerHour {

	/**
	 * Handle request per hour command
	 *
	 * @param  array $args  number param.
	 *
	 * @return void
	 */
	public function request_per_hour( $args ) {
		if ( is_array( $args ) && count( $args ) ) {
			$update = ManageRequest::update_request_per_hour( $args[0] );
			if ( $update ) {
				\WP_CLI::success( 'Request updated successfully!' );
			} else {
				\WP_CLI::error( 'Update failed! Please try again.' );
			}
		} else {
			\WP_CLI::warning( 'Define request number. For ex: 1' );
		}
	}
}
