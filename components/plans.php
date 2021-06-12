<?php

$button_name = get_sub_field( 'button_name' );
$button_link = get_sub_field( 'button_link' ) ? get_sub_field( 'button_link' ) : '#';
$bg_color    = 'background-color:' . get_sub_field( 'bg_color' ) . '; ';
$text_color  = 'color:' . get_sub_field( 'text_color' ) . ';';

if ( get_sub_field( 'item_align' ) == 'center' ) {
	$item_align = 'plans__item--center';
}

?>

<section class="plans" style="<?php echo $bg_color . $text_color; ?>">
    <div class="container">
        <div class="row">
            <div class="plans__header">
				<?php if ( get_sub_field( 'title' ) ) : ?>
                    <h2 class="plans__title">
						<?php the_sub_field( 'title' ) ?>
                    </h2>
				<?php endif; ?>

				<?php if ( get_sub_field( 'text' ) ) : ?>
                    <p class="plans__text">
						<?php the_sub_field( 'text' ) ?>
                    </p>
				<?php endif; ?>
            </div>

        </div>

        <div class="row">

			<?php
			if ( have_rows( 'plans_item' ) ):
				while ( have_rows( 'plans_item' ) ) :
					the_row();
					$plans_title   = get_sub_field( 'plans_title' );
					$plans_icon    = get_sub_field( 'plans_icon' );
					$plans_content = get_sub_field( 'plans_content' );


					?>

                    <div class="plans__item <?php echo $item_align; ?>">
						<?php if ( $plans_title ) : ?>
                            <h3>
								<?php echo $plans_title; ?>
                            </h3>
						<?php endif; ?>

						<?php if ( $plans_content ) : ?>
                            <div class="plans__content">
								<?php echo $plans_content; ?>
                            </div>
						<?php endif; ?>

						<?php if ( $plans_icon ) : ?>
                            <div class="plans__image">
                                <img src="<?php echo $plans_icon['url']; ?>"
                                     alt="<?php echo $plans_icon['alt']; ?>">
                            </div>
						<?php endif; ?>
                    </div>
				<?
				endwhile;
			else :

			endif; ?>
        </div>

		<?php if ( $button_name ) : ?>
            <div class="row">
                <a href='<?php echo $button_link; ?>' class="plans__btn btn"><?php echo $button_name; ?></a>
            </div>
		<?php endif; ?>
    </div>
</section>
