<?php

$image = get_sub_field( 'image' );
$bg_color = get_sub_field( 'bg_color' ) ? 'background-color:' . get_sub_field( 'bg_color' ) . ';' : '';

?>

<section class="inner-contact" style="<?php echo $bg_color; ?>">
    <div class="container">
        <div class="row">

            <div class="inner-contact__header">
				<?php if ( get_sub_field( 'title' ) ) : ?>
                    <h2 class="inner-contact__title">
						<?php the_sub_field( 'title' ); ?>
                    </h2>
				<?php endif; ?>

				<?php if ( get_sub_field( 'text' ) ) : ?>
                    <p class="inner-contact__text">
						<?php the_sub_field( 'text' ); ?>
                    </p>
				<?php endif; ?>
            </div>

            <div class="inner-contact__image">
				<?php if ( get_sub_field( 'form_title' ) ) : ?>
                    <span><?php the_sub_field( 'form_title' ); ?></span>
				<?php endif; ?>

				<?php if ( $image ) : ?>
                    <img src="<?php echo $image['url']; ?>"
                         alt="<?php echo $image['alt']; ?>">
				<?php endif; ?>
            </div>

			<?php if ( get_sub_field( 'form' ) ) : ?>
                <div class="inner-contact__form">

					<?php the_sub_field( 'form' ); ?>

					<?php if ( get_sub_field( 'privacy' ) ) : ?>
                        <div class="inner-contact__privacy">
							<?php the_sub_field( 'privacy' ); ?>
                        </div>
					<?php endif; ?>
                </div>
			<?php endif; ?>
        </div>
    </div>
</section>
