<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Single Post Content

$post_tax_folder = get_the_terms( $post->ID, 'wf_post_folders' );
$thumbnail_show  = get_field( 'thumbnail_show' );
$category        = get_the_terms( $post->ID, 'category' );
$category_name   = '';
if ( isset( $category[0]->name ) && $category[0]->name !== 'Uncategorized' ) {
	$category_name = ' in ' . $category[0]->name;
}
?>

<article class="post">
    <div class="container">
        <div class="row">
            <div class="post__category">
				<?php if ( isset( $post_tax_folder[0]->name ) ) : ?>
                    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) . '?folder_id=' . $post_tax_folder[0]->term_taxonomy_id; ?>"><?php echo $post_tax_folder[0]->name; ?></a>
				<?php endif; ?>
            </div>
            <h1 class="post__title"><?php the_title() ?></h1>
			<?php if ( $thumbnail_show ): ?>
                <div class="post__main-img">
					<?php the_post_thumbnail(); ?>
                </div>
			<?php endif; ?>
            <div class="post__info">
				<?php echo get_the_date() . ' by ' . get_the_author() . $category_name; ?>
            </div>
        </div>

        <div class="row">
            <div class="post__content">
				<?php the_content() ?>
            </div>
        </div>

        <?php if ( get_field( 'pa_show' ) ): ?>
            <div class="row">
                <div class="post__author">
                    <div class="post__author-photo">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), 110 ); ?>
                    </div>

                    <div class="post__author-info">
                        <address>
                            Written by <?php echo get_the_author(); ?>
                        </address>
                        <div>
							<?php the_field( 'pa_bio' ); ?>
                        </div>
                    </div>
                </div>

				<?php get_template_part( 'template-parts/share-template' ); ?>
            </div>
		<?php endif; ?>

		<?php if ( have_rows( 'promo_link' ) ):
			get_template_part( 'components/post-promo' ); ?>
		<?php endif; ?>
    </div>


</article>


