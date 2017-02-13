<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* -----------------------------------------------------------------------------
*  Add Theme Options Page
* ------------------------------------------------------------------------------
*/

function derf_add_theme_page() {
	add_theme_page (
		__( 'Theme Options', 'wpsettings'),
		__( 'Theme Options', 'wpsettings'),
		'edit_theme_options',
		'derf-settings',
		'derf_theme_options_page'
	);
}

add_action('admin_menu', 'derf_add_theme_page');

function derf_theme_options_page() { ?>
	<div class="wrap">
		<h2>Theme Options - <?php echo get_current_theme(); ?></h2>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'derf-settings-group');
			do_settings_sections( 'derf-settings');
			submit_button();
			?>
		</form>
	</div>


	<?php
}

/* -----------------------------------------------------------------------------
*  Register Theme Option Settings
* ------------------------------------------------------------------------------
*/
function derf_theme_init() {


	register_setting (
		'derf-settings-group',
		'derf-blog-settings'
	);

	// Blog Section
	add_settings_section (
		'derf-blog-settings-section',
		'Blog Settings',
		'derf_blog_settings_callback',
		'derf-settings'
	);

	add_settings_field (
		'derf-blog-name-textarea',
		'Blog Name',
		'derf_blog_name_textarea_callback',
		'derf-settings',
		'derf-blog-settings-section'
	);

}

add_action('admin_init', 'derf_theme_init');

// Blog Section

function derf_blog_settings_callback() {
	// Nothing Needed
}

function derf_blog_name_textarea_callback() {
	$options = get_option( 'derf-blog-settings' );
	if( !isset( $options['blog_name_text'] ) ) $options['blog_name_text'] = '';

	$html= "<input type='text' id='derf-blog-name-textarea' name='derf-blog-settings[blog_name_text]' style='width:300px' value='" . $options['blog_name_text']. "'>";

	echo $html;
}
