<?php
/**
 * Handle user cache data
 *
 * @package  PluginStarter\Cache
 *
 * @author   Shewa <shewa12kpi@gmail.com>
 *
 * @since    v1.0.0
 */

namespace PluginStarter\Cache;

use PluginStarter\Cache\AbstractCache;

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * User data caching
 * Get Set & check
 *
 * @package  PluginStarter\Cache
 *
 * @author   Shewa <shewa12kpi@gmail.com>
 *
 * @since    v1.0.0
 */
class UserCache extends AbstractCache {

	/**
	 * Key for cache identifier
	 *
	 * @var string
	 *
	 * @since v1.0.0
	 */
	private const KEY = 'aw_task_users';

	/**
	 * Cache expire time
	 *
	 * @var string
	 *
	 * @since v1.0.0
	 */
	private const HOUR_IN_SECONDS = 3600;

	/**
	 * Data for caching
	 *
	 * @var string
	 *
	 * @since v1.0.0
	 */
	public $data;

	/**
	 * Allowed request per hour
	 *
	 * @var int
	 */
	private $request_per_hour = 1;

	/**
	 * Set props
	 *
	 * @param int $request  define per hour allowed.
	 *
	 * @since v1.0.0
	 */
	public function __construct( int $request = 1 ) {
		$this->request_per_hour = $request;
	}

	/**
	 * Key
	 *
	 * @return string
	 */
	public function key(): string {
		return self::KEY;
	}

	/**
	 * Cache data
	 *
	 * @return object
	 */
	public function cache_data() {
		return $this->data;
	}

	/**
	 * Cache time
	 *
	 * @return int
	 */
	public function cache_time(): int {
		$cache_time = self::HOUR_IN_SECONDS;
		if ( $this->request_per_hour > 1 ) {
			$cache_time = self::HOUR_IN_SECONDS / $this->request_per_hour;
		}
		return $cache_time;
	}
}
