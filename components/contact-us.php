<?php

$bg_image = get_sub_field( 'bg_image' ) ? 'style="background-image: url(' . get_sub_field( 'bg_image' ) . ');"' : '';

?>

<section class="contact-us" <?php echo $bg_image; ?>>
    <div class="container">
        <div class="row">
            <div class="contact-us__inner">
				<?php if ( get_sub_field( 'title' ) ) : ?>
                    <h2 class="contact-us__title">
						<?php the_sub_field( 'title' ); ?>
                    </h2>
				<?php endif; ?>

				<?php if ( get_sub_field( 'text' ) ) : ?>
                    <p class="contact-us__text">
						<?php the_sub_field( 'text' ); ?>
                    </p>
				<?php endif; ?>

				<?php if ( get_sub_field( 'form' ) ) : ?>
                    <div class="contact-us__form">
						<?php the_sub_field( 'form' ); ?>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
</section>
