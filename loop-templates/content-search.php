<?php

/**
 * Search results partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
			'</a></h2>'
		);
		?>

		<?php
		// if ( 'post' == get_post_type() ) : 
		?>

		<!-- <div class="entry-meta"> -->

			<?php 
			// understrap_posted_on(); ?>

		<!-- </div> -->
		<!-- .entry-meta -->

		<?php
		//endif; 
		?>

	</header><!-- .entry-header -->

	<div class="entry-summary">

		<?php
            $metatagarray = get_meta_tags(get_permalink());
			$description = $metatagarray["description"];
			echo $description;
        ?>


	</div><!-- .entry-summary -->

	<footer class="entry-footer">

		<?php
		// understrap_entry_footer();
		?>

		<p class="link">View Page</p>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->