<?php

$text_align = get_sub_field( 'align' ) == 'right' ? 'inner-banner--right' : '';
$text_color = 'color:' . get_sub_field( 'text_color' ) . '; ';
$bg_image   = get_sub_field( 'bg_image' ) ? 'background-image: url(' . get_sub_field( 'bg_image' ) . '); ' : '';

// Hex to RGBA
$bg_rgb_color  = hex2rgb( get_sub_field( 'bg_color' ) );
$bg_rgba_color = 'rgba(' . implode( ', ', $bg_rgb_color ) . ', 0.97)';
$bg_color      = 'background-color:' . $bg_rgba_color . '; ';

if ( get_sub_field( 'align' ) == 'right' ) {
	$box_shadow = 'box-shadow: 120px -1px 63px 187px ' . $bg_rgba_color . '; ';
} else {
	$box_shadow = 'box-shadow: -111px -1px 63px 187px ' . $bg_rgba_color . '; ';
}

?>

<section class="inner-banner <?php echo $text_align; ?>" style="<?php echo $bg_image . '' . $bg_color; ?>">
    <div class="container">
        <div class="row">
            <div class="inner-banner__content"
                 style="<?php echo $text_color . '' . $bg_color . '' . $box_shadow; ?>">
				<?php if ( get_sub_field( 'title' ) ) : ?>
                    <h2 class="inner-banner__title">
						<?php the_sub_field( 'title' ); ?>
                    </h2>
				<?php endif; ?>

				<?php if ( get_sub_field( 'text' ) ) : ?>
                    <div class="inner-banner__text">
						<?php the_sub_field( 'text' ); ?>
                    </div>
				<?php endif; ?>

            </div>
        </div>
    </div>
</section>