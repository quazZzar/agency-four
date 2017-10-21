<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

if(get_option('subscribers_list')) :
	$subscribers_content = '<h3>There are '. count(get_option('subscribers_list')).' subscribers</h3><ul>';
	foreach(get_option('subscribers_list') as $subscriber) :
		$subscribers_content .= '<li>' . $subscriber . '</li>';
	endforeach;
	$subscribers_content .= '</ul>';
endif;

$settings = array(
	'menu_title'      => 'Agency Four',
	'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
	'menu_slug'       => 'theme_options',
	'ajax_save'       => false,
	'show_reset_all'  => false,
	'framework_title' => 'Agency Four <small>Options</small>',
);

$options[]      = array(
	'name'        => 'general',
	'title'       => 'General',
	'icon'        => 'fa fa-star',
	'fields'      => array(
		array(
			'id'      => 'site_favicon',
			'type'    => 'upload',
			'title'   => 'Website Favicon',
			'desc' => 'Set this to override the default'
		),
		array(
			'id'      => 'site_logo',
			'type'    => 'upload',
			'title'   => 'Website Logo',
			'desc' => 'Set this to override the default'
		),
		array(
			'id'      => 'global_btn_colors',
			'type'    => 'color_picker',
			'title'   => 'Global Button Color',
			'desc' => 'If this is set all the buttons take this color, if this is not set each button has to be set individually'
		)
	), // end: fields
);

$options[]      = array(
	'name'        => 'section1',
	'title'       => 'Section 1',
	'icon'        => 'fa fa-object-group',
	'fields'      => array(
		array(
			'id'      => 'section1_big_text',
			'type'    => 'text',
			'title'   => 'Big Text',
			'desc' => 'Changes: RETIREMENT INCOME NEEDS ...'
		),
		array(
			'id'      => 'section1_small_text',
			'type'    => 'text',
			'title'   => 'Small text',
			'desc' => 'Changes: We are here to help empower ...'
		),
		array(
			'id'      => 'section1_button_text',
			'type'    => 'text',
			'title'   => 'Button text',
			'desc' => 'Changes: Whatch Our Story Text'
		),
		array(
			'id'      => 'section1_button_link',
			'type'    => 'text',
			'title'   => 'Button link',
			'desc' => 'Changes to where the button takes you.'
		),
		array(
			'id'      => 'section1_text_color',
			'type'    => 'color_picker',
			'title'   => 'Text Color',
			'desc' => 'Set this to override the default text color'
		),
		array(
			'id'      => 'section1_button_color',
			'type'    => 'color_picker',
			'title'   => 'Button Color',
			'desc' => 'Set this to override the default button color'
		),
		array(
			'id'      => 'section1_background_video',
			'type'    => 'text',
			'title'   => 'Background Video Link',
			'desc' => 'The video should be uploaded or hosted on your website and have MP4 format'
		),
		
	), // end: fields
);

$options[]      = array(
	'name'        => 'section2',
	'title'       => 'Section 2',
	'icon'        => 'fa fa-object-group',
	'fields'      => array(
		array(
			'id'    => 'section2_use_html_instead_texts',
			'type'  => 'switcher',
			'title' => 'Use HTML ?',
			'label' => 'Do you want to use some HTML instead those 3 lines of text ?',
		),
		array(
			'id'       => 'section2_html_texts',
			'type'     => 'wysiwyg',
			'title'    => 'HTML to show',
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => true,
				'media_buttons' => true,
			),
			'dependency' => array( 'section2_use_html_instead_texts', '==', 'true' ), // dependency rule
			'desc' => 'The HTML goes here'
		),
		array(
			'id'      => 'section2_first_text',
			'type'    => 'text',
			'title'   => 'First Text',
			'dependency' => array( 'section2_use_html_instead_texts', '==', 'false' ), // dependency rule
			'desc' => 'Changes: get instant access ...'
		),
		array(
			'id'      => 'section2_second_text',
			'type'    => 'text',
			'title'   => 'Second Text',
			'dependency' => array( 'section2_use_html_instead_texts', '==', 'false' ), // dependency rule
			'desc' => 'Changes: INCOME PLANNING ...'
		),
		array(
			'id'      => 'section2_second_text_color',
			'type'    => 'color_picker',
			'title'   => 'Second text color',
			'desc' => 'By default it\'s green',
			'dependency' => array( 'section2_use_html_instead_texts', '==', 'false' ) // dependency rule
		),
		array(
			'id'      => 'section2_third_text',
			'type'    => 'text',
			'title'   => 'Third Text',
			'dependency' => array( 'section2_use_html_instead_texts', '==', 'false' ), // dependency rule
			'desc' => 'Changes: Just enter your name and email ...'
		),
		array(
			'id'      => 'section2_image_onright',
			'type'    => 'upload',
			'title'   => 'Section Image',
			'desc' => 'By default there is a book image'
		),
		array(
			'id'      => 'section2_background_color',
			'type'    => 'color_picker',
			'title'   => 'Section background color',
			'desc' => 'By default it\'s gray'
		),
		array(
			'id'    => 'section2_use_html',
			'type'  => 'switcher',
			'title' => 'Use HTML ?',
			'label' => 'Do you want to use the default subscription form or to add some custom HTML ?',
		),
		array(
			'id'       => 'section2_html_content',
			'type'     => 'wysiwyg',
			'title'    => 'HTML to show',
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => true,
				'media_buttons' => true,
			),
			'dependency' => array( 'section2_use_html', '==', 'true' ) // dependency rule
		),
		
	), // end: fields
);

$options[]      = array(
	'name'        => 'section3',
	'title'       => 'Section 3',
	'icon'        => 'fa fa-object-group',
	'fields'      => array(
		array(
			'id'      => 'section3_background_image',
			'type'    => 'upload',
			'title'   => 'Section Background',
			'desc' => 'By default there is a green image'
		),
		array(
			'id'      => 'section3_logo_small_image',
			'type'    => 'upload',
			'title'   => 'Small Logo'
		),
		array(
			'id'      => 'section3_heading_text',
			'type'    => 'text',
			'title'   => 'Heading Text',
			'desc' => 'Changes: MEET OUR CEO ...'

		),
		array(
			'id'      => 'section3_content_text',
			'type'    => 'text',
			'title'   => 'Content Text',
			'desc' => 'Changes: As the CEO of This DEMO Cor ...'
		),
		array(
			'id'      => 'section3_text_color',
			'type'    => 'color_picker',
			'title'   => 'Section text color',
			'desc' => 'By default it\'s white'
		),
		array(
			'id'      => 'section3_button_text',
			'type'    => 'text',
			'title'   => 'Button Text',
			'desc' => 'Changes: Meet Bill Jones'
		),
		array(
			'id'      => 'section3_button_link',
			'type'    => 'text',
			'title'   => 'Button Link',
			'desc' => 'Changes to where the button takes you.'
		),
		array(
			'id'      => 'section3_button_color',
			'type'    => 'color_picker',
			'title'   => 'Button color',
			'desc' => 'By default it\'s white'
		),
		
	), // end: fields
);

$options[]      = array(
	'name'        => 'section4',
	'title'       => 'Section 4',
	'icon'        => 'fa fa-object-group',
	'fields'      => array(
		array(
			'id'      => 'section4_background_color',
			'type'    => 'color_picker',
			'title'   => 'Section background color',
			'desc' => 'By default it\'s gray'
		),
		array(
			'id'      => 'section4_heading_text',
			'type'    => 'text',
			'title'   => 'Heading Text',
			'desc' => 'Changes: We Specialize In...'
		),
		array(
			'id'      => 'section4_content_text',
			'type'    => 'text',
			'title'   => 'Content Text',
			'desc' => 'Changes: To develop a financial ...'
		),
		array(
			'id'      => 'section4_text_color',
			'type'    => 'color_picker',
			'title'   => 'Section text color',
			'desc' => 'By default it\'s black'
		)
		
	), // end: fields
);

$options[]      = array(
	'name'        => 'section5',
	'title'       => 'Section 5',
	'icon'        => 'fa fa-th-large',
	'fields'      => array(
		array(
			'id'      => 'section5_bgcolor',
			'type'    => 'color_picker',
			'title'   => 'Background color',
			'desc' => 'Dark Gray'
		),
		array(
			'id'        => 'fieldset_col_1',
			'type'      => 'fieldset',
			'un_array'  => true,
			'title'     => 'Col 1 Settings',
			'fields'    => array(
				array(
					'id'    => 'section5_col1_use_html',
					'type'  => 'switcher',
					'title' => 'Col 1 Use HTML ?',
					'label' => 'Do you want to use the default content or to add some custom HTML for this column ?',
				),
				array(
					'id'       => 'section5_col1_html',
					'type'     => 'wysiwyg',
					'title'    => 'Column 1 Content',
					'settings' => array(
						'textarea_rows' => 5,
						'tinymce'       => true,
						'media_buttons' => true,
					),
					'desc' => 'Use this editor to replace the first column\'s content',
					'dependency' => array( 'section5_col1_use_html', '==', 'true' ) // dependency rule
				)
			),
		),
		array(
			'id'        => 'fieldset_col_2',
			'type'      => 'fieldset',
			'un_array'  => true,
			'title'     => 'Col 2 Settings',
			'fields'    => array(
				array(
					'id'    => 'section5_col2_use_html',
					'type'  => 'switcher',
					'title' => 'Col 2 Use HTML ?',
					'label' => 'Do you want to use the default content or to add some custom HTML for this column ?',
				),
				array(
					'id'       => 'section5_col2_html',
					'type'     => 'wysiwyg',
					'title'    => 'Column 2 Content',
					'settings' => array(
						'textarea_rows' => 5,
						'tinymce'       => true,
						'media_buttons' => true,
					),
					'desc' => 'Use this editor to replace the second column\'s content',
					'dependency' => array( 'section5_col2_use_html', '==', 'true' ) // dependency rule
				),
			)
		),
		array(
			'id'        => 'fieldset_col_3',
			'type'      => 'fieldset',
			'un_array'  => true,
			'title'     => 'Col 3 Settings',
			'fields'    => array(
				array(
					'id'    => 'section5_col3_use_html',
					'type'  => 'switcher',
					'title' => 'Col 3 Use HTML ?',
					'label' => 'Do you want to use the default content or to add some custom HTML for this column ?',
				),
				array(
					'id'       => 'section5_col3_html',
					'type'     => 'wysiwyg',
					'title'    => 'Column 3 Content',
					'settings' => array(
						'textarea_rows' => 5,
						'tinymce'       => true,
						'media_buttons' => true,
					),
					'desc' => 'Use this editor to replace the third column\'s content',
					'dependency' => array( 'section5_col3_use_html', '==', 'true' ) // dependency rule
				),
			)
		),
		array(
			'id'        => 'fieldset_col_4',
			'type'      => 'fieldset',
			'un_array'  => true,
			'title'     => 'Col 4 Settings',
			'fields'    => array(
				array(
					'id'    => 'section5_col4_use_html',
					'type'  => 'switcher',
					'title' => 'Col 4 Use HTML ?',
					'label' => 'Do you want to use the default content or to add some custom HTML for this column ?',
				),
				array(
					'id'       => 'section5_col4_html',
					'type'     => 'wysiwyg',
					'title'    => 'Column 4 Content',
					'settings' => array(
						'textarea_rows' => 5,
						'tinymce'       => true,
						'media_buttons' => true,
					),
					'desc' => 'Use this editor to replace the fourth column\'s content',
					'dependency' => array( 'section5_col4_use_html', '==', 'true' ) // dependency rule
				),
				array(
					'id'      => 'section5_col4_facebook',
					'type'    => 'text',
					'title'   => 'Facebook page URL',
					'desc' => 'If column is set to use HTML this won\'t show',
					'dependency' => array( 'section5_col4_use_html', '==', 'false' ) // dependency rule
				),
				array(
					'id'      => 'section5_col4_twitter',
					'type'    => 'text',
					'title'   => 'Twitter profile URL',
					'desc' => 'If column is set to use HTML this won\'t show',
					'dependency' => array( 'section5_col4_use_html', '==', 'false' ) // dependency rule
				),
				array(
					'id'      => 'section5_col4_linkedin',
					'type'    => 'text',
					'title'   => 'LinkedIn profile URL',
					'desc' => 'If column is set to use HTML this won\'t show',
					'dependency' => array( 'section5_col4_use_html', '==', 'false' ) // dependency rule
				),
				array(
					'id'      => 'section5_col4_youtube',
					'type'    => 'text',
					'title'   => 'Youtube Channel URL',
					'desc' => 'If column is set to use HTML this won\'t show',
					'dependency' => array( 'section5_col4_use_html', '==', 'false' ) // dependency rule
				),
			)
		),
	), // end: fields
);

$options[]      = array(
	'name'        => 'gmap',
	'title'       => 'Map Settings',
	'icon'        => 'fa fa-map',
	'fields'      => array(
		array(
			'id'    => 'map_api_key',
			'type'  => 'text',
			'title' => 'Google Map API Key',
			'desc' => 'Get an API key from Google Maps API Documentation',
			'default' => 'AIzaSyCnjCTk-fTAVxyPADepxbBvTEdFt1qZ0qA'
		),
		array(
			'id'    => 'map_latitude',
			'type'  => 'text',
			'title' => 'Marker Latitude',
			'desc' => 'Example: 40.698227',
		),
		array(
			'id'    => 'map_longitude',
			'type'  => 'text',
			'title' => 'Marker Longitude',
			'desc' => 'Example: -73.440523',
		),
		
	), // end: fields
);

$options[]      = array(
	'name'        => 'footer',
	'title'       => 'Footer',
	'icon'        => 'fa fa-star',
	'fields'      => array(
		array(
			'id'    => 'hide_footer_menu',
			'type'  => 'switcher',
			'title' => 'Hide Footer menu?',
			'label' => 'You want to hide the footer menu? Then turn this ON. ',
		),
		array(
			'id'    => 'footer_texts',
			'type'     => 'wysiwyg',
			'title' => 'Replace the footer texts',
			'settings' => array(
				'textarea_rows' => 10,
				'tinymce'       => true,
				'media_buttons' => false,
			),
		),
		
	), // end: fields
);

$options[]        = array(
	'name'        => 'subscribers',
	'title'       => 'Subscribers',
	'icon'        => 'fa fa-list',
	'fields'      => array(
		array(
			'type'    => 'subheading',
			'content' => 'This is the list of subscribesrs',
		),
		array(
			'type'    => 'content',
			'content' => $subscribers_content,
		)
	)
);

CSFramework::instance( $settings, $options );