<?php
/******************************************************************************/
/*				Including the Framework			           */
/******************************************************************************/
require_once( get_template_directory(). '/csframework/cs-framework.php' );

/******************************************************************************/
/*				        Styles Enqueue	                                                      */
/******************************************************************************/
function goodies_enqueue(){
	$apiKey = _go('map_api_key') ? _go('map_api_key') : 'AIzaSyCnjCTk-fTAVxyPADepxbBvTEdFt1qZ0qA';
	#Styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css', array(), false, 'all' );
	wp_enqueue_style( 'main', get_template_directory_uri(). '/css/style.css', array(), false, 'all' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), false, 'all' );
	wp_enqueue_style( 'grid', get_template_directory_uri(). '/css/grid.css', array(), false, 'all' );
	
	if( is_page() || is_single() ){
		wp_enqueue_style( 'postslayout', get_template_directory_uri().'/css/post-layout.css', array(), false, 'all' );
		wp_enqueue_style( 'eventpage', get_template_directory_uri().'/css/event-page.css', array(), false, 'all' );			
	}	

	# Fonts
	wp_enqueue_style( 'Cinzel', 'https://fonts.googleapis.com/css?family=Cinzel:400,700', array( ), false, 'all' );
	wp_enqueue_style( 'Muli', 'https://fonts.googleapis.com/css?family=Muli:400,800', array( ), false, 'all' );
	wp_enqueue_style( 'Montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400', array( ), false, 'all' );
	
	#Scripts
	wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), false, true);
	wp_enqueue_script( 'gmap', 'https://maps.googleapis.com/maps/api/js?key='.$apiKey, array(), false, false );
	wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
}
add_action( 'wp_enqueue_scripts', 'goodies_enqueue' );

function admin_side_scripts(){
	wp_enqueue_script( 'admin-js', get_template_directory_uri().'/js/admin-side.js', array( 'jquery' ), false, true );
}

add_action( 'admin_enqueue_scripts', 'admin_side_scripts' ,99);

/******************************************************************************/
/*				      Theme Supports                             	                          */
/******************************************************************************/
#post-thumbnails
add_theme_support('post-thumbnails');
#add  html5 support
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'caption' ));
#title tag
 add_theme_support( 'title-tag' );

/******************************************************************************/
/*				        Favicon 		                             	            */
/******************************************************************************/
function theme_favicon() {
	if( function_exists( 'wp_site_icon' ) && has_site_icon() ) {
		wp_site_icon();
	} else if(cs_get_option( 'site_favicon')){
		echo "\r\n" . sprintf( '<link rel="shortcut icon" href="%s">', cs_get_option( 'site_favicon') ) . "\r\n";
	}
}
add_action( 'wp_head', 'theme_favicon');

/******************************************************************************/
/*			            Subsciption Form AJAX	                                                      */
/******************************************************************************/
add_action('wp_ajax_subscribe_email', 'subscribe_email');
add_action('wp_ajax_nopriv_subscribe_email', 'subscribe_email');
function subscribe_email(){
	$subscriber = $_POST['email'];
	$subscriber_name = $_POST['name'];

	if($subscriber && is_email( $subscriber)) :
		if(get_option( 'subscribers_list', false )) :
			$existing_data = get_option( 'subscribers_list', false );
			if(!in_array($subscriber, $existing_data)){
				array_push($existing_data, $subscriber);
				update_option( 'subscribers_list', $existing_data, false );
				$result['info'] = 'Successfully Subscribed!';
			} else {
				$result['info'] = 'Email already exists!';
			}
		else :	
			$subscribers = array();
			array_push($subscribers, $subscriber);
			update_option( 'subscribers_list', $subscribers, false );
			$result['info'] = 'Successfully Subscribed!';
		endif;
	else :
		$result['info'] = 'Invalid Email address!';
	endif;
die(json_encode($result));
}

/***********************************************************************************************/
/* 					Add Menus 							   */
/***********************************************************************************************/

function register_menus($return = false){
	$menus = array(
		'main_menu'    => __('Main menu', 'agencyfour'),
		'footer_menu'    => __('Footer menu', 'agencyfour')
	);
	if($return)
		return $menus;
	register_nav_menus($menus);
}
add_action('init', 'register_menus');


/***********************************************************************************************/
/* 					Add Sidebar Support  						   */
/***********************************************************************************************/
function reg_sideb(){
	if (function_exists('register_sidebar')) {
		register_sidebar(
			array(
				'name'           => esc_html__('Main Sidebar', 'agencyfour'),
				'id'             => 'main-sidebar',
				'description'    => esc_html__('Main Sidebar Area', 'agencyfour'),
				'before_widget'  => '<div class="widget %2$s">',
				'after_widget'   => '</div>',
				'before_title'   => '<h4 class="widget-title">',
				'after_title'    => '</h4>'
			)
		);
		register_sidebar(
			array(
				'name'           => esc_html__('Event Sidebar', 'agency-one'),
				'id'             => 'event-sidebar',
				'description'    => esc_html__('Event post Sidebar Area', 'agency-one'),
				'before_widget'  => '<div class="widget %2$s">',
				'after_widget'   => '</div>',
				'before_title'   => '<h4 class="widget-title">',
				'after_title'    => '</h4>'
			)
		);
		register_sidebar(
			array(
				'name'           => esc_html__('Contact Page Sidebar', 'agency-one'),
				'id'             => 'contact-page-sidebar',
				'description'    => esc_html__('This sidebar is shown on the right side of the contact page', 'agencyfour'),
				'before_widget'  => '<div class="widget %2$s">',
				'after_widget'   => '</div>',
				'before_title'   => '<h4 class="widget-title">',
				'after_title'    => '</h4>'
			)
		);
		register_sidebar(
			array(
				'name'           => esc_html__('Contact Form Sidebar', 'agency-one'),
				'id'             => 'contact-form-sidebar',
				'description'    => esc_html__('This sidebar is shown bellow the page content on the contact page', 'agencyfour'),
				'before_widget'  => '<div class="widget %2$s">',
				'after_widget'   => '</div>',
				'before_title'   => '<h4 class="widget-title">',
				'after_title'    => '</h4>'
			)
		);
		register_sidebar(
			array(
				'name'           => esc_html__('About Page Sidebar', 'agency-one'),
				'id'             => 'about-page-sidebar',
				'description'    => esc_html__('This sidebar is shown on the about page right side', 'agencyfour'),
				'before_widget'  => '<div class="widget %2$s">',
				'after_widget'   => '</div>',
				'before_title'   => '<h4 class="widget-title">',
				'after_title'    => '</h4>'
			)
		);
		register_sidebar(
			array(
				'name'           => esc_html__('Staff Sidebar', 'agency-one'),
				'id'             => 'staff-sidebar',
				'description'    => esc_html__('Staff post Sidebar Area', 'agency-one'),
				'before_widget'  => '<div class="widget %2$s">',
				'after_widget'   => '</div>',
				'before_title'   => '<h4 class="widget-title">',
				'after_title'    => '</h4>'
			)
		);
		register_sidebar(
			array(
				'name'           => esc_html__('Services Sidebar', 'agency-one'),
				'id'             => 'services-sidebar',
				'description'    => esc_html__('Services post Sidebar Area', 'agency-one'),
				'before_widget'  => '<div class="widget %2$s">',
				'after_widget'   => '</div>',
				'before_title'   => '<h4 class="widget-title">',
				'after_title'    => '</h4>'
			)
		);
	}
}
add_action('widgets_init','reg_sideb');

function _go($option){
	return cs_get_option($option);
}

function _eo($option){
	echo cs_get_option($option);
}

/******************************************************************************/
/*			           Custom Post Type Abouts	                                        */
/******************************************************************************/
add_action( 'init', 'post_types_reg' );
function post_types_reg() {
	#By the way adding the image size
	add_image_size( 'services-home', 1056, 608, array('center', 'center') );
	add_image_size( 'staff-single', 400, 400, array('top', 'center') );
	add_image_size( 'single-service', 400, 300, array('center', 'center') );
	add_image_size( 'press-single', 220, 220, array('center', 'center') );

	$labels = array(
		'name'               => _x( 'Services', 'post type general name', 'agency-four' ),
		'singular_name'      => _x( 'Service', 'post type singular name', 'agency-four' ),
		'menu_name'          => _x( 'Services', 'admin menu', 'agency-four' ),
		'name_admin_bar'     => _x( 'Service', 'add new on admin bar', 'agency-four' ),
		'add_new'            => _x( 'Add New', 'service', 'agency-four' ),
		'add_new_item'       => __( 'Add New Service', 'agency-four' ),
		'new_item'           => __( 'New Service', 'agency-four' ),
		'edit_item'          => __( 'Edit Service', 'agency-four' ),
		'view_item'          => __( 'View Service', 'agency-four' ),
		'all_items'          => __( 'All Services', 'agency-four' ),
		'search_items'       => __( 'Search Services', 'agency-four' ),
		'parent_item_colon'  => __( 'Parent Services:', 'agency-four' ),
		'not_found'          => __( 'No services found.', 'agency-four' ),
		'not_found_in_trash' => __( 'No services found in Trash.', 'agency-four' )
	);
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'agency-four' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'service' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 100,
		'supports'           => array( 'title', 'editor','excerpt', 'thumbnail' )
	);
	register_post_type( 'services', $args );

	$labels = array(
		'name'               => _x( 'Staff Members', 'post type general name', 'agency-four' ),
		'singular_name'      => _x( 'Staff', 'post type singular name', 'agency-four' ),
		'menu_name'          => _x( 'Staff', 'admin menu', 'agency-four' ),
		'name_admin_bar'     => _x( 'Staff', 'add new on admin bar', 'agency-four' ),
		'add_new'            => _x( 'Add New', 'staff member', 'agency-four' ),
		'add_new_item'       => __( 'Add New Staff', 'agency-four' ),
		'new_item'           => __( 'New Staff', 'agency-four' ),
		'edit_item'          => __( 'Edit Staff', 'agency-four' ),
		'view_item'          => __( 'View Staff', 'agency-four' ),
		'all_items'          => __( 'All Staff Members', 'agency-four' ),
		'search_items'       => __( 'Search Staff Members', 'agency-four' ),
		'parent_item_colon'  => __( 'Parent Staff:', 'agency-four' ),
		'not_found'          => __( 'No Staff found.', 'agency-four' ),
		'not_found_in_trash' => __( 'No Staff found in Trash.', 'agency-four' )
	);
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'agency-four' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'staff' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 100,
		'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail' )
	);
	register_post_type( 'staff', $args );

	$labels = array(
		'name'               => _x( 'Press', 'post type general name', 'agency-one' ),
		'singular_name'      => _x( 'Press', 'post type singular name', 'agency-one' ),
		'menu_name'          => _x( 'Press', 'admin menu', 'agency-one' ),
		'name_admin_bar'     => _x( 'Press', 'add new on admin bar', 'agency-one' ),
		'add_new'            => _x( 'Add New', 'press', 'agency-one' ),
		'add_new_item'       => __( 'Add New Media', 'agency-one' ),
		'new_item'           => __( 'New Media', 'agency-one' ),
		'edit_item'          => __( 'Edit Media', 'agency-one' ),
		'view_item'          => __( 'View Media', 'agency-one' ),
		'all_items'          => __( 'All Press', 'agency-one' ),
		'search_items'       => __( 'Search Press', 'agency-one' ),
		'parent_item_colon'  => __( 'Parent Press', 'agency-one' ),
		'not_found'          => __( 'No Press found.', 'agency-one' ),
		'not_found_in_trash' => __( 'No Press found in Trash.', 'agency-one' )
	);
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'agency-one' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'press' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 100,
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail'  )
	);
	register_post_type( 'press', $args );
	
	register_post_type( 'events',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Events' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'events'),
			'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail' )
		)		
	);
}

/***********************************************************************************************/
/* 					Excerpt filter 							   */
/***********************************************************************************************/
function af_excerpt_more( $more ) {
	esc_html__(' ...', 'agency-four');
}
add_filter( 'excerpt_more', 'af_excerpt_more' );

function custom_excerpt_length( $length ) {
	if(is_page_template( 'page-media-page.php' ) || is_archive('press')){
		return 17;
	} else {
		return 40;
	}
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
