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
$container = get_theme_mod( 'understrap_container_type' );

$footer_logo    = get_field( 'footer_logo', 'options' );
$footer_text    = get_field( 'footer_text', 'options' );
$footer_form    = get_field( 'footer_form', 'options' );
$footer_phone   = get_field( 'footer_phone', 'options' );
$footer_email   = get_field( 'footer_email', 'options' );
$footer_address = get_field( 'footer_address', 'options' );
$footer_terms   = get_field( 'footer_terms', 'options' );
$footer_privacy = get_field( 'footer_privacy', 'options' );
$subline_text   = get_field( 'subline_text', 'options' );
$footer_social   = get_field( 'footer_social', 'options' );



?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer class="footer">

    <div class="footer__inner">
        <div class="<?php echo esc_attr( $container ); ?>">

            <div class="row">
				<?php if ( $footer_logo ) : ?>
                    <a href="<?php echo home_url(); ?>" class="footer__logo" rel="home">
                        <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>">
                    </a>
				<?php endif; ?>
            </div>

            <div class="row">
				<?php if ( $footer_text ) : ?>
                    <p class="footer__text">
						<?php echo $footer_text; ?>
                    </p>
				<?php endif; ?>

                <nav class="footer__nav">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container'      => false,
							'menu_class'     => 'footer__nav-list',
						)
					); ?>
                </nav>

				<?php if ( $footer_form ) : ?>
                    <div class="subscribe footer__subscribe">
                        <div class="subscribe__inner">
							<?php echo $footer_form; ?>
                            <span>We’ll never share your email address and you can opt out at any time, we promise.</span>
                        </div>
                    </div>
				<?php endif; ?>

				<?php if ( $footer_phone || $footer_email || $footer_address ) : ?>
                    <div class="footer__contact">
                        <h5>Contact Us:</h5>
                        <ul>
							
							<?php if ( $footer_address ) : ?>
                                <li class="footer__contact-address">    <?php echo $footer_address; ?></li>
							<?php endif; ?>
							
							<?php if ( $footer_phone ) : ?>
                                <li class="footer__contact-phone">
                                    <a href="tel:<?php echo $footer_phone; ?>"
                                       onclick="gtag('event', 'Click', {'event_category' : 'Phone Call',});"><?php echo $footer_phone; ?></a>
                                </li>
							<?php endif; ?>

							<?php if ( $footer_email ) : ?>
                                <li class="footer__contact-email">
                                    <a href="<?php echo $footer_email; ?>" onclick="gtag('event', 'Click',
                                    {'event_category' : 'Email',});">Email Us</a>
                                </li>
							<?php endif; ?>
							<?php if ( $footer_social ) : ?>
							<li class="footer__social">Visit us on Social:</li>
							<li class="footer__social">    <?php echo $footer_social; ?></li>
							<?php endif; ?>
							
                        </ul>
                    </div>
				<?php endif; ?>

            </div>
			
            <div class="row">
                <div class="footer__copyright">
                    Copyright © 2021, SmartBooks Corp.
                </div>

                <div class="footer__privacy">
					<?php if ( $footer_terms ) : ?>
                        <a href="<?php echo $footer_terms; ?>">Terms</a> |
					<?php endif; ?>

					<?php if ( $footer_privacy ) : ?>
                        <a href="<?php echo $footer_privacy; ?>">Privacy</a>
					<?php endif; ?>
                </div>
            </div>

        </div>
    </div>

	<?php if ( $subline_text ) : ?>
        <div class="footer__subline">
            <span><?php echo $subline_text; ?></span>
        </div>
	<?php endif; ?>

</footer>


</div><!-- #page we need this extra closing tag here -->
<?php the_field( 'google_analytics', 'options', false); ?>
<?php wp_footer(); ?>

<script type="text/javascript">var subscribersSiteId='6167f3da-afdd-4ceb-bd65-51c30e3d3243';</script><script type="text/javascript" src="https://cdn.subscribers.com/assets/subscribers.js"></script>
</body>

</html>