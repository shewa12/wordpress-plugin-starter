<?php
/**
 * Users List
 *
 * @package PluginStarter\Users
 *
 * @author Shewa <shewa12kpi@gmail.com>
 *
 * @since v1.0.0
 */

namespace PluginStarter\Users;

use PluginStarter\API\DataHandler;
use PluginStarter\API\EndPoints;
use PluginStarter\API\ManageRequest;
use PluginStarter\Cache\UserCache;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Users List Management
 *
 * @since v1.0.0
 */
class ManageUsers {

	const OPTION_KEY = 'plugin-starter-api-request-per-hour';

	/**
	 * Get all user's list
	 *
	 * Get data from cache if not available then get from remote
	 * and set cache & again get from cache.
	 *
	 * @since v1.0.0
	 *
	 * @return array  users list
	 */
	public static function get_all() {
		$data       = false;
		$user_cache = new UserCache( ManageRequest::request_per_hour() );
		if ( $user_cache->has_cache() ) {
			$data = $user_cache->get_cache();
		} else {
			// if data not available in cache, get from remote.
			$get = self::get_from_remote();
			if ( isset( $get['success'] ) && true === $get['success'] ) {
				// set cache data.
				$user_cache->data = $get['data'];
				$user_cache->set_cache();
				// get from cache.
				$data = $user_cache->get_cache();
			}
		}
		return $data;
	}

	/**
	 * Get data from api
	 *
	 * @return array  response data
	 */
	private static function get_from_remote(): array {
		$endpoint  = EndPoints::USERS_ENDPOINT;
		$user_list = DataHandler::get( $endpoint );
		return $user_list;
	}

}

