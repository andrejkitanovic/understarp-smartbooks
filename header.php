<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');

$header_logo = get_field('header_logo', 'options');

// $header_background = get_field('header_background', 'options');
// $bgType  = $header_background['type'];
// $bgColor = $header_background['color'];
// $bgImage = $header_background['image'];
// $bgStyle = '';

// if ($bgType) {
//     if ($bgType == 'colored') {
//         $bgStyle = 'background-color: ' . $bgColor  . ';';
//     }
//     if ($bgType == 'image') {
//         $bgStyle = 'background-image: url(' . $bgImage . ');';
//     }
// }

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <?php wp_head(); ?>

    <!-- Google Tag Manager GA4-->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TW2PMQG');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager GA4 (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TW2PMQG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php do_action('wp_body_open'); ?>
    <div class="site" id="page">

        <!-- ******************* The Navbar Area ******************* -->
        <header>

            <div class="header-top">
                <div class="container">
                    <span class="header-top__text">SmartBooks wrote the book on Small Business Finance - Literally!</span>
                    <a href="https://smartbooks.com/resources/guides/chapter-1-financial-operating-system/?utm_source=sitebanner&utm_medium=banner&utm_campaign=sitebanner" target="_top" class="header-top__btn">Learn More</a>
                </div>
            </div>

            <nav class="header">
                <div class="container">

                    <a href="<?php echo home_url(); ?>" class="header__logo" rel="home">
                        <?php if ($header_logo) : ?>
                            <img src="<?php echo $header_logo['url']; ?>" alt="<?php echo $header_logo['alt']; ?>">
                        <?php endif; ?>
                    </a>

                    <!-- <button class="navbar-toggler bg-primary navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="
	                        <?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->

                    <!-- The WordPress Menu goes here -->
                    <?php wp_nav_menu(
                        array(
                            'theme_location'  => 'primary',
                            'container_class' => 'collapse navbar-collapse',
                            'container_id'    => 'navbarNavDropdown',
                            'menu_class'      => 'navbar-nav ml-auto header__nav',
                            'fallback_cb'     => '',
                            'menu_id'         => 'main-menu',
                            'depth'           => 2,
                            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                        )
                    ); ?>


                </div>
            </nav><!-- .site-navigation -->

        </header><!-- #wrapper-navbar end -->