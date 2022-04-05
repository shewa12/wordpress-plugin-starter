<?php

namespace PluginStarter\Admin;

use PluginStarter\Admin\Pages\UsersList;

/**
 * Admin Package loader
 *
 * @since v1.0.0
 */
class Admin {

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
