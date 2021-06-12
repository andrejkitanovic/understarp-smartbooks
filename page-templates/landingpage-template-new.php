<?php
/**
 * Template Name: eBook Template
 * Template Post Type: post, page
 */

$isDwnldPage = $_GET['download'] == 'true';

$isDwnldPage ? get_header() : get_header( 'book' );

$header   = get_field( 'bp_header' );
$banner_image   = get_field( 'banner_image' );
$image    = get_field( 'bp_image' );
$form     = get_field( 'bp_form' );
$subhead  = get_field( 'bp_subhead' );
$copy     = get_field( 'bp_copy' );
$bg_color = get_field( 'bp_bg_color' ) ? 'background-color:' . get_field( 'bp_bg_color' ) . ';' : '';
$link     = get_field( 'bp_link' );
?>

    <div class="wrapper" id="page-wrapper">
    
        <section class="inner-banner " style="background-image: url(<?php echo $banner_image['url']; ?>); background-color:rgba(255, 255, 255, 0.97); ">
            <div class="container">
                <div class="row">
                     <div class="inner-banner__content" style="color:#666666; background-color:rgba(255, 255, 255, 0.97); box-shadow: -111px -1px 63px 187px rgba(255, 255, 255, 0.97); ">
				                    <h2 class="inner-banner__title"><?php echo $header; ?></h2>
				
				
                    </div>
                </div>
            </div>
        </section>
        
        <?php if ( $isDwnldPage ) : ?>
        
        <section class="book-page">
            <div class="book-page__inner" style="<?php echo $bg_color; ?>">
                <div class="container">
                    <div class="book-page__main">
	
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
                            
                  </div>
                </div>
            </div>
        </section> 
        
						<?php else : ?>

        <section class="">
            <div class="container">
                <div class="row">
                    <div class="" style="">
				            <div><img style="max-width: 265px;" class="alignright size-medium" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" >
				                <?php echo $copy; ?>
                            </div>
                    </div>
<!---
                    <div class="inner-case__quote" style="background-color:#eaeaea; ">
				               <h3>GET THE EBOOK FOR FREE</h3>
				                <div class="inner-case__quote-text"><p><!-- [if lte IE 8]>
                                    <?php echo $form; ?>
                                </div></p>
                    </div>	-->
                </div>
            </div>
        </section>
                            
                            
		<?php endif; ?>


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