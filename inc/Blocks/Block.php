<?php
/**
 * Manage gutenberg blocks
 *
 * @package  PluginStarter\Blocks
 *
 * @author   Shewa <shewa12kpi@gmail.com>
 *
 * @since    v1.0.0
 */

namespace PluginStarter\Blocks;

use PluginStarter;
use PluginStarter\Users\ManageUsers;
use PluginStarter\Utils\Utilities;

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Register block
 */
class Block {

	/**
	 * Register hooks
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'init', array( __CLASS__, 'register_block' ) );
	}

	/**
	 * Register blocks
	 *
	 * @return void
	 */
	public static function register_block() {
		register_block_type(
			'plugin-starter/users-list',
			array(
				'attributes'      => array(
					'id'    => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'fname' => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'lname' => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'email' => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'date'  => array(
						'type'    => 'boolean',
						'default' => true,
					),
				),
				'editor_script'   => 'plugin-starter-blocks',
				'editor_style'    => 'plugin-starter-blocks-css',
				'render_callback' => array( __CLASS__, 'frontend_template' ),
			)
		);
	}

	/**
	 * Output block template
	 *
	 * @return string
	 */
	public static function frontend_template( $attr ) {
		$userlist    = ManageUsers::get_all();
		if ( is_object( $userlist ) ) {
			$userlist->attributes = $attr;
		}
		$plugin_data = PluginStarter::plugin_data();
		ob_start();
		Utilities::load_template(
			$plugin_data['templates'] . 'users-list.php',
			$userlist
		);
		return ob_get_clean();
	}
}
