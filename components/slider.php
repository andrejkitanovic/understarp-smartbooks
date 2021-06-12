<?php

$content = get_sub_field( 'shortcode' );
?>

<?php if ( $content ) : ?>
    <section class="slider">
        <div class="slider__content">
			<?php echo $content; ?>
        </div>
    </section>
<?php endif; ?>