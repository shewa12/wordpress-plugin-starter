<?php
/**
 * Meta box interface
 *
 * @package PluginStarter\Metabox
 *
 * @since v1.0.0
 */

namespace PluginStarter\Metabox;

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

interface MetaboxInterface {

	public function get_id() : string;

	public function get_title() : string;

	public function get_screen();

    public function get_context(): string;

    public function get_priority(): string;

    public function get_args();
}
