<?php
/**
 * User list admin menu and page management
 *
 * @package PluginStarter\Admin\Pages
 *
 * @author Shewa <shewa12kpi@gmail.com>
 *
 * @since v1.0.0
 */

namespace PluginStarter\Admin\Pages;

use PluginStarter;
use PluginStarter\Cache\UserCache;
use PluginStarter\Users\ManageUsers;
use PluginStarter\Utils\Utilities;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Create admin menu and page management
 *
 * @package PluginStarter\Admin
 *
 * @author Shewa <shewa12kpi@gmail.com>
 *
 * @since v1.0.0
 */
class UsersList extends AbstractPage {

	/**
	 * Capability
	 *
	 * @var string
	 */
	private $capability = 'manage_options';

	/**
	 * Slug for this page
	 *
	 * @var string $slug
	 */
	private $slug = 'plugin-starter';

	/**
	 * Register hooks
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
	}

	/**
	 * Page title
	 *
	 * @return string
	 */
	public function page_title(): string {
		return __( 'Plugin Starter - Users List ', 'plugin-starter' );
	}

	/**
	 * Menu title
	 *
	 * @return string
	 */
	public function menu_title(): string {
		return __( 'Plugin Starter', 'plugin-starter' );
	}

	/**
	 * Capability
	 *
	 * @return string
	 */
	public function capability(): string {
		return $this->capability;
	}

	/**
	 * Slug
	 *
	 * @return string
	 */
	public function slug(): string {
		return $this->slug;
	}

	/**
	 * Position
	 *
	 * @return int
	 */
	public function position(): int {
		return 10;
	}

	/**
	 * Icon name that will used for page menu icon
	 *
	 * @return string
	 */
	public function icon_name(): string {
		return '';
	}

	/**
	 * Page view
	 *
	 * @return void
	 */
	public function view() {
		$plugin_data = PluginStarter::plugin_data();
		Utilities::load_template( $plugin_data['views'] . 'users-list.php', array() );
	}
}

