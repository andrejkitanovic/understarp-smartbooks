<?php

$bg_color = get_sub_field( 'bg_color' ) ? 'background-color:' . get_sub_field( 'bg_color' ) . ';' : '';

?>

<section class="quote" style="<?php echo $bg_color; ?>">
    <div class="container">
        <div class="row">
			<?php if ( get_sub_field( 'text' ) ) : ?>
                <p class="quote__text">
					<?php the_sub_field( 'text' ) ?>
                </p>
			<?php endif; ?>
        </div>

        <div class="row">
            <div class="quote__info">
				<?php if ( get_sub_field( 'author' ) ) : ?>
                    <address class="quote__author">
						<?php the_sub_field( 'author' ) ?>
                    </address>
				<?php endif; ?>

				<?php if ( get_sub_field( 'position' ) ) : ?>
                    <span class="quote__position"><?php the_sub_field( 'position' ) ?></span>
				<?php endif; ?>

            </div>
        </div>
    </div>
</section>

