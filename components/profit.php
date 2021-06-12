<?php

$bg_color = get_sub_field( 'bg_color' ) ? 'background-color:' . get_sub_field( 'bg_color' ) . ';' : '';

?>

<section class="profit" style="<?php echo $bg_color; ?>">
    <div class="container">
        <div class="profit__header row">
			<?php if ( get_sub_field( 'title' ) ) : ?>
                <h2 class="profit__title"><?php the_sub_field( 'title' ) ?> </h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'text' ) ) : ?>
                <p class="profit__text"><?php the_sub_field( 'text' ) ?></p>
			<?php endif; ?>
        </div>

        <div class="profit__list row">
			<?php
			if ( have_rows( 'profit_item' ) ):
				while ( have_rows( 'profit_item' ) ) : the_row();
					$profit_icon  = get_sub_field( 'profit_icon' );
					$profit_name  = get_sub_field( 'profit_name' );
					$profit_descr = get_sub_field( 'profit_descr' );

					?>


                    <div class="profit__item">
                        <div class="profit__item-inner">
							<?php if ( $profit_icon ) : ?>
                                <div class="profit__icon">
                                    <img src="<?php echo $profit_icon['url']; ?>"
                                         alt="<?php echo $profit_icon['alt']; ?>">
                                </div>
							<?php endif; ?>

							<?php if ( $profit_name ) : ?>
                                <h3 class="profit__name">
									<?php echo $profit_name; ?>
                                </h3>
							<?php endif; ?>

							<?php if ( $profit_descr ) : ?>
                                <div class="profit__descr">
									<?php echo $profit_descr; ?>
                                </div>
							<?php endif; ?>
                        </div>
                    </div>

				<? endwhile;
			else :

			endif; ?>
        </div>

    </div>
</section>
