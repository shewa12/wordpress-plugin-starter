<?php
/**
 * Initialize evaluation meta  box on course post
 * Product concrete class.
 *
 * @package PluginStarter\Metabox
 *
 * @since v2.0.0
 */

namespace PluginStarter\Metabox;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Evaluation form meta box
 */
class EvaluationMetabox extends MetaboxFactory {

	/**
	 * Register hooks, register_meta_box method extending
	 * from Parent class: MetaboxFactory.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'register_meta_box' ) );
	}

	/**
	 * Create new meta box, implementation of abstract method
	 *
	 * @since v2.0.0
	 *
	 * @return MetaboxInterface
	 */
	public function create_meta_box(): MetaboxInterface {
		return new Metabox(
			'plugin-starter-evaluation-form',
			__( 'Create Evaluation Form', 'tutor-periscope' ),
			tutor()->course_post_type,
			'advanced',
			'low'
		);
	}

	/**
	 * Meta box view
	 *
	 * @since v2.0.0
	 *
	 * @return void
	 */
	public function meta_box_view() {
		//phpcs:ignore
		echo "<h2>Hello</h2>";
	}
}
