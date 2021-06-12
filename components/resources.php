<?php

$bg_color = get_sub_field( 'bg_color' ) ? 'background-color:' . get_sub_field( 'bg_color' ) . ';' : '';

?>

<section class="resources" style="<?php echo $bg_color; ?>">
    <div class="container">

        <div class="resources__header row">
			<?php if ( get_sub_field( 'title' ) ) : ?>
                <h2 class="resources__title">
					<?php the_sub_field( 'title' ) ?>
                </h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'text' ) ) : ?>
                <p class="resources__text">
					<?php the_sub_field( 'text' ) ?>
                </p>
			<?php endif; ?>
        </div>

        <div class="resources__list row">

			<?php
			if ( have_rows( 'resources_item' ) ):
				while ( have_rows( 'resources_item' ) ) : the_row();
					$resources_descr = get_sub_field( 'resources_descr' );
					$resources_image = get_sub_field( 'resources_image' );
					$resources_link  = get_sub_field( 'resources_link' ) ? get_sub_field( 'resources_link' ) : '#';

					?>
					<?php if ( $resources_image ) : ?>
                        <div class="resources__item">
                            <a href="<?php echo $resources_link; ?>" class="resources__link">
                                <div class="resources__image">
                                    <img src="<?php echo $resources_image['url']; ?>"
                                         alt="<?php echo $resources_image['alt']; ?>">
                                </div>
                                <div class="resources__overlay">
                                </div>

								<?php if ( $resources_descr ) : ?>
                                    <h3 class="resources__descr">
										<?php echo $resources_descr; ?>
                                    </h3>
								<?php endif; ?>
                            </a>
                        </div>
					<?php endif; ?>
				<? endwhile;
			else :

			endif; ?>
        </div>
    </div>
</section>
