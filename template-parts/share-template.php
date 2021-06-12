<div class="post__share">
	<?php
	$url = urlencode( get_permalink() );

	$title = str_replace( ' ', '%20', get_the_title() );

	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

	$twitterURL  = 'https://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $url . '&amp;via=social';
	$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
	$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&amp;title=' . $title;

	?>
    <span>Share</span>
    <a href="<?php echo $facebookURL; ?>"><i class="fa fa-facebook-square"></i></a>
    <a href="<?php echo $twitterURL; ?>"><i class="fa fa-twitter"></i></a>
    <a href="<?php echo $linkedInURL; ?>"><i class="fa fa-linkedin"></i></a>
</div>
