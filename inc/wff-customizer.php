<?php

function wff_customizer( $wp_customize ) {

  /*
  *  Add Primary Color
  */
  $wp_customize->add_setting( 'primary_color', array(
    'default' => '#054f7d'
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
  'primary_color', array(
    'label'       => 'Primary Color',
    'section'   => 'colors',
    'settings'  => 'primary_color',
  ) ) );


  /* Add Section Title */
  $wp_customize->add_section( 'header_banner' , array(
    'title'      => __( 'Header Banner', 'wff' ),
    'priority'   => 100,
    ) );
    //  =============================
    //  = Image Upload              =
    //  =============================

    $wp_customize->add_setting('wff_theme_options[header_banner_photo]', array(
      'default'           => ' ',
      'capability'        => 'edit_theme_options',
      'type'           => 'option',
    )
  );



  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'header_banner_photo', array(
    'label'    => __('Header Banner Photo Upload', 'wff'),
    'section'  => 'header_banner',
    'settings' => 'wff_theme_options[header_banner_photo]',
    )
    )
  );

  /* Add Section Title */
  $wp_customize->add_section( 'footer_banner' , array(
    'title'      => __( 'Footer Banner', 'wff' ),
    'priority'   => 100,
    ) );
    //  =============================
    //  = Image Upload              =
    //  =============================

    $wp_customize->add_setting('wff_theme_options[footer_banner_photo]', array(
      'default'           => ' ',
      'capability'        => 'edit_theme_options',
      'type'           => 'option',
    )
  );



  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'footer_banner_photo', array(
    'label'    => __('Footer Banner Photo Upload', 'wff'),
    'section'  => 'footer_banner',
    'settings' => 'wff_theme_options[footer_banner_photo]',
    )
    )
  );



}
add_action( 'customize_register', 'wff_customizer' );

function wff_customizer_color_styles() {
  $primary_color = get_theme_mod( 'primary_color' );
  $header_banner = get_option( 'wff_theme_options' );
  $footer_banner = get_option( 'wff_theme_options' );

  if ( $primary_color != '#054f7d' ) :
    ?>
    <style type="text/css">
    a,
    #copyright,
    .primary-color {
      color: <?php echo $primary_color; ?>;
    }

    .sub-menu  {
      background: <?php echo $primary_color; ?>;
    }

    /*This is temporary*/
    header{
      background: url('<?php echo $header_banner['header_banner_photo']; ?>') no-repeat;
      height: 85px;
      margin-left: -5px;
      max-width: 1010px;
      position: fixed;
      width: 100%;
    }

#primary-nav-container {


}


    footer {
      background: url('<?php echo $footer_banner['footer_banner_photo']; ?>');
    }


    </style>
    <?php
  endif;

}
add_action( 'wp_head', 'wff_customizer_color_styles' );
