<?php

global $acfBlocks;
$acfBlocks = array();

/** ACF blocks */
$acfBlocks[] = array(
    'name'			=> 'hero',
    'title'			=> __( 'Hero' ),
    'render_template'   => get_template_directory() . '/blocks/hero-block.php',
    'category'		=> 'blocks',
    'icon'			=> 'welcome-widgets-menus',
    'mode'			=> 'edit',
    'keywords'		=> array( 'hero' )
);

$acfBlocks[] = array(
    'name'			=> 'basic-content',
    'title'			=> __( 'Basic Content' ),
    'render_template'   => get_template_directory() . '/blocks/basic-content-block.php',
    'category'		=> 'blocks',
    'icon'			=> 'welcome-widgets-menus',
    'mode'			=> 'edit',
    'keywords'		=> array( 'basic', 'content' )
);

$acfBlocks[] = array(
    'name'			=> 'split-column',
    'title'			=> __( 'Split Column' ),
    'render_template'   => get_template_directory() . '/blocks/split-column-block.php',
    'category'		=> 'blocks',
    'icon'			=> 'welcome-widgets-menus',
    'mode'			=> 'edit',
    'keywords'		=> array( 'split', 'column' )
);

$acfBlocks[] = array(
    'name'			=> 'multi-column',
    'title'			=> __( 'Multi Column' ),
    'render_template'   => get_template_directory() . '/blocks/multi-column-block.php',
    'category'		=> 'blocks',
    'icon'			=> 'welcome-widgets-menus',
    'mode'			=> 'edit',
    'keywords'		=> array( 'multi', 'column' )
);

$acfBlocks[] = array(
    'name'			=> 'testimonials',
    'title'			=> __( 'Testimonials' ),
    'render_template'   => get_template_directory() . '/blocks/testimonials-block.php',
    'category'		=> 'blocks',
    'icon'			=> 'welcome-widgets-menus',
    'mode'			=> 'edit',
    'keywords'		=> array( 'testimonials' )
);

$acfBlocks[] = array(
    'name'			=> 'consultation',
    'title'			=> __( 'Consultation' ),
    'render_template'   => get_template_directory() . '/blocks/consultation-block.php',
    'category'		=> 'blocks',
    'icon'			=> 'welcome-widgets-menus',
    'mode'			=> 'edit',
    'keywords'		=> array( 'consultation' )
);

$acfBlocks[] = array(
    'name'			=> 'subscription',
    'title'			=> __( 'Subscription' ),
    'render_template'   => get_template_directory() . '/blocks/subscription-block.php',
    'category'		=> 'blocks',
    'icon'			=> 'welcome-widgets-menus',
    'mode'			=> 'edit',
    'keywords'		=> array( 'subscription' )
);

$acfBlocks[] = array(
    'name'			=> 'list-icon',
    'title'			=> __( 'List Icon' ),
    'render_template'   => get_template_directory() . '/blocks/list-icon-block.php',
    'category'		=> 'blocks',
    'icon'			=> 'welcome-widgets-menus',
    'mode'			=> 'edit',
    'keywords'		=> array( 'list', 'icon' )
);



/** Limit to our custom ACF-Gutenberg blocks only */
add_filter('allowed_block_types', 'limitBlockTypes');
function limitBlockTypes ($allowedBlocks) {
    global $acfBlocks;

    $allowedBlocks = array();
    foreach ($acfBlocks as $acfBlock) {
        $allowedBlocks[] = 'acf/' . $acfBlock['name'];
    }

    return $allowedBlocks;
}

/** Register ACF-Gutenberg blocks */
add_action('acf/init', 'acfgRegisterBlocks');
function acfgRegisterBlocks () {
    if (!function_exists('acf_register_block_type')) return;

    global $acfBlocks;
    foreach ($acfBlocks as $acfBlock) {
        acf_register_block_type($acfBlock);
    }
}
