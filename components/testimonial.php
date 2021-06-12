<?php

$image = get_sub_field( 'image' );

?>

<section class="testimonial">
    <div class="container">
        <div class="row">

            <div class="testimonial__content">

				<?php if ( get_sub_field( 'text' ) ) : ?>
                    <p class="testimonial__text">
						<?php the_sub_field( 'text' ) ?>
                    </p>
				<?php endif; ?>

                <div class="testimonial__author">
					<?php if ( get_sub_field( 'name' ) ) : ?>
                        <address class="testimonial__name">
							<?php the_sub_field( 'name' ) ?>
                        </address>
					<?php endif; ?>

					<?php if ( get_sub_field( 'position' ) ) : ?>
                        <span class="testimonial__position">
							<?php the_sub_field( 'position' ) ?>
                        </span>
					<?php endif; ?>

					<?php if ( get_sub_field( 'company' ) ) : ?>
                        <span class="testimonial__company">
							<?php the_sub_field( 'company' ) ?>
                        </span>
					<?php endif; ?>

                </div>

            </div>
			<?php if ( $image ) : ?>
                <div class="testimonial__image">
                    <img src="<?php echo $image['url']; ?>"
                         alt="<?php echo $image['alt']; ?>">
                </div>
			<?php endif; ?>

        </div>
    </div>
</section>
