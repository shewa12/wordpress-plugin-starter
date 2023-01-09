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
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'load_admin_scripts' ) );

		// blocks assets.
		add_action( 'enqueue_block_editor_assets', array( __CLASS__, 'block_scripts_and_styles' ) );

		// frontend scripts.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'load_front_end_scripts' ) );

		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'script_text_domain' ) );
	}

	/**
	 * Load admin styles & scripts
	 *
	 * @return void
	 */
	public static function load_admin_scripts(): void {
		$plugin_data = PluginStarter::plugin_data();
		$page        = isset( $_GET['page'] ) ? $_GET['page'] : '';

		// load styles & scripts only required page.
		if ( '' !== $page && 'plugin-starter' === $page ) {
			// if dev env then load extended file.
			$minify = 'DEV' === $plugin_data['env'] ? '' : 'min.';
			wp_enqueue_style( 'plugin-starter-backend-style', $plugin_data['assets'] . 'css/ps-backend.css', array(), filemtime( $plugin_data['plugin_path'] . "assets/css/ps-backend.{$minify}css" ) );

			wp_enqueue_script( 'plugin-starter-backend', $plugin_data['assets'] . 'js/backend/ps-backend.js', array( 'wp-i18n' ), filemtime( $plugin_data['plugin_path'] . "assets/js/backend/ps-backend{$minify}.js" ), true );

			// add data to use in js files.
			wp_add_inline_script( 'plugin-starter-backend', 'const awData = ' . json_encode( self::scripts_data() ), 'before' );
		}

	}

	/**
	 * Blocks scripts & styles
	 *
	 * @return void
	 */
	public static function block_scripts_and_styles() {
		$plugin_data = PluginStarter::plugin_data();
		// Register block scripts and set translations.
		wp_register_script(
			'plugin-starter-blocks',
			$plugin_data['plugin_url'] . 'dist/blocks.build.js',
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
			filemtime( $plugin_data['plugin_path'] . 'dist/blocks.build.js' ),
			true
		);
		wp_set_script_translations( 'plugin-starter-blocks', 'plugin-starter' );

		// Register our block stylesheet.
		wp_register_style(
			'plugin-starter-blocks-css',
			$plugin_data['plugin_url'] . 'dist/blocks.editor.build.css',
			array(),
			filemtime( $plugin_data['plugin_path'] . 'dist/blocks.editor.build.css' ),
			'all'
		);

		wp_add_inline_script( 'plugin-starter-blocks', 'const awData = ' . json_encode( self::scripts_data() ), 'before' );
	}

	/**
	 * Load front end scripts
	 *
	 * @return void
	 */
	public static function load_front_end_scripts() {
		$plugin_data = PluginStarter::plugin_data();
		wp_enqueue_style(
			'plugin-starter-blocks-css',
			$plugin_data['plugin_url'] . 'dist/blocks.editor.build.css',
			array(),
			filemtime( $plugin_data['plugin_path'] . 'dist/blocks.editor.build.css' ),
			'all'
		);
	}

	/**
	 * Add inline data in scripts
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
	 * Script text domain
	 *
	 * @return void
	 */
	public static function script_text_domain() {
		$plugin_data = PluginStarter::plugin_data();

		wp_set_script_translations( 'plugin-starter-backend', 'plugin-starter', $plugin_data['plugin_path'] . 'assets/languages/' );
	}

}
