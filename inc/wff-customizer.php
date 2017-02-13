<?php
function wff_customizer( $wp_customize ) {

	// add setting for Primary Color
	$wp_customize->add_setting( 'primary_color', array(
		'default' => '#054f7d'
	) );

	// add control for Primary Color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label' => 'Primary Color',
		'section' => 'colors',
		'settings' => 'primary_color',
	) ) );
}
add_action( 'customize_register', 'wff_customizer' );

function wff_customizer_head_styles() {

	$primary_color = get_theme_mod( 'primary_color' );

	if ( $primary_color != '#054f7d' ) : ?>
	<style type="text/css">

	.site-header,
	.site-footer  {
		background: <?php echo $primary_color; ?> ;
	}

	a,
	.sub-menu li a {
		color: <?php echo $primary_color; ?>;
	}
	</style>
<?php endif;
}
add_action( 'wp_head', 'wff_customizer_head_styles' );
