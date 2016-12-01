<?php  /* Set Up */
$blog_id = get_current_blog_id();
$header_css_class = ( $blog_id == 1 ? 'wff-header' : 'wfcc-header' );
$header_logo_css_class = ( $blog_id == 1 ? '' : 'wfcc-logo-hrz' );
$main_menu_items_wrap =
( $blog_id == 1 ? '<ul class="primary-nav-item-list interior-nav wff-color">%3$s</ul>' :
'<ul class="primary-nav-item-list interior-nav wfcc-color">%3$s</ul>' );


?>

<?php  if ( ( is_user_logged_in() ) && ( is_page( 'login') ) ) { header( 'Location: https://connect.worldforumfoundation.org'); } ?>


	<!DOCTYPE html><!-- WFF HEADER -->
	<html  <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width">
		   <link rel="stylesheet" type="text/css" href="css/main.css">
		<title>
			<?php bloginfo('name'); ?>
		</title>
		<?php wp_head(); ?>

	</head>
	<?php /* Move user to login page if not logged in */ ?>
	<div class="wrapper" >
		<div class="top-float-bar">
			<div class="search-bar">
				<form  role="search" action="<?php echo home_url( '/' ); ?>" method="get">
					<input type="text" name="s" id="search" placeholder=' Search the World Forum' value="<?php the_search_query(); ?>" />
				</form>
			</div>
			<?php wp_nav_menu( array(
				'menu' => 'Top Nav',
				'container_id' => 'top-nav-container',
				'menu_class' => 'top-nav-menu',
				'theme_location' => 'top-nav',
				'depth' => 1) ); ?>
			</div>
			<?php if ( ( $blog_id == 1 ) && ( is_front_page() ) )  { } else if ( $blog_id == 8 )  { ?>
				<header class='<?php echo 'site-header ' . $header_css_class; ?>'>
					<div class='<?php echo 'header-logo ' . $header_logo_css_class ?>'><a href='<?php echo get_site_url(2); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></div>
					<?php wp_nav_menu( array(
						'menu' => 'Primary Nav',
						'container_id' => 'primary-nav-container',
						'menu_class' => 'primary-nav-menu',
						'theme_location' => 'primary-nav',
						'items_wrap' => $main_menu_items_wrap,
						'depth' => 2) ); ?>
					</header>
					<?php }  else { ?>
						<header class='<?php echo 'site-header ' . $header_css_class; ?>'>
							<div class='<?php echo 'header-logo ' . $header_logo_css_class ?>'><a href='<?php echo get_site_url(); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></div>
							<?php wp_nav_menu( array(
								'menu' => 'Primary Nav',
								'container_id' => 'primary-nav-container',
								'menu_class' => 'primary-nav-menu',
								'theme_location' => 'primary-nav',
								'items_wrap' => $main_menu_items_wrap,
								'depth' => 2) ); ?>
							</header>
							<?php }  ?>

							<body <?php body_class(); ?>>
