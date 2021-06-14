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
$container = get_theme_mod('understrap_container_type');

$footer_logo    = get_field('footer_logo', 'options');
// $footer_text    = get_field('footer_text', 'options');
// $footer_form    = get_field('footer_form', 'options');
// $footer_email   = get_field('footer_email', 'options');

// $footer_terms   = get_field('footer_terms', 'options');
// $footer_privacy = get_field('footer_privacy', 'options');
// $subline_text   = get_field('subline_text', 'options');
// $footer_social   = get_field('footer_social', 'options');


$footer_address = get_field('footer_address', 'options');
$footer_phone   = get_field('footer_phone', 'options');

?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<footer class="footer">


    <div class="footer__main">
        <div class="row">


            <div class="col-12 col-sm-6">

            </div>
            <div class="col-12 col-sm-6">
                <div class="footer__contact">

                    <div class="footer__contact-header">
                        Contact us:
                    </div>

                    <div class="footer__contact-address">
                        <p><?php echo $footer_address ?></p>
                        <p><?php echo $footer_phone ?></p>
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