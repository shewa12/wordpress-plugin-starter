<?php
/**
 * Plugin utilities management
 *
 * @package  PluginStarter\Utilities
 * @author Shewa <shewa12kpi@gmail.com.com>
 * @link https://shewazone.com
 * @since 1.0.0
 */

namespace PluginStarter\Utils;

use PluginStarter;

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
	public static function update_slug( $slug, $namespace, $dir = '' ) {
		$plugin_data = PluginStarter::plugin_data();
		$dir         = '' === $dir ? $plugin_data['plugin_path'] : $dir;

		$needles = array(
			'plugin-starter' => $slug,
			'Plugin Starter' => $namespace,
			'PluginStarter'  => $namespace,
		);
		$exclude = array( '.git', 'vendor', 'node_modules' );
		$files   = scandir( $dir );

		if ( is_array( $files ) && count( $files ) ) {
			foreach ( $files as $file ) {
				// Ignore excluded dirs.
				if ( in_array( $file, $exclude ) ) {
					continue;
				}

				// If directory then get back & scan files again.
				if ( ! in_array( $file, array( '.', '..' ) ) && is_dir( $dir . '/' . $file ) ) {
					$child_dir = $dir . DIRECTORY_SEPARATOR . $file;
					self::update_slug( $slug, $namespace, $child_dir );
				} else {

					if ( ! in_array( $file, array( '.', '..' ) ) ) {
						$abs_file_path = trailingslashit( $dir ) . $file;
						$file_content  = file_get_contents( $abs_file_path, true );
						error_log( $abs_file_path );
						// foreach ( $needles as $key => $needle ) {
						// 	$file_content = str_replace( $key, $needle, $file_content );
						// 	file_put_contents( $abs_file_path, $file_content );
						// }
					}
				}
			}
		}
		return true;
	}
}
