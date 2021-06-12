<?php

$reverse           = get_sub_field( 'reverse' ) ? 'order:-1;' : '';
$bg_color          = get_sub_field( 'bg_color' ) ? 'background-color:' . get_sub_field( 'bg_color' ) . '; ' : '';
$title             = get_sub_field( 'title' );
$title_color       = get_sub_field( 'title_color' ) ? 'color:' . get_sub_field( 'title_color' ) . '; ' : '';
$text              = get_sub_field( 'text' );
$quote_color       = get_sub_field( 'q_color' ) ? 'color:' . get_sub_field( 'q_color' ) . '; ' : '';
$quote_title       = get_sub_field( 'q_title' );
$quote_text        = get_sub_field( 'q_text' );
$quote_user        = get_sub_field( 'q_user' );
$quote_position    = get_sub_field( 'q_position' );
$quote_button      = get_sub_field( 'q_button' );
$quote_button_text = get_sub_field( 'q_button_text' );
$quote_button_link = get_sub_field( 'q_button_link' );
$quote_bg_color    = get_sub_field( 'q_bg_color' ) ? 'background-color:' . get_sub_field( 'q_bg_color' ) . '; ' : '';;

?>

<section class="inner-case" style="<?php echo $bg_color; ?>">
    <div class="container">
        <div class="row">
            <div class="inner-case__content" style="<?php echo $title_color; ?>">
				<?php if ( $title ): ?>
                    <h3><?php echo $title; ?></h3>
				<?php endif; ?>

				<?php if ( $text ): ?>
                    <div><?php echo $text; ?></div>
				<?php endif; ?>
            </div>

            <div class="inner-case__quote" style="<?php echo $quote_bg_color . $reverse . $quote_color; ?>">

				<?php if ( $quote_title ): ?>
                    <h3><?php echo $quote_title; ?></h3>
				<?php endif; ?>

				<?php if ( $quote_text ): ?>
                    <div class="inner-case__quote-text"><?php echo $quote_text; ?></div>
				<?php endif; ?>

				<?php if ( $quote_user ) : ?>
                    <span class="inner-case__quote-user"><?php echo $quote_user; ?></span>
				<?php endif; ?>

				<?php if ( $quote_position ) : ?>
                    <span class="inner-case__quote-position"><?php echo $quote_position; ?></span>
				<?php endif; ?>

				<?php if ( $quote_button && $quote_button_text ) : ?>
                    <a href="<?php echo $quote_button_link; ?>"
                       class="inner-case__quote-btn btn"><?php echo $quote_button_text; ?></a>
				<?php endif; ?>

            </div>
        </div>
    </div>
</section>
