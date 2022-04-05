<?php
/**
 * Template for output view on users list block
 *
 * @package PluginStarter\Template
 *
 * @since v1.0.0
 */

// visibility attributes.
$attributes = isset( $data->attributes ) ? $data->attributes : array();
?>
<div class='plugin-starter-users-list'>
	<?php if ( isset( $data ) ) : ?>
		<h2>
		   <?php echo esc_html( isset( $data->title ) ? $data->title : '' ); ?>
		</h2>
		<table>
			<thead>
				<thead>
					<?php if ( isset( $data->data->headers ) && is_array( $data->data->headers ) ) : ?>
						<?php foreach ( $data->data->headers as $head ) : ?>
							<?php
							// continue if visibility off.
							if ( 'ID' === $head && ! $attributes['id'] ) {
								continue;
							}
							if ( 'First Name' === $head && ! $attributes['fname'] ) {
								continue;
							}
							if ( 'Last Name' === $head && ! $attributes['lname'] ) {
								continue;
							}
							if ( 'Email' === $head && ! $attributes['email'] ) {
								continue;
							}
							if ( 'Date' === $head && ! $attributes['date'] ) {
								continue;
							}
							?>
							<th>
								<?php echo esc_html( $head ); ?>
							</th>
						<?php endforeach; ?>
					<?php endif; ?>
				</thead>
			</thead>
			<tbody>
				<?php if ( isset( $data->data->rows ) && is_object( $data->data->rows ) ) : ?>
					<?php foreach ( $data->data->rows as $key => $row ) : ?>
					<tr>
						<?php if ( $attributes['id'] ) : ?>
						<td>
							<?php echo esc_html( $row->id ); ?>
						</td>
						<?php endif; ?>

						<?php if ( $attributes['fname'] ) : ?>
						<td>
							<?php echo esc_html( $row->fname ); ?>
						</td>
						<?php endif; ?>

						<?php if ( $attributes['lname'] ) : ?>
						<td>
							<?php echo esc_html( $row->lname ); ?>
						</td>
						<?php endif; ?>

						<?php if ( $attributes['email'] ) : ?>
						<td>
							<?php echo esc_html( $row->email ); ?>
						</td>
						<?php endif; ?>

						<?php if ( $attributes['date'] ) : ?>
						<td>
							<?php echo esc_html( $row->date ); ?>
						</td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="100%">
								<?php esc_html_e( 'No record found', 'plugin-starter' ); ?>
							</td>
						</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php else : ?>
		<div class="plugin-starter-invalid-data">
			<?php esc_attr_e( 'Invalid data', 'plugin-starter' ); ?>
		</div>
	<?php endif; ?>
</div>
