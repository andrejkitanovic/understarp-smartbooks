<?php

$bg_color = get_sub_field( 'bg_color' ) ? 'background-color:' . get_sub_field( 'bg_color' ) . ';' : '';

?>

<section class="technology" style="<?php echo $bg_color; ?>">
    <div class="container">
        <div class="row">
            <div class="technology__descr">
				<?php if ( get_sub_field( 'title' ) ) : ?>
                    <h2 class="technology__title">
						<?php the_sub_field( 'title' ) ?>
                    </h2>
				<?php endif; ?>

				<?php if ( get_sub_field( 'text' ) ) : ?>
                    <p class="technology__text">
						<?php the_sub_field( 'text' ) ?>
                    </p>
				<?php endif; ?>
            </div>

            <div class="technology__list">
                <div class="row">

					<?php
					if ( have_rows( 'technology_item' ) ):
						while ( have_rows( 'technology_item' ) ) : the_row();
							$technology_image = get_sub_field( 'technology_image' );
							?>

							<?php if ( $technology_image ) : ?>
                                <div class="technology__item">
                                    <img src="<?php echo $technology_image['url']; ?>"
                                         alt="<?php echo $technology_image['alt']; ?>">
                                </div>
							<?php endif; ?>

						<? endwhile;
					else :

					endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
