<?php

$bg_image    = get_sub_field( 'bg_image' ) ? 'style="background-image: url(' . get_sub_field( 'bg_image' ) . ');"' : '';
$button_link = get_sub_field( 'button_link' ) ? get_sub_field( 'button_link' ) : '';
$button_text = get_sub_field( 'button_text' );
if ( get_sub_field( 'align' ) == 'left' ) {
	$align = 'intro--left';
} elseif ( get_sub_field( 'align' ) == 'right' ) {
	$align = 'intro--right';
} else {
	$align = '';
}

$dark_overlay = get_sub_field( 'dark_overlay' ) ? 'intro__wrapper--overlay' : '';
?>

<section class="intro <?php echo $align; ?>" <?php echo $bg_image; ?>>
    <div class="intro__wrapper <?php echo $dark_overlay; ?>">
        <div class="container">
            <div class="row">
                <div class="intro__inner">
					<?php if ( get_sub_field( 'title' ) ) : ?>
                        <h1 class="intro__title"><?php the_sub_field( 'title' ) ?></h1>
					<?php endif; ?>

					<?php if ( get_sub_field( 'subtitle' ) ) : ?>
                        <div class="intro__subtitle"><?php the_sub_field( 'subtitle' ) ?></div>
					<?php endif; ?>

					<?php if ( get_sub_field( 'button' ) && $button_text ) : ?>
                        <a href="<?php echo $button_link; ?>" class="intro__btn btn"><?php echo $button_text;?></a>
					<?php endif; ?>

					<?php if ( get_sub_field( 'slogan' ) ) : ?>
                        <span class="intro__slogan"><?php the_sub_field( 'slogan' ) ?></span>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</section>
