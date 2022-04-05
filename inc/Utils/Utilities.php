<?php
/**
 * Plugin utilities management
 *
 * @package  PluginStarter\Cache
 *
 * @author   Shewa <shewa12kpi@gmail.com>
 *
 * @since    v1.0.0
 */

namespace PluginStarter\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Plugin's utilities
 */
class Utilities {

	/**
	 * Load template file
	 *
	 * @param string $template  required template file path.
	 * @param mixed  $data  data that will be available on the file.
	 * @param bool   $once  if true file will be included once.
	 *
	 * @return void
	 */
	public static function load_template( string $template, $data, $once = false ) {
		if ( file_exists( $template ) ) {
			if ( $once ) {
				include_once $template;
			} else {
				include $template;
			}
		}
	}
}
