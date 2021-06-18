<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$post_tax_folder = get_the_terms($post->ID, 'wf_post_folders');
$terms           = get_terms([
	'taxonomy'   => 'wf_post_folders',
	'hide_empty' => false,
]);

$current_category = 'All Content';
foreach ($terms as $value) {
	if (isset($_GET['folder_id']) && !empty($_GET['folder_id'])) {
		if ($_GET['folder_id'] == $value->term_taxonomy_id) {
			$current_category = $value->name;
		}
	};
}
?>

<div class="wrapper wrapper--ticker" id="index-wrapper">

	<div class="container">
		<?php get_template_part('template-parts/sticky-post-template'); ?>
		<div class="row">
			<div class="blog__wrapper">
				<div class="row">
					<div class="blog__category">
						<?php echo $current_category; ?>
					</div>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php get_template_part('loop-templates/content-single-excerpt'); ?>
					<?php endwhile;
					endif; ?>
				</div>
			</div>

			<?php
			the_content();
			?>

			<?php get_sidebar(); ?>

			<?php the_posts_pagination($args = array(
				'show_all'           => false,
				'end_size'           => 1,
				'mid_size'           => 4,
				'prev_next'          => true,
				'prev_text'          => __('<'),
				'next_text'          => __('>'),
				'screen_reader_text' => __('Posts navigation'),
			)); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>