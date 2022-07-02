<?php
/**
 * Initialize meta box module
 *
 * @package PluginStarter\Metabox
 *
 * @since v1.0.0
 */

namespace PluginStarter\Metabox;

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Load meta box dependent method.
 */
class MetaboxInit {

	/**
	 * Load meta boxes
	 *
	 * @since v1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		new EvaluationMetabox();
	}
}
