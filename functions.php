<?php
//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


//  ACF Add Options
if ( function_exists( 'acf_add_options_page' ) ) {

	$option_page = acf_add_options_page( array(
		'page_title' => 'Theme General Options',
		'menu_title' => 'Theme Options',
		'menu_slug'  => 'theme-general-options',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );

}

//  HEX to RGBA
function hex2rgb( $hex ) {
	$hex = str_replace( "#", "", $hex );

	if ( strlen( $hex ) == 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}
	$rgb = array( $r, $g, $b );

	return $rgb; // returns an array with the rgb values
}


// Sidebar Register
function true_register_wp_sidebars() {

	register_sidebar(
		array(
			'id' => 'true_side',

			'name' => 'Posts Sidebar',

			'description' => 'Posts Sidebar',

			'before_widget' => '<div class="sidebar__inner">',

			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',

			'after_title' => '</h3>'
		)
	);
}

add_action( 'widgets_init', 'true_register_wp_sidebars' );


add_action( 'pre_get_posts', function ( $query ) {
	if ( $query->is_main_query() && ! $query->is_single ) {
		$query->set( 'post__not_in', get_option( 'sticky_posts' ) ); // Ignore sticky
		$query->set( 'paged', get_query_var( 'paged' ) ); // Pagination

		if ( isset( $_GET['folder_id'] ) && ! empty( $_GET['folder_id'] ) ) {
			$tax_query   = (array) $query->get( 'tax_query' );
			$tax_query[] = array(
				'taxonomy' => 'wf_post_folders',
				'field'    => 'id',
				'terms'    => array( $_GET['folder_id'] ),
				'operator' => 'IN',
			);
			$query->set( 'tax_query', $tax_query );
		}
	}
} );