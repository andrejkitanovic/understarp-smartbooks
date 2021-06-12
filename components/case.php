<?php

$bg_color    = get_sub_field( 'bg_color' ) ? 'background-color:' . get_sub_field( 'bg_color' ) . ';' : '';
$image       = get_sub_field( 'image' );
$button_text = get_sub_field( 'button_text' );
$button_link = get_sub_field( 'button_link' );

?>

<section class="case" style="<?php echo $bg_color; ?>">
    <div class="container">
        <div class="row">
			<?php if ( $image ) : ?>
                <div class="case__image">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div>
			<?php endif; ?>

            <div class="case__descr">
				<?php if ( get_sub_field( 'descr' ) ) : ?>
                    <h2 class="case__title"><?php the_sub_field( 'descr' ); ?></h2>
				<?php endif; ?>

				<?php if ( $button_text && $button_link ) : ?>
                    <a href="<?php echo $button_link; ?>" class="case__btn btn"><?php echo $button_text; ?></a>
				<?php endif; ?>

            </div>


        </div>
    </div>
</section>
