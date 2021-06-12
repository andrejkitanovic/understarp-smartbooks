<?php

?>

<section class="features">
    <div class="container">
		<?php if ( get_sub_field( 'features_main_title' ) ) : ?>
            <h2 class="features__main-title"> <?php the_sub_field( 'features_main_title' ) ?> </h2>
		<?php endif; ?>

        <div class="row">
			<?php
			if ( have_rows( 'features_item' ) ):
				while ( have_rows( 'features_item' ) ) : the_row();
					$f_title            = get_sub_field( 'feature_title' );
					$f_icon             = get_sub_field( 'feature_icon' );
					$f_text             = get_sub_field( 'feature_text' );
					$f_link             = get_sub_field( 'feature_link' ) ? get_sub_field( 'feature_link' ) : '#';
					$f_button_type      = get_sub_field( 'feature_button_type' ) ? 'features__btn--unique' : '';
					$f_button_text      = get_sub_field( 'feature_button_text' );
					$f_button_bold_text = get_sub_field( 'feature_button_bold_text' );
					$f_button_color     = get_sub_field( 'feature_button_type' ) ? 'background-color:' . get_sub_field( 'feature_button_color' ) . ';' : '';
					?>

                    <div class="features__item">
                        <div class="features__img">
							<?php if ( $f_icon ) : ?>
                                <img src="<?php echo $f_icon['url']; ?>"
                                     alt="<?php echo $f_icon['alt']; ?>">
							<?php endif; ?>
                        </div>

						<?php if ( $f_title ) : ?>
                            <h3 class="features__title"><?php echo $f_title; ?></h3>
						<?php endif; ?>

						<?php if ( $f_text ) : ?>
                            <p class="features__text"><?php echo $f_text; ?></p>
						<?php endif; ?>
                        <a class="features__btn  btn <?php echo $f_button_type; ?>"
                           href="<?php echo $f_link; ?>" style="<?php echo $f_button_color; ?>">
                            <b><?php echo $f_button_bold_text; ?></b>
                            <span><?php echo $f_button_text; ?></span>
                        </a>
                    </div>
				<? endwhile;
			else :

			endif; ?>
        </div>
    </div>
</section>
