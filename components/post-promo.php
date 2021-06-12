<?php

$promo_image = get_field( 'promo_image' );
?>

<div class="post-promo  row">
	<?php if ( $promo_image ) : ?>
        <div class="post-promo__image">
            <img src="<?php echo $promo_image['url']; ?>"
                 alt="<?php echo $promo_image['alt']; ?>">
        </div>
	<?php endif; ?>

    <div class="post-promo__info">
		<?php if ( get_field( 'promo_title' ) ) : ?>
            <h5>
				<?php echo get_field( 'promo_title' ); ?>
            </h5>
		<?php endif; ?>

		<?php if ( get_field( 'promo_text' ) ) : ?>
            <p>
				<?php echo get_field( 'promo_text' ); ?>
            </p>
		<?php endif; ?>

		<?php if ( get_field( 'promo_link' ) ) : ?>
            <a href="<?php the_field( 'promo_link' ); ?>">Download Now</a>
		<?php endif; ?>


    </div>
</div>
