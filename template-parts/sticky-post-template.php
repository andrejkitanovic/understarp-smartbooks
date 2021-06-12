<?php

$sticky = get_option( 'sticky_posts' );
if ( ! empty( $sticky[0] ) ) {
	$q = new WP_Query( array(
		'posts_per_page'      => 1,
		'post__in'            => $sticky,
		'ignore_sticky_posts' => 1,
	) );
	while ( $q->have_posts() ) :
		$q->the_post();
		$post_tax_folder = get_the_terms( $post->ID, 'wf_post_folders' );
		?>
        <div class="blog__main row">
            <div class="blog__main-item">
                <div class="blog__main-category">
					<?php if ( isset( $post_tax_folder[0]->name ) ) : ?>
                        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) . '?folder_id=' . $post_tax_folder[0]->term_taxonomy_id; ?>"><?php echo $post_tax_folder[0]->name; ?></a>
					<?php endif; ?>
                </div>

                <h2 class="blog__main-title">
					<?php the_title() ?>
                </h2>

                <div class="blog__main-text">
					<?php the_excerpt(); ?>
                </div>

                <a href="<?php the_permalink(); ?>" class="blog__main-link">read more ></a>

            </div>
            <div class="blog__main-image">
				<?php the_post_thumbnail( 'post-thumbnail', array(
					'alt' => '',
				) ); ?>
            </div>
        </div>
	<?php endwhile;
	wp_reset_postdata();
} ?>

