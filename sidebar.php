<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$terms        = get_terms( [
	'taxonomy'   => 'wf_post_folders',
	'hide_empty' => false,
] );
$all_active   = empty( $_GET['folder_id'] ) ? 'class="active"' : '';
$sidebar_form = get_field( 'sidebar_form', 'options' );
?>


    <aside class="sidebar">

		<?php if ( is_home() ) : ?>
            <div class="sidebar__categories">
                <a <?php echo $all_active ?> href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">All
                    Content</a>

				<?php foreach ( $terms as $value ) {
					if ( $value->count > 0 ) {
						$active_folder = '';
						if ( isset( $_GET['folder_id'] ) && ! empty( $_GET['folder_id'] ) ) {
							$active_folder = $_GET['folder_id'] == $value->term_taxonomy_id ? 'class="active"' : '';
						};

						echo '<a ' . $active_folder . 'href="' . get_permalink( get_option( 'page_for_posts' ) ) . '?folder_id=' . $value->term_taxonomy_id . '">' . $value->name . '</a>';
					}
				} ?>
            </div>
		<?php else :
			dynamic_sidebar( 'true_side' );
		endif; ?>

		<?php if ( $sidebar_form ) : ?>
            <div class="subscribe sidebar__subscribe">
                <div class="subscribe__inner">
					<?php echo $sidebar_form; ?>
                    <span>We’ll never share your email address and you can opt out at any time, we promise.</span>
                </div>
            </div>
		<?php endif; ?>


    </aside>

