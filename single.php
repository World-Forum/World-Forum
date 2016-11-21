<!-- Post Template redirection page -->
<?php
$post = $wp_query->post;
if ( in_category('Image of Rights') ) {
	include(TEMPLATEPATH . '/single-ior.php');
} else {
	include(TEMPLATEPATH . '/single-default.php');
}
?>
