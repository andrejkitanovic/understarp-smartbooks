<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$footer_phone = get_field( 'footer_phone', 'options' );
$subline_text = get_field( 'subline_text', 'options' );
?>

<footer class="footer">

	<?php if ( $subline_text ) : ?>
        <div class="footer__subline">
            <span><?php echo $subline_text; ?></span>
        </div>
	<?php endif; ?>

	<?php if ( $footer_phone ) : ?>
        <div class="footer__phone">
            <a href="tel:<?php echo $footer_phone; ?>"
               onclick="gtag('event', 'Click', {'event_category' : 'Phone Call',});"><?php echo $footer_phone; ?></a>
        </div>
	<?php endif; ?>

</footer>


</div><!-- #page we need this extra closing tag here -->
<?php the_field( 'google_analytics', 'options', false ); ?>
<?php wp_footer(); ?>

</body>

</html>

