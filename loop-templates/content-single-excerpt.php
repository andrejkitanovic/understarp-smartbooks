<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$post_tax_folder = get_the_terms( $post->ID, 'wf_post_folders' );
?>

<article class="blog__item">
    <a class="blog__item-link" href="<?php echo get_permalink() ?>">
        <div class="blog__item-image">
			<?php the_post_thumbnail( 'post-thumbnail' ); ?>
        </div>

        <div class="blog__item-info">
            <div class="post__category">
				<?php if ( isset( $post_tax_folder[0]->name ) ) {
					echo $post_tax_folder[0]->name;
				} ?>
            </div>

            <h3 class="post__title"><?php the_title() ?></h3>

            <div class="post__content">
				<?php the_excerpt(); ?>
            </div>
        </div>
    </a>
</article>


