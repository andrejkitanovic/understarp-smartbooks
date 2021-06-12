<?php
/**
 * Template Name: Landing Page Template
 * Template Post Type: post, page
 */

$isDwnldPage = $_GET['download'] == 'true';

$isDwnldPage ? get_header() : get_header( 'book' );

$header   = get_field( 'bp_header' );
$image    = get_field( 'bp_image' );
$form     = get_field( 'bp_form' );
$subhead  = get_field( 'bp_subhead' );
$copy     = get_field( 'bp_copy' );
$bg_color = get_field( 'bp_bg_color' ) ? 'background-color:' . get_field( 'bp_bg_color' ) . ';' : '';
$link     = get_field( 'bp_link' );
?>

    <div class="wrapper" id="page-wrapper">

        <section class="book-page">
            <div class="book-page__inner" style="<?php echo $bg_color; ?>">
                <div class="container">
                    <div class="book-page__main">

						<?php if ( $isDwnldPage ) : ?>
                            <div class="thank-page__header">
                                <h1>You're All Set!</h1>
                                <p>You can access your free copy of
                                    <a href="<?php echo $link; ?>">
										<?php echo $header; ?>
                                    </a> here at any time.</p>
                            </div>

                            <div class="thank-page__inner">
                                <div class="thank-page__descr">
                                    <div class="thank-page__img">
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                    </div>
                                    <p class="thank-page__text"><?php echo $header; ?></p>

                                    <a href="<?php echo $link; ?>" class="thank-page__dwnld-btn btn">Download Now</a>
                                </div>
                            </div>

                            <div class="thank-page__inner">
                                <div class="thank-page__get-started">
                                    <img src="<?php echo get_template_directory_uri(); ?>/src/img/SmartBooks-owl.png"
                                         alt="">
                                    <p class="thank-page__text">Did you know that SmartBooks offers a professional team
                                        to manage your
                                        bookkeeping,
                                        accounting, payroll, HR and/or tax?</p>
                                    <a class="thank-page__start-btn btn" href="<?php echo home_url() . '/get-started';?>">
                                        Get Started</a>
                                </div>
                            </div>
						<?php else : ?>

                            <div class="book-page__descr">
                                <h1 class="book-page__title">
									<?php echo $header; ?>
                                </h1>

                                <div class="book-page__img">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                </div>
                            </div>

                            <div class="book-page__form">
                                <h2>GET THE EBOOK FOR FREE</h2>
								<?php echo $form; ?>
                            </div>
						<?php endif; ?>
                    </div>
                </div>
            </div>

			<?php if ( ! $isDwnldPage ) : ?>
                <div class="container">
                    <div class="book-page__footer">
                        <h2 class="book-page__subhead">
							<?php echo $subhead; ?>
                        </h2>

                        <div class="book-page__copy">
							<?php echo $copy; ?>
                        </div>
                    </div>
                </div>
			<?php endif; ?>

        </section>
    </div>

<?php if ( $isDwnldPage ) : ?>
	<?php get_footer(); ?>
<?php else : ?>
    </div><!-- #page we need this extra closing tag here -->
	<?php the_field( 'google_analytics', 'options', false ); ?>
	<?php wp_footer(); ?>

    </body>
    </html>
<?php endif; ?>