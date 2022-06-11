<?php
/**
 * BulkUser Concrete class
 *
 * @package PluginStarter\Admin\SubMenu
 *
 * @author Shewa <shewa12kpi@gmail.com>
 *
 * @since v1.0.0
 */

namespace PluginStarter\Admin\Menu\SubMenu;

use PluginStarter\Admin\Menu\MainMenu;

/**
 * BulkUser sub menu
 */
class BulkUser implements SubMenuInterface {

	/**
	 * Page title
	 *
	 * @since v2.0.0
	 *
	 * @return string  page title
	 */
	public function page_title(): string {
		return __( 'BulkUser', 'plugin-starter' );
	}

	/**
	 * Menu title
	 *
	 * @since v2.0.0
	 *
	 * @return string  menu title
	 */
	public function menu_title(): string {
		return __( 'BulkUser', 'plugin-starter' );
	}

	/**
	 * Capability to access this menu
	 *
	 * @since v2.0.0
	 *
	 * @return string  capability
	 */
	public function capability(): string {
		return 'manage_options';
	}

	/**
	 * Page URL slug
	 *
	 * @since v2.0.0
	 *
	 * @return string  slug
	 */
	public function slug(): string {
		return ( new MainMenu( false ) )->slug();
	}

	/**
	 * Render content for this sub-menu page
	 *
	 * @since v2.0.0
	 *
	 * @return void
	 */
	public function view() {

	}
}
