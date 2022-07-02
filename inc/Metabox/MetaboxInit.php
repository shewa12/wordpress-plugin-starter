<?php
/**
 * Initialize meta box module
 *
 * @package TutorPeriscope\Metabox
 *
 * @since v2.0.0
 */

namespace Tutor_Periscope\Metabox;

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
	 * @since v2.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		new EvaluationMetabox();
	}
}
