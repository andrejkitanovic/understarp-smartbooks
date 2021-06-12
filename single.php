<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$post_tax_folder = get_the_terms( $post->ID, 'wf_post_folders' );
?>

<div class="wrapper wrapper--ticker" id="single-wrapper">

    <div class="container">
        <div class="row">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'loop-templates/content-single', get_post_format() ); ?>
			<?php endwhile;
			else : ?>

			<?php endif; ?>

			<?php get_sidebar(); ?>
        </div>
    </div>


</div><!-- #single-wrapper -->

<?php get_footer(); ?>
