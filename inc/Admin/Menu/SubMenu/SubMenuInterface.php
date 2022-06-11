<?php
/**
 * Page , contains  method
 * derived class must need to defined  methods
 *
 * @package PluginStarter\Admin\Menu
 *
 * @since v1.0.0
 */

namespace PluginStarter\Admin\Menu\SubMenu;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *  SubMenuInterface
 */
interface SubMenuInterface {

	public function page_title() : string;

	public function menu_title() : string;

	public function capability() : string;

	public function slug() : string;

	public function view();

}
