<?php
/**
 * Short codes dependencies loaders
 *
 * @package PluginStarter\ShortCodes
 *
 * @since v1.0.0
 */

namespace PluginStarter\ShortCodes;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use PluginStarter\ShortCodes\UsersList;

/**
 * Short codes package loader
 *
 * @since v1.0.0
 */
class LoadShortCodes {

	/**
	 * Load dependencies
	 *
	 * @since v1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		new UsersList();
	}
}
