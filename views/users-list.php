<?php
/**
 * Users list page
 *
 * @package PluginStarter\Page
 *
 * @author Shewa <shewa12kpi@gmail.com>
 *
 * @since v1.0.0
 */

?>
<div class="wrap">
	<?php do_action( 'aw_task_before_user_list_page_wrapper' ); ?>
	<div class="plugin-starter-page-wrapper">
		<button type="button" class="ps-cursor-pointer" id="plugin-starter-page-refresh">
			<?php esc_html_e( 'Refresh', 'plugin-starter' ); ?>
		</button>
		<div class="plugin-starter-page-content">

		</div>
	</div>
	<?php do_action( 'aw_task_after_user_list_page_wrapper' ); ?>
</div>
