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

	<div class="top-float-bar">
		<div class="wrapper" >
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
		</div>
		<div class="wrapper" >
			<header class='<?php echo 'site-header ' . $header_css_class; ?>'>
				<div class='<?php echo 'header-logo ' . $header_logo_css_class ?>'><a href='<?php echo get_site_url(); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></div>
				<?php wp_nav_menu( array(
					'menu' => 'Primary Nav',
					'container_id' => 'primary-nav-container',
					'menu_class' => 'primary-nav-menu',
					'theme_location' => 'primary-nav',
					'items_wrap' => '<ul class="primary-nav-item-list interior-nav">%3$s</ul>',
					'depth' => 2) ); ?>
				</header>

				<body <?php body_class(); ?>>
