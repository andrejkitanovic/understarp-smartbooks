<?php

/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('understrap_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts()
	{
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get('Version');

		wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@6/swiper-bundle.min.css');
		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.min.css');
		wp_enqueue_style('understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version);
	

		wp_enqueue_script('jquery');

		$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/theme.min.js');


		wp_register_script('gsap', 'https://cdn.jsdelivr.net/combine/npm/gsap@3.6.1,npm/gsap@3.6.1/dist/CSSRulePlugin.min.js,npm/gsap@3.6.1/dist/ScrollTrigger.min.js,npm/gsap@3.6.1/dist/ScrollToPlugin.min.js,npm/gsap@3.6.1/dist/CSSRulePlugin.min.js', array(), null, true);
		wp_register_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@6/swiper-bundle.min.js', array(), null, true);


		wp_enqueue_script('gsap');
		wp_enqueue_script('swiper');

		wp_enqueue_script('understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true);
		wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/custom.js', array(), $js_version, true);

		wp_enqueue_script('header', get_template_directory_uri() . '/js/animations.js', array(), $js_version, true);

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action('wp_enqueue_scripts', 'understrap_scripts');
