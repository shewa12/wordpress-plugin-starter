<?php
/**
 * EvaluationReport Concrete class
 *
 * @package PluginStarter\Admin\SubMenu
 *
 * @author Shewa <shewa12kpi@gmail.com>
 *
 * @since v1.0.0
 */

namespace PluginStarter\Admin\Menu\SubMenu;

/**
 * EvaluationReport sub menu
 */
class EvaluationReport implements SubMenuInterface {

	/**
	 * Page title
	 *
	 * @since v2.0.0
	 *
	 * @return string  page title
	 */
	public function page_title(): string {
		return __( 'Evalution Report', 'tutor-periscope' );
	}

	/**
	 * Menu title
	 *
	 * @since v2.0.0
	 *
	 * @return string  menu title
	 */
	public function menu_title(): string {
		return __( 'Evalution Report', 'tutor-periscope' );
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
		return 'plugin-start-evaluation-report';
	}

	/**
	 * Render content for this sub-menu page
	 *
	 * @since v2.0.0
	 *
	 * @return void
	 */
	public function view() {
        echo "Evalution Report";
	}
}
