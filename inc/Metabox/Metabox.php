<?php
/**
 * Meta box Factory concrete class
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
 * Metabox
 */
class Metabox implements MetaboxInterface {

	/**
	 * Data members
	 *
	 * @var data-members
	 */
	private $id, $title, $screen, $context, $priority, $args; //phpcs:ignore

	/**
	 * Get meta box param & set props
	 *
	 * @since v1.0.0
	 *
	 * @param string $id  meta box unique id.
	 * @param string $title  meta box title.
	 * @param string $screen  where meta box will be placed.
	 * @param string $context  normal, advanced & side of screen.
	 * @param string $priority  priority order.
	 * @param mixed  $args  args for the callback method.
	 *
	 * @return void
	 */
	public function __construct(
		$id,
		$title,
		$screen,
		$context,
		$priority = 'default',
		$args = ''
	) {
		$this->id       = $id;
		$this->title    = $title;
		$this->screen   = $screen;
		$this->context  = $context;
		$this->priority = $priority;
		$this->args     = $args;
	}

	/**
	 * Get Metabox id
	 *
	 * @since v1.0.0
	 *
	 * @return string
	 */
	public function get_id(): string {
		return $this->id;
	}

	/**
	 * Get Metabox title
	 *
	 * @since v1.0.0
	 *
	 * @return string
	 */
	public function get_title(): string {
		return $this->title;
	}

	/**
	 * Screen, where meta box will be appeared
	 *
	 * @since v1.0.0
	 *
	 * @return string
	 */
	public function get_screen() {
		return $this->screen;
	}

	/**
	 * Get Metabox context, within the screen meta box
	 * will be appeared. Context like: advanced, normal & side
	 *
	 * @since v1.0.0
	 *
	 * @return string
	 */
	public function get_context(): string {
		return $this->context;
	}

	/**
	 * Priority order
	 *
	 * @since v1.0.0
	 *
	 * @return string
	 */
	public function get_priority(): string {
		return $this->priority;
	}

	/**
	 * Arguments that will be available on the call back
	 *
	 * @since v1.0.0
	 *
	 * @return string
	 */
	public function get_args() {
		return $this->args;
	}

}
