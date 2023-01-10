<?php
/**
 * Enqueue Assets, styles & scripts
 *
 * @package PluginStarter\Assets
 * @author Shewa <shewa12kpi@gmail.com.com>
 * @link https://shewazone.com
 * @since 1.0.0
 */

namespace PluginStarter\Assets;

use PluginStarter;

/**
 * Enqueue styles & scripts
 */
class Enqueue {

	/**
	 * Register hooks
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'load_admin_scripts' ) );

		// frontend scripts.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'load_front_end_scripts' ) );

		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'script_text_domain' ) );

		// WP Cli command.
		add_action( 'cli_init', array( __CLASS__, 'register_cli_command' ) );
	}

	/**
	 * Load admin styles & scripts
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function load_admin_scripts(): void {
		$plugin_data = PluginStarter::plugin_data();
		$minify      = 'DEV' === $plugin_data['env'] ? '' : 'min.';
		// load styles & scripts only required page.

		wp_enqueue_style( 'some-plugin-backend-style', $plugin_data['assets'] . 'css/ps-backend.css', array(), filemtime( $plugin_data['plugin_path'] . "assets/css/ps-backend.{$minify}css" ) );

		wp_enqueue_script( 'some-plugin-backend', $plugin_data['assets'] . 'js/backend/ps-backend.js', array( 'wp-i18n' ), filemtime( $plugin_data['plugin_path'] . "assets/js/backend/ps-backend{$minify}.js" ), true );

		// add data to use in js files.
		wp_add_inline_script( 'some-plugin-backend', 'const awData = ' . json_encode( self::scripts_data() ), 'before' );
	}

	/**
	 * Load front end scripts
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function load_front_end_scripts() {
		$plugin_data = PluginStarter::plugin_data();
		// Load front-end script styles here.
	}

	/**
	 * Add inline data in scripts
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function scripts_data() {
		$data = array(
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'aw_task_nonce' ),
		);
		return apply_filters( 'aw_task_inline_script_data', $data );
	}

	/**
	 * Script text domain mapping to make JS script
	 * translate-able
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function script_text_domain() {
		$plugin_data = PluginStarter::plugin_data();
		wp_set_script_translations( 'some-plugin-backend', $plugin_data['plugin_path'] . 'assets/languages/' );
	}

	/**
	 * Update plugin slug with CLI command
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function register_cli_command() {
		\WP_CLI::add_command(
			'ps replace-slug',
			function( $args ) {
				if ( is_array( $args ) && count( $args ) ) {
					$slug = $args[0];
					if ( $slug ) {
						self::update_slug( $slug );
						\WP_CLI::success( $slug );
					} else {
						\WP_CLI::error( 'Invalid slug' );
					}
				} else {
					\WP_CLI::warning( 'Slug argument is missing' );
					\WP_CLI::line( 'Example command: wp some-plugin replace_slug some-slug' );
				}
			}
		);
	}

	/**
	 * Update default some-plugin slug
	 *
	 * Search slug/prefix on each file and replace with
	 * the given slug
	 *
	 * @since 1.0.0
	 *
	 * @param string $slug update to this slug.
	 * @param string $dir directory path.
	 *
	 * @return bool
	 */
	private static function update_slug( $slug, $dir = '' ) {
		$plugin_data = PluginStarter::plugin_data();
		$dir         = '' === $dir ? $plugin_data['plugin_path'] : $dir;

		$needles = array( 'some-plugin', 'some-plugin' );
		$files   = scandir( $dir );
		if ( is_array( $files ) && count( $files ) ) {
			foreach ( $files as $file ) {
				// If directory then get back & scan files again.
				if ( ! in_array( $file, array( '.', '..' ) ) && is_dir( $dir . '/' . $file ) ) {
					$child_dir = $dir . DIRECTORY_SEPARATOR . $file;
					self::update_slug( $slug, $child_dir );
				} else {

					if ( ! in_array( $file, array( '.', '..' ) ) ) {
						$abs_file_path = trailingslashit( $dir ) . $file;
						$file_content  = file_get_contents( $abs_file_path, true );

						foreach ( $needles as $needle ) {
							$file_content = str_replace( $needle, $slug, $file_content );
							file_put_contents( $abs_file_path, $file_content );
						}
					}
				}
			}
		}
		return true;
	}
}
