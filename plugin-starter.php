<?php
/**
 * Plugin Name: Plugin Starter
 * Version: 1.0.0
 * Requires at least: 5.3
 * Requires PHP: 5.6
 * Plugin URI: https://sheawzone.com
 * Description: Plugin starter for the WP Developer to speed up plugin development.
 * Author: Shewa
 * Author URI: https://shewazone.com
 * License: GPLv2 or later
 * Text Domain: plugin-starter
 * Domain Path: /assets/languages
 */

use PluginStarter\Assets\Enqueue;
use PluginStarter\Commands\RegisterCommands;

if ( ! class_exists( 'PluginStarter' ) ) {

	/**
	 * PluginStarter main class that trigger the plugin
	 */
	final class PluginStarter {

		/**
		 * Plugin meta data
		 *
		 * @since v1.0.0
		 *
		 * @var $plugin_data
		 */
		private static $plugin_data = array();

		/**
		 * Plugin instance
		 *
		 * @since v1.0.0
		 *
		 * @var $instance
		 */
		public static $instance = null;

		/**
		 * Register hooks and load dependent files
		 *
		 * @since v1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
				include_once __DIR__ . '/vendor/autoload.php';
			}
			register_activation_hook( __FILE__, array( __CLASS__, 'register_activation' ) );
			register_deactivation_hook( __FILE__, array( __CLASS__, 'register_deactivation' ) );
			add_action( 'init', array( __CLASS__, 'load_textdomain' ) );

			$this->load_packages();
		}

		/**
		 * Plugin meta data
		 *
		 * @since v1.0.0
		 *
		 * @return array  contains plugin meta data
		 */
		public static function plugin_data(): array {
			$plugin_data = get_plugin_data(
				__FILE__
			);
			array_push( self::$plugin_data, $plugin_data );

			self::$plugin_data['plugin_url']  = plugin_dir_url( __FILE__ );
			self::$plugin_data['plugin_path'] = plugin_dir_path( __FILE__ );
			self::$plugin_data['base_name']   = plugin_basename( __FILE__ );
			self::$plugin_data['templates']   = trailingslashit( plugin_dir_path( __FILE__ ) . 'templates' );
			self::$plugin_data['views']       = trailingslashit( plugin_dir_path( __FILE__ ) . 'views' );
			self::$plugin_data['assets']      = trailingslashit( plugin_dir_url( __FILE__ ) . 'assets' );
			self::$plugin_data['base_name']   = plugin_basename( __FILE__ );
			// set ENV DEV | PROD.
			self::$plugin_data['env'] = 'DEV';
			return self::$plugin_data;
		}

		/**
		 * Create and return instance of this plugin
		 *
		 * @return self  instance of plugin
		 */
		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Do some stuff after activate plugin
		 *
		 * @return void
		 */
		public static function register_activation() {
			update_option( '_plugin_starter_install_time', time() );
		}

		/**
		 * Do some stuff after deactivate plugin
		 *
		 * @return void
		 */
		public static function register_deactivation() {

		}

		/**
		 * Load plugin text domain
		 *
		 * @return void
		 */
		public static function load_textdomain() {
			load_plugin_textdomain( 'plugin-starter', false, dirname( plugin_basename( __FILE__ ) ) . '/assets/languages' );
		}

		/**
		 * Load packages
		 *
		 * @return void
		 */
		public function load_packages() {
			new Enqueue();
			new RegisterCommands();
		}
	}
	// trigger.
	PluginStarter::instance();
}

