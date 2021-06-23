<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
// $container = get_theme_mod('understrap_container_type');

$footer_background = get_field('footer_background', 'options');
$bgType  = $footer_background['type'];
$bgColor = $footer_background['color'];
$bgImage = $footer_background['image'];
$bgStyle = '';

if ($bgType) {
    if ($bgType == 'colored') {
        $bgStyle = 'background-color: ' . $bgColor  . ';';
    }
    if ($bgType == 'image') {
        $bgStyle = 'background-image: url(' . $bgImage . ');';
    }
}

// Left Part
$footer_logo = get_field('footer_logo', 'options');
$footer_copyright = get_field('footer_copyright', 'options');

// Right Part
$footer_address = get_field('footer_address', 'options');
$footer_phone   = get_field('footer_phone', 'options');

//Social links
$social_links = get_field('social_links', 'options');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<footer class="footer" style="<?php echo $bgStyle ?>">
    <div class="container">
        <div class="footer__main">
            <div class="row">
                <div class="col-12 col-sm-8">

                    <a href="<?php echo home_url(); ?>" class="footer__logo">
                        <?php if ($footer_logo) : ?>
                            <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>">
                        <?php endif; ?>
                    </a>

                    <div class="footer__links">
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-3">
                                <?php if (has_nav_menu('footer')) wp_nav_menu(array('theme_location' => 'footer', 'container_class' => 'footer__category')); ?>
                            </div>
                            <div class="col-12 col-md-4 col-lg-3">
                                <?php if (has_nav_menu('footer_links')) wp_nav_menu(array('theme_location' => 'footer_links', 'container_class' => 'footer__category')); ?>
                            </div>
                        </div>
                    </div>

                    <div class="footer__copyright d-none d-sm-block"><?php echo $footer_copyright; ?></div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="footer__contact">

                        <div class="footer__contact-header">
                            Contact us:
                        </div>

                        <div class="footer__contact-address">
                            <p><?php echo $footer_address ?></p>
                            <p><?php echo $footer_phone ?></p>
                        </div>

                        <div class="footer__social-links d-flex">
                            <?php foreach ($social_links as $social) { ?>
                                <a href="<?php echo $social['link']['url']; ?>" class="footer__social-link"><img src="<?php echo $social['icon']['url']; ?>" alt="<?php echo $social['icon']['alt']; ?>" /></a>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


</div><!-- #page we need this extra closing tag here -->
<?php the_field('google_analytics', 'options', false); ?>
<?php wp_footer(); ?>

<script type="text/javascript">
    var subscribersSiteId = '6167f3da-afdd-4ceb-bd65-51c30e3d3243';
</script>
<script type="text/javascript" src="https://cdn.subscribers.com/assets/subscribers.js"></script>
</body>

</html>