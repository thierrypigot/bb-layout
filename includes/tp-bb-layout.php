<?php
/**
 * @class FL_layout_Module
 */
class FL_tp_bb_layout_Module extends FLBuilderModule {
	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          => __('Layouts', 'bb-layout'),
			'description'   => __('Use layout as module','bb-layout'),
			'category'      => __('Advanced Modules', 'bb-layout'),
			'dir'           => FL_MODULE_LAYOUT_DIR,
			'url'           => FL_MODULE_LAYOUT_URL,
			// 'editor_export' => true,
			// 'enabled'       => true,
			'partial_refresh' => true,
		));
	}
}

function tp_bb_get_layouts()
{
	$layouts = get_posts(array(
		'post_type'			=> 'fl-builder-template',
		'orderby'			=> 'title',
		'order'				=> 'ASC',
		'post_status'		=> 'publish',
		'posts_per_page'	=> -1
	));

	$list_layout = array();

	if( $layouts ){
		$list_layout = array(
			'' => __( '&mdash; Choose a layout &mdash;', 'bb-layout' )
		);

		foreach( $layouts as $layout ) {
			$list_layout[$layout->ID] = $layout->post_title;
		}
	}
	return $list_layout;
}


/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FL_tp_bb_layout_Module', array(
	'general'       => array( // Tab
		'title'         => __('Layouts','bb-layout'),
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => '',
 				'fields'        => array( // Section Fields
					'tp_layout_id'   => array(
						'type'          => 'select',
						'label'         => __('Layout','bb-layout'),
						'options'       => tp_bb_get_layouts()
					),
				)
			)
		)
	),
));
