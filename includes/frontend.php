<?php if( $settings->tp_layout_id ): ?>

	<?php echo do_shortcode('[fl_builder_insert_layout id="'. $settings->tp_layout_id .'"]'); ?>

<?php else: ?>

	<div class="alert alert-warning" style="color: #000;" role="alert"><?php _e('Please, select a layout before','bb-layout'); ?></div>
	
<?php endif; ?>