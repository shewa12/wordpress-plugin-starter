<?php
/**
 * Admin module loader
 *
 * @package TutorPeriscope\Admin
 *
 * @since v2.0.0
 */

namespace PluginStarter\Admin;

use PluginStarter\Admin\Menu\MainMenu;

/**
 * Admin Package loader
 *
 * @since v2.0.0
 */
class Admin {

	/**
	 * Load dependencies
	 *
	 * @since v2.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		new MainMenu();
	}
}
