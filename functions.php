<?php

	// Add in Custom Theme Options
require get_template_directory() . '/inc/wff-customizer.php';

/**
* Add in the Style Sheets
*/
function wff_theme_styles() {
	wp_enqueue_style( 'style_css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/normalize.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/css/main.min.css' );
	wp_enqueue_style( 'fonts_css', get_template_directory_uri() . '/css/fonts.min.css' );
	wp_enqueue_style( 'custom_plugin_style_css', get_template_directory_uri() . '/css/custom.min.css' );
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
add_editor_style('/css/fonts.min.css');

// Custom Background
add_theme_support( 'custom-background' );

// Site LOGO
function themeslug_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'themeslug_logo_section' , array(
		'title' 				=> __( 'Logo', 'themeslug' ),
		'priority' 			=> 30,
		'description' 	=> 'Upload a logo to replace the default site name and description in the header',
		) );
		$wp_customize->add_setting( 'themeslug_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'themeslug_logo', array(
			'label' 		=> __( 'Logo', 'themeslug' ),
			'section' 	=> 'themeslug_logo_section',
			'settings' 	=> 'themeslug_logo',
			)
			) );
		}
		add_action('customize_register', 'themeslug_theme_customizer');


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
				'name'          => 'Top Bar',
				'id'            => 'top_bar',
				'before_widget' => '<div class="top_bar_widget">',
				'after_widget'  => '</div>',
			) );
			register_sidebar( array(
				'name'          => 'Homepage Banner',
				'id'            => 'homepage_banner',
				'before_widget' => '<div class="homepage-banner-img homepage-logo">',
				'after_widget'  => '</div>',
			) );
			register_sidebar( array(
				'name'          => 'Sponsor of the Month',
				'id'            => 'sotm_widget',
				'before_widget' => '<div id="widget-sotm">',
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

		/*
		* SKIP ACTIVATION
		*/
		add_action( 'activate_header', 'check_activation_key_redirect_to_page' );
		/**
		* Check the wp-activate key and redirect the user to home page.
		*/
		function check_activation_key_redirect_to_page() {
			// We check if the key is not empty
			if ( ! empty($_GET['key']) && ! empty($_POST['key']) ) {

				$key = !empty($_GET['key']) ? $_GET['key'] : $_POST['key'];

				// Activates the user and send user/pass in an email
				$result = wpmu_activate_signup($key);

				if ( ! is_wp_error($result) ) {
					extract($result);
					$user = get_userdata( (int) $user_id);

					// Start session if it was not started
					if ( ! session_id() )
					session_start();

					// Save the user object to the session
					$_SESSION['my_active_user_variable'] = $user;

					// Redirect to the network home url
					wp_redirect( network_site_url() );
					exit;
				}
			}
		}

		add_action('my_do_active_user_message_hook', 'check_header_for_active_user');
		/**
		* Check for the set activated user and echo a message on the home page
		*/
		function check_header_for_active_user() {
			if ( ! session_id() ) {
				session_start();
			}
			if ( isset($_SESSION['my_active_user_variable']) && ! empty( $_SESSION['my_active_user_variable'] ) ) {
				$user = $_SESSION['my_active_user_variable'];

				echo '<div>'. sprintf( __( 'Dear %s. Your account is now active!' ), $user->user_login ).'</div>';

				// Unset the session variable since we don't needed anymore
				unset($_SESSION['my_active_user_variable']);
			}
		}


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

			/* Site Navigation - Menu */
			register_nav_menus(array( 'primary-nav' => __( 'Primary Menu'),
			'social-nav' => __('Social Media Menu'),
			'footer-nav' => __('Footer Menu'),
			'top-nav' => __('Top Menu')
		));
		// Add featured image support
		add_theme_support('post-thumbnails');

	}

	add_action('after_setup_theme', 'wp_theme_setup');
	add_image_size( 'sponsor-thumbnail', 75 );





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


	// To give Editors access to the ALL Forms menu
	function my_custom_change_ninja_forms_all_forms_capabilities_filter( $capabilities ) {
		$capabilities = "edit_pages";
		return $capabilities;
	}
	add_filter( 'ninja_forms_admin_parent_menu_capabilities', 'my_custom_change_ninja_forms_all_forms_capabilities_filter' );
	add_filter( 'ninja_forms_admin_all_forms_capabilities', 'my_custom_change_ninja_forms_all_forms_capabilities_filter' );
	// To give Editors access to ADD New Forms
	function my_custom_change_ninja_forms_add_new_capabilities_filter( $capabilities ) {
		$capabilities = "edit_pages";
		return $capabilities;
	}
	add_filter( 'ninja_forms_admin_parent_menu_capabilities', 'my_custom_change_ninja_forms_add_new_capabilities_filter' );
	add_filter( 'ninja_forms_admin_add_new_capabilities', 'my_custom_change_ninja_forms_add_new_capabilities_filter' );
	/* To give Editors access to the Submissions - Simply replace ‘edit_posts’ in the code snippet below with the capability
	that you would like to attach the ability to view/edit submissions to.Please note that all three filters are needed to
	provide proper submission viewing/editing on the backend!
	*/
	function nf_subs_capabilities( $cap ) {
		return 'edit_posts';
	}
	add_filter( 'ninja_forms_admin_submissions_capabilities', 'nf_subs_capabilities' );
	add_filter( 'ninja_forms_admin_parent_menu_capabilities', 'nf_subs_capabilities' );
	add_filter( 'ninja_forms_admin_menu_capabilities', 'nf_subs_capabilities' );



	?>
