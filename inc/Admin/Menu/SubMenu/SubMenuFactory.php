<?php
/**
 * Submenu factory class
 *
 * @package PluginStarter\Admin\Menu
 *
 * @author Shewa <shewa12kpi@gmail.com>
 *
 * @since v1.0.0
 */

namespace PluginStarter\Admin\Menu\SubMenu;

use Exception;

/**
 * Factory class for creating submenu obj
 */
class SubMenuFactory {

	/**
	 * Create instance of sub menu
	 *
	 * @since v2.0.0
	 *
	 * @param string $type  class name.
	 *
	 * @return SubMenuInterface  instance of submenu
	 */
	public static function create( string $type ): SubMenuInterface {
		try {
			$class = "PluginStarter\\Admin\\Menu\\SubMenu\\$type";
			if ( class_exists( $class ) ) {
				return new $class();
			} else {
				// @throws exception message.
				throw new Exception( $class . ' not exists' );
			}
		} catch ( \Exception $e ) {
			echo esc_html( $e->getMessage() );
		}
	}
}
