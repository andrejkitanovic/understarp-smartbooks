<?php

$bg_image    = get_sub_field( 'bg_image' ) ? 'style="background-image: url(' . get_sub_field( 'bg_image' ) . ');"' : '';
$button_link = get_sub_field( 'button_link' ) ? get_sub_field( 'button_link' ) : '#';
$button_type = get_sub_field( 'button_type' ) ? 'homepage-banner__btn--unique' : '';

?>
<section class="homepage-banner" <?php echo $bg_image; ?>>
    <div class="container">
        <div class="row">
            <div class="homepage-banner__descr">
				<?php if ( get_sub_field( 'title' ) ) : ?>
                    <h1 class="homepage-banner__title">
						<?php the_sub_field( 'title' ); ?>
                    </h1>
				<?php endif; ?>

				<?php if ( get_sub_field( 'subtitle' ) ) : ?>
                    <p class="homepage-banner__subtitle">
						<?php the_sub_field( 'subtitle' ); ?>
                    </p>
				<?php endif; ?>

				<?php if ( get_sub_field( 'button_text' ) || get_sub_field( 'button_bold_text' ) ) : ?>
                    <a class="homepage-banner__btn <?php echo $button_type; ?>" href="<?php echo $button_link; ?>">
                        <b><?php the_sub_field( 'button_bold_text' ); ?></b>
                        <span><?php the_sub_field( 'button_text' ); ?></span>
                    </a>
				<?php endif; ?>
            </div>
            <div class="homepage-banner__specialist">
				<?php if ( get_sub_field( 'specialist_name' ) || get_sub_field( 'specialist_position' ) ) : ?>
                    <div class="homepage-banner__info">
                        <b><?php the_sub_field( 'specialist_name' ); ?></b>
                        <span><?php the_sub_field( 'specialist_position' ); ?></span>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
</section>
