<?php 
/* Declare Global Variables */

$blog_id 			= get_current_blog_id();
$search_placeholder = get_bloginfo( 'name' );
$domain_id_css 		= "";
$header_css 			= "";
$primary_nav_css	= "";


	if ( ( $blog_id != 1 ) 
		&& ( !is_user_logged_in() ) 
		&& ( !is_page( 'conversations') )
		&& ( !is_page( 'login') ) 
		&& ( !is_page( 'sign-up') ) 
		&& ( !is_page( 'reset-password') ) ) { 
			header( 'Location: http://connect.worldforumfoundation.org/login/' ) ;
	  } 
	  
	if ( $blog_id != 1 ) { 
	  		$domain_id_css 		= "wfcc";
			$header_css 			= "wfcc_header";
			$primary_nav_css	= "<ul class='primary-nav-item-list interior-nav wfcc-color >%3$s</ul>";
	 	 } else {
		  	$top_bar_css 		= "wff";
			$header_css 			= "wff_header";
			$primary_nav_css	= "<ul class='primary-nav-item-list interior-nav wff-color >%3$s</ul>";
			if ( is_front_page() ) {
				$header_css 			= "wff_home_header";
			}
	  	 } 	

		 ?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>
<?php wp_title(); ?>
</title>
<?php wp_head(); ?>
</head>
<div class="wrapper">
<header class="<?php echo 'site-header '?>">

<div  id="top-float-container" class="<?php echo $header_css; ?>">
  <div class="search-bar">
    <?php  if ( is_user_logged_in() ) { ?>
    <div class="logout"><a class="logout" <?php $current_user = wp_get_current_user(); echo 'href="http://connect.worldforumfoundation.org/members/' . $current_user->user_login . '"' ?>>My Profile</a></div>
    <div class="logout"><a class="logout" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></div>
    <?php } ?>
    <div class="search-bar">
      <form  role="search" action="<?php echo home_url( '/' ); ?>" method="get">
   
        <input type="text" name="s" id="search" placeholder="<?php echo 'Search the ' . $search_placeholder; ?>" value="<?php the_search_query(); ?>" />

      </form>
    </div>
  </div>
</div>

<div class="<?php echo $header_css; ?>" >
  <?php wp_nav_menu( array( 
    'menu' 				=> 'Primary Nav',
	'container' 			=> 'nav',
    'container_id' 		=> 'primary-nav-container',
    'menu_class' 		=> 'primary-nav-menu',
    'theme_location' 	=> 'primary-nav',
    'depth' 				=> 2 ) 
	); ?>
    </div>
</header>
<body <?php body_class(); ?>>
<section id="page-container">


