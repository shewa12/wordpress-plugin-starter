<?php
/**
 * Page Abstract, contains abstract method
 * derived class must need to defined abstract methods
 *
 * @package PluginStarter\Admin\Pages
 *
 * @since v1.0.0
 */

namespace PluginStarter\Admin\Pages;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class AbstractPage {

	abstract public function page_title() : string;

	abstract public function menu_title() : string;

	abstract public function capability() : string;

	abstract public function slug() : string;

	abstract public function icon_name() : string;

	abstract public function position() : int;

	abstract public function view();

	public function add_menu() {
		add_menu_page(
			$this->page_title(),
			$this->menu_title(),
			$this->capability(),
			$this->slug(),
			array( $this, 'view' ),
			$this->icon_name(),
			$this->position()
		);
	}

}
