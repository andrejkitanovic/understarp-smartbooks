<?php
/**
 * The template for CPT What We Serve
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper wrapper--ticker" id="single-wrapper">

	<?php get_template_part( 'template-parts/page-builder' ); ?>

</div><!-- #single-wrapper -->

<?php get_footer(); ?>
