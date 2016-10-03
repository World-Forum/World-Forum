<?php
/**
* Contains methods for customizing the theme customization screen.
*
* @link http://codex.wordpress.org/Theme_Customization_API
* @since world-forum-foundation 3.1.0
*/


function wff_customizer( $wp_customize ) {
  /**
  * This creates  the different options to be added into the customizer.
  *
  */

  /**
  *  Color Section
  */
  //  Add option to set a Primary Color
  $wp_customize->add_setting( 'primary_color', array(
    'default' => '#054f7d'
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
  'primary_color', array(
    'label'       => 'Primary Color',
    'section'   => 'colors',
    'settings'  => 'primary_color',
  ) ) );

  /**
  *  Header/Footer Section
  */
  // Add option to upload img background to both  the header and footer
  $wp_customize->add_section( 'header_footer_img' , array(
    'title'      => __( 'Header/Footer Img', 'wff' ),
    'priority'   => 100,
    ) );

    $wp_customize->add_setting('wff_theme_options[header_bg_img]', array(
      'default'           => ' ',
      'capability'        => 'edit_theme_options',
      'type'           => 'option',
    )
  );

  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, '', array(
    'label'    => __('Header Banner Photo Upload', 'wff'),
    'section'  => 'header_footer_img',
    'settings' => 'wff_theme_options[header_bg_img]',
    )
    )
  );

  $wp_customize->add_setting('wff_theme_options[footer_bg_img]', array(
    'default'           => ' ',
    'capability'        => 'edit_theme_options',
    'type'           => 'option',
  )
);

$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'footer_bg_img', array(
  'label'    => __('Footer Background Img', 'wff'),
  'section'  => 'header_footer_img',
  'settings' => 'wff_theme_options[footer_bg_img]',
  )
  )
);

/**
*  Homepage Panel/Section
*/
// Creates a panel for the homepage, adds options to edit homepage content
$wp_customize->add_panel( 'homepage', array(
  'title' => __( 'Homepage' ),
  'description' => $description, // Include html tags such as <p>.
  'priority' => 160, // Mixed with top-level-section hierarchy.
  ) );

  // Add option to edit the header statement on the homepage
  $wp_customize->add_section( 'homepage_header' , array(
    'title'      => __( 'Homepage Header', 'wff' ),
    'priority'   => 100,
    'panel' => 'homepage',
    ) );

    $wp_customize->add_setting('wff_theme_options[homepage_header_text]', array(
      'default'        => ' ',
      'capability'     => 'edit_theme_options',
      'type'           => 'option',

    ));

    $wp_customize->add_control('wff_homepage_header_text', array(
      'label'      => __('Homepage Header Text', 'wff'),
      'section'  => 'homepage_header',
      'settings'   => 'wff_theme_options[homepage_header_text]',

    ));

    $wp_customize->add_setting('wff_theme_options[homepage_header_font_type]', array(
      'default'        => 'WCManoNegraBta',
      'capability'     => 'edit_theme_options',
      'type'           => 'option',

    ));

    $wp_customize->add_control('wff_homepage_header_font_type', array(
      'label'      => __('Homepage Header Font Type', 'wff'),
      'section'  => 'homepage_header',
      'settings'   => 'wff_theme_options[homepage_header_font_type]',
      'type'     => 'select',
      'choices'  => array(
        'Bree Serif'  => 'BreeSerif',
        'Chalkduster' => 'Chalkduster',
        'OpenSans' => 'OpenSans-Regular',
        'WC Mano Negra' => 'WCManoNegraBta',
      )));

      $wp_customize->add_setting('wff_theme_options[homepage_header_font_size]', array(
        'default'        => '2em',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

      ));

      $wp_customize->add_control('wff_homepage_header_font_size', array(
        'label'      => __('Homepage Header Font Size', 'wff'),
        'section'  => 'homepage_header',
        'settings'   => 'wff_theme_options[homepage_header_font_size]',
      ));
      $wp_customize->add_setting( 'homepage_header_font_color', array(
        'default' => '#054f7d'
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
      'homepage_header_font_color', array(
        'label'       => 'Homepage Header Font Color',
        'section'   => 'homepage_header',
        'settings'  => 'homepage_header_font_color',
      ) ) );




      // Add HTML buckets to the homepage.
      // The left most bucket
      $wp_customize->add_section( 'homepage_buckets' , array(
        'title'      => __( 'Homepage Section Buckets', 'wff' ),
        'priority'   => 100,
        'panel' => 'homepage',
        ) );
        $wp_customize->add_setting('wff_theme_options[homepage_left_bucket]', array(
          'default'        => ' ',
          'capability'     => 'edit_theme_options',
          'type'           => 'option',

        ));

        $wp_customize->add_control('wff_homepage_left_bucket', array(
          'label'      => __('Homepage Left Bucket', 'wff'),
          'section'  => 'homepage_buckets',
          'settings'   => 'wff_theme_options[homepage_left_bucket]',
          'type' => 'textarea',
        ));
        // The middle  bucket
        $wp_customize->add_setting('wff_theme_options[homepage_middle_bucket]', array(
          'default'        => ' ',
          'capability'     => 'edit_theme_options',
          'type'           => 'option',

        ));

        $wp_customize->add_control('wff_homepage_middle_bucket', array(
          'label'      => __('Homepage Middle Bucket', 'wff'),
          'section'  => 'homepage_buckets',
          'settings'   => 'wff_theme_options[homepage_middle_bucket]',
          'type' => 'textarea',
        ));
        // The right most bucket
        $wp_customize->add_setting('wff_theme_options[homepage_right_bucket]', array(
          'default'        => ' ',
          'capability'     => 'edit_theme_options',
          'type'           => 'option',

        ));

        $wp_customize->add_control('wff_homepage_right_bucket', array(
          'label'      => __('Homepage Right Bucket', 'wff'),
          'section'  => 'homepage_buckets',
          'settings'   => 'wff_theme_options[homepage_right_bucket]',
          'type' => 'textarea',
        ));




      }
      add_action( 'customize_register', 'wff_customizer' );

      function wff_customizer_color_styles() {
        $primary_color = get_theme_mod( 'primary_color' );
        $homepage_header_font_color = get_theme_mod( 'homepage_header_font_color' );
        $wff_options = get_option( 'wff_theme_options' );

        if ( $primary_color != '#054f7d' ) :
          ?>
          <style type="text/css">
          a,
          #copyright,
          .primary-color {
            color: <?php echo $primary_color; ?>;
          }

          .sub-menu,
          .search-form input[type='submit'],
          .primary-color-bg{
            background: <?php echo $primary_color; ?>;
          }

          /*This is temporary*/
          #default-header {
            background: url('<?php echo $wff_options['header_bg_img']; ?>') no-repeat;
            height: 85px;
            margin-left: -5px;
            max-width: 1010px;
            width: 100%;
          }

          #homepage-header-text {
            color: <?php echo  $homepage_header_font_color; ?>;
            font-family: <?php echo $wff_options['homepage_header_font_type']; ?>;
            font-size:  <?php echo $wff_options['homepage_header_font_size']; ?>;
          }

          footer {
            background: url('<?php echo $wff_options['footer_bg_img']; ?>');
          }


          </style>
          <?php
        endif;

      }
      add_action( 'wp_head', 'wff_customizer_color_styles' );
