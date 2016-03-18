<?php 

/**
* Add in the Style Sheets
*/
function wff_theme_styles() {
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'gallery_css', get_template_directory_uri() . '/css/gallery.css' );
	wp_enqueue_style( 'custom_plugin_style_css', get_template_directory_uri() . '/css/custom-plugin-style.css' );
	wp_enqueue_style( 'fonts_css', get_template_directory_uri() . '/css/font-style.css' );
	wp_enqueue_style( 'media_queries_css', get_template_directory_uri() . '/css/media-queries.css' );
}

add_action( 'wp_enqueue_scripts', 'wff_theme_styles');
/*
* Switch default core markup for search form, comment form, and comments
* to output valid HTML5.
*/
add_theme_support( 'html5', array(
	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
) );



function run_activate_plugin( $plugin ) {
	$current = get_option( 'active_plugins' );
	$plugin = plugin_basename( trim( $plugin ) );

	if ( !in_array( $plugin, $current ) ) {
		$current[] = $plugin;
		sort( $current );
		do_action( 'activate_plugin', trim( $plugin ) );
		update_option( 'active_plugins', $current );
		do_action( 'activate_' . trim( $plugin ) );
		do_action( 'activated_plugin', trim( $plugin) );
	}

	return null;
}

/* Add style to visual editor */
add_editor_style('css/font-style.css');

/* WP-Member Hooks */
/* WP-Member - Login Form - Username or Email */
add_filter( 'wpmem_inc_login_inputs', 'my_login_inputs' );

function my_login_inputs( $array )
{
	/**
	* This example changes the username label.
	*/
	$array[0]['name'] = 'Username or Email Address';

	return $array;
}


/* WP-Member - Before Registration Form */
add_filter( 'wpmem_register_form_before', 'my_function' );

function my_function() {
	$str = '';
	return $str;
}

/* WP-Member - Registration Form Heading */
add_filter( 'wpmem_register_heading', 'my_heading' );

function my_heading( $heading )
{
	/**
	* The original heading comes in with
	* the optional $heading parameter.
	* You can filter it or change it.
	*/

	$heading = 'New User Registration';

	return $heading;
}

add_filter( 'wpmem_inc_resetpassword_inputs', 'my_pwd_reset_inputs' );
function my_pwd_reset_inputs( $args ){
	unset( $args[0] );
	return $args;
}

add_filter( 'wpmem_pwdreset_args', 'my_pwd_reset_args' );
function my_pwd_reset_args( $args ) {
	if( isset( $_POST['email'] ) ) {
		$user = get_user_by( 'email', trim( $_POST['email'] ) );
	} else {
		$user = false;
	}

	if( $user ) {
		$return_array = array(
			'user' => $user->user_login,
			'email' => $_POST['email']
		);
	} else {
		$return_array = array( 'user' => '', 'email' => '' );
	}

	return $return_array;
}


/**
* Hook our filter function to the_content
*/
add_filter( 'the_content', 'login_link_back' );

/**
* The filter function
*/
function login_link_back( $content )
{
	/**
	* We will search the $content for a link to the
	* login page and replace it with the link plus
	* the redirect_to parameter with whatever the
	* permalink value is.
	*/
	$old = 'http://connect.worldforumfoundation.org/login/';
	$new = 'http://connect.worldforumfoundation.org/login/?redirect_to=' . get_permalink();

	return str_replace( $old, $new, $content );
}


add_filter( 'wpmem_block', 'block_child_pages' );

function block_child_pages( $block )
{
	// this is for pages
	if( is_page() ) {

		global $post;
		// Get an array of Ancestors and Parents
		$parents = get_post_ancestors( $post->ID );

		// get the post->ID OR if array, get the top level page->ID
		$post_id = ($parents) ? $parents[count($parents)-1] : $post->ID;

		// get the block value of the parent page
		$blk = ($post_id) ? get_post_meta($post_id, 'block', true) : '';

		// if the parent is blocked, return a block value
		return ( $blk == 1 || $blk == true ) ? true : $block;
	}

	return $block;
}


add_filter( 'wpmem_login_failed', 'my_login_failed_msg' );

function my_login_failed_msg( $str )
{
	// The generated html for the login failed message
	// is passed to this filter as $str and includes the
	// formatting tags. You can change it or append to it.

	$str = '<h4>Login Failed!</h4>';
	$str .= '<p><strong>Sorry, the username, email address or password you have entered was not recognized.</strong></p>';
	$str .= '<ul><li>If you believe your login information was correct, please <strong><a href="/login/">click here</a></strong> to try again.</li>';
	$str .= '<li>If you need to reset your password, <strong><a href="/reset-password">click here</a></strong> to reset it.</li>';
	$str .= '<li>If you do not have an account, but would like one, <strong><a href="/sign-up">click here</a></strong> to create a FREE account</li></ul>';
	$str .= '<p><i>If you believe you already have an account and are still expierencing issues logging in, please contact us at <a href="mailto:info@worldforumfoundation.org">info@worldforumfoundation.org</a>.</p>';


	return $str;
}


add_filter( 'wpmem_notify_addr', 'my_admin_email' );

function my_admin_email( $email ) {

	// single email example
	//$email = 'notify@mydomain.com';

	// multiple emails example
	// $email = 'notify1@mydomain.com, notify2@mydomain.com';

	// take the default and append a second address to it example:
	$email = $email . ', info@worldforumfoundation.org';

	// return the result
	return $email;
}


/* Register our sidebars and widgetized areas. */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Homepage Banner',
		'id'            => 'homepage_banner',
		'before_widget' => '<div class="homepage-banner-img %1$s">',
		'after_widget'  => '</div>',
	) );


	register_sidebar( array(
		'name'          => 'Sponsor of the Month',
		'id'            => 'sotm_widget',
		'before_widget' => '<div class="sotm">',
		'after_widget'  => '</div>',
	) );
	register_sidebar( array(
		'name'          => 'IoR sidebar',
		'id'            => 'ior_sidebar',
		'before_widget' => '<div class="ior">',
		'after_widget'  => '</div>',
	) );
	register_sidebar( array(
		'name'          => 'Bonnies Global Cafe',
		'id'            => 'cafe_widget',
		'before_widget' => '<div class="cafe-sidebar">',
		'after_widget'  => '</div>',
	) );
	register_sidebar( array(
		'name'          => 'Bonnies Global Cafe Logo',
		'id'            => 'cafe_widget_logo',
		'before_widget' => '<div class="cafe-sidebar_logo">',
		'after_widget'  => '</div>',
	) );
	register_sidebar( array(
		'name'          => 'EAK Sponsors',
		'id'            => 'eak_widget',
		'before_widget' => '<div class="eak-sponsors">',
		'after_widget'  => '</div>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );
add_action( 'init', 'register_widgets' ); add_action( 'wptouch_body_bottom', 'output_my_sidebar_at_bottom' ); function register_widgets() { register_sidebar( array( 'name' => 'WPtouch Bottom', 'id' => 'wptouch-bottom-1', 'description' => 'WPtouch sidebar for the bottom of the content' ) ); } function output_my_sidebar_at_bottom() { dynamic_sidebar( 'WPtouch Bottom' ); }




//make setting page load via home.php and avoid the code bloat
add_filter('bp_settings_screen_general_settings','bpdev_load_user_home_template');
add_filter('bp_settings_screen_notification_settings','bpdev_load_user_home_template');
add_filter('bp_settings_screen_capabilities','bpdev_load_user_home_template');
add_filter('bp_settings_screen_delete_account','bpdev_load_user_home_template');

//just return home.php from members/single
function bpdev_load_user_home_template($template){

	return 'members/single/home';
}



// Theme setup
function wp_theme_setup() {

	// Custom Background
	add_theme_support( 'custom-background' );

	/* Site Navigation - Menu */
	register_nav_menus(array( 'primary-nav' => __( 'Primary Menu'),
	'social-nav' => __('Social Media Menu'),
	'footer-nav' => __('Footer Menu'),
	'sidebar-nav' => __('Sidebar Menu')
));
// Add featured image support
add_theme_support('post-thumbnails');

}

add_action('after_setup_theme', 'wp_theme_setup');
add_image_size( 'sponsor-thumbnail', 75 );

// WP-Memember Login Redirect

add_filter( 'wpmem_login_redirect', 'my_login_redirect', 10, 2 );

function my_login_redirect( $redirect_to, $user_id ) {
	// return the url that the login should redirect to
	return home_url();
}



// Default admin bar to hidden
add_action("user_register", "set_user_admin_bar_false_by_default", 10, 1);
function set_user_admin_bar_false_by_default($user_id) {
	update_user_meta( $user_id, 'show_admin_bar_front', 'false' );
	update_user_meta( $user_id, 'show_admin_bar_admin', 'false' );
}



/** Add a new default avatar **/
add_filter( 'avatar_defaults', 'add_gravatar' );

function add_gravatar ($avatar_defaults) {
	$myavatar = get_bloginfo('template_directory') . '/images/wff-avatar.jpg';
	$avatar_defaults[$myavatar] = "WFF_Avatar";
	return $avatar_defaults;
}
// BuddyPress Functions
add_theme_support( 'buddypress' );


// Only return one entry for revision log otherwise it gets cluttered
function bbp_trim_revision_log( $r='' ) {
	$arr = array( end( $r ));
	reset( $r );

	return( $arr );
}

add_filter( 'bbp_get_reply_revisions', 'bbp_trim_revision_log', 20, 1 );
add_filter( 'bbp_get_topic_revisions', 'bbp_trim_revision_log', 20, 1 );


function remove_counts() {
	$args['show_topic_count'] = false;
	$args['show_reply_count'] = false;
	$args['count_sep'] = '';
	return $args;
}
add_filter('bbp_before_list_forums_parse_args', 'remove_counts' );



/* Menu */

if(!function_exists('get_post_top_ancestor_id')){
	/**
	* Gets the id of the topmost ancestor of the current page. Returns the current
	* page's id if there is no parent.
	*
	* @uses object $post
	* @return int
	*/
	function get_post_top_ancestor_id(){
		global $post;

		if($post->post_parent){
			$ancestors = array_reverse(get_post_ancestors($post->ID));
			return $ancestors[0];
		}

		return $post->ID;
	}
}



?>
