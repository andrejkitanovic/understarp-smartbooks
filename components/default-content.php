<?php

$bg_color          = get_sub_field( 'bg_color' ) ? 'background-color:' . get_sub_field( 'bg_color' ) . ';' : '';
$text_color        = 'color:' . get_sub_field( 'text_color' ) . ';';
$title             = get_sub_field( 'title' );
$content           = get_sub_field( 'content' );
$image             = get_sub_field( 'image' );
$button            = get_sub_field( 'button' );
$button_text       = get_sub_field( 'button_text' );
$button_text_color = 'color:' . get_sub_field( 'button_text_color' ) . ';';
$button_color      = 'background-color:' . get_sub_field( 'button_color' ) . ';';
$button_link       = get_sub_field( 'button_link' ) ? get_sub_field( 'button_link' ) : '#';
$image_in_half     = get_sub_field( 'image_in_half' ) ? 'default-content--half' : '';
$mark              = get_sub_field( 'mark' );

if ( get_sub_field( 'text_align' ) == 'left' ) {
	$text_align = 'default-content--left';
} elseif ( get_sub_field( 'text_align' ) == 'right' ) {
	$text_align = 'default-content--right';
} else {
	$text_align = '';
}

$image_align = '';
if ( $image ) {
	if ( get_sub_field( 'image_align' ) == 'left' ) {
		$image_align = 'default-content--image-left';
	} elseif ( get_sub_field( 'image_align' ) == 'right' ) {
		$image_align = 'default-content--image-right';
	} else {
		$image_align = '';
	}
}

?>

<section class="default-content <?php echo $text_align . ' ' . $image_align . ' ' . $image_in_half; ?>"
         style="<?php echo $bg_color . $text_color; ?>">
    <div class="container">
        <div class="row">
            <div class="default-content__inner">
				<?php if ( $title ) : ?>
                    <h2 class="default-content__title">
						<?php echo $title; ?>
                    </h2>
				<?php endif; ?>

				<?php if ( $content ) : ?>
                    <div class="default-content__text">
						<?php echo $content; ?>
                    </div>
				<?php endif; ?>
            </div>

			<?php if ( $image ) : ?>
                <div class="default-content__image">
                    <img src="<?php echo $image['url']; ?>"
                         alt="<?php echo $image['alt']; ?>">
                </div>
			<?php endif; ?>

			<?php if ( $button && $button_text ) : ?>
                <div class="default-content__btn">
                    <a href="<?php echo $button_link; ?>" class="btn"
                       style="<?php echo $button_text_color; ?> <?php echo $button_color; ?>">
						<?php echo $button_text; ?></a>
                </div>
			<?php endif; ?>
			<?php if ( $mark ) : ?>
                <div class="default-content__mark">
					<?php echo $mark; ?>
                </div>
			<?php endif; ?>
        </div>
    </div>
</section>
