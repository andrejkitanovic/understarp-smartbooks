<?php

$title    = get_sub_field( 'title' );
$image    = get_sub_field( 'image' );
$text     = get_sub_field( 'text' );
$title_bg = get_sub_field( 'title_bg' ) ? 'background-color:' . get_sub_field( 'title_bg' ) . '; ' : '';
$image_bg = get_sub_field( 'image_bg' ) ? 'background-color:' . get_sub_field( 'image_bg' ) . '; ' : '';

?>

<section class="case-intro">
    <div class="row">

        <div class="case-intro__title" style="<?php echo $title_bg; ?>">
			<?php if ( $title ) : ?>
                <h3><?php echo $title; ?></h3>
			<?php endif; ?>
        </div>

        <div class="case-intro__image" style="<?php echo $image_bg; ?>">
			<?php if ( $image ) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
			<?php endif; ?>

			<?php if ( $text ) : ?>
                <div class="case-intro__text"><?php echo $text; ?></div>
			<?php endif; ?>
        </div>
    </div>
</section>
