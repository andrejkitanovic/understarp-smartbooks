<?php

$bg_color           = get_sub_field( 'bg_color' ) ? 'background-color:' . get_sub_field( 'bg_color' ) . ';' : '';
$decor_image        = get_sub_field( 'decor_image' );
$member_photo       = get_sub_field( 'member_photo' );
$small_member_photo = get_sub_field( 'small_member_photo' );
$image_trig         = get_sub_field( 'image_trig' ) ? '' : 'solutions--full';
$button             = get_sub_field( 'button' );
$button_text        = get_sub_field( 'button_text' );
$button_link        = get_sub_field( 'button_link' );

?>

<section class="solutions <?php echo $image_trig; ?>" style="<?php echo $bg_color; ?>">
    <div class="container">
        <div class="row">
            <div class="solutions__descr">

				<?php if ( get_sub_field( 'title' ) ) : ?>
                    <h2 class="solutions__title"><?php the_sub_field( 'title' ); ?></h2>
				<?php endif; ?>

				<?php if ( get_sub_field( 'text' ) ) : ?>
                    <p class="solutions__text"><?php the_sub_field( 'text' ); ?></p>
				<?php endif; ?>

                <div class="solutions__benefits">
					<?php
					if ( have_rows( 'benefits' ) ):
						while ( have_rows( 'benefits' ) ) : the_row();
							?>
                            <div class="solutions__benefits-item">
								<?php if ( get_sub_field( 'benefits_title' ) ) : ?>
                                    <h3><?php the_sub_field( 'benefits_title' ); ?></h3>
								<?php endif; ?>

								<?php if ( get_sub_field( 'benefits_text' ) ) : ?>
                                    <div><?php the_sub_field( 'benefits_text' ); ?></div>
								<?php endif; ?>
                            </div>
						<? endwhile;
					else :

					endif; ?>
                </div>

            </div>

			<?php if ( get_sub_field( 'image_trig' ) ) : ?>
                <div class="solutions__team">
					<?php if ( $decor_image ) : ?>
                        <div class="solutions__team-inner">
                            <div class="solutions__team-arrow solutions__team-arrow--left"></div>

                            <div class=" solutions__member--first">
                                <div class="solutions__member-item"></div>
                            </div>

                            <img src="<?php echo $decor_image['url']; ?>" alt="<?php echo $decor_image['alt']; ?>">

                            <div class="solutions__member solutions__member--second">
                                <div class="solutions__member-item"></div>
                            </div>

                            <div class="solutions__member-stack">
								<?php
								$i = 1;
								if ( have_rows( 'members' ) ):
									while ( have_rows( 'members' ) ) : the_row();
										$members_photo = get_sub_field( 'member_photo' );
										if ( $i == 1 ) {
											$active = ' first';
										} elseif ( $i == 2 ) {
											$active = ' second';
										} else {
											$active = '';
										}
										?>
                                        <div class="solutions__member-item<?php echo $active; ?>"
                                             data-number="<?php echo $i; ?>">
                                            <div class="solutions__member-avatar">
                                                <img src="<?php echo $members_photo['url']; ?>"
                                                     alt="<?php echo $members_photo['alt']; ?>">
                                            </div>
                                            <div class="solutions__member-descr">
                                                <span class="solutions__member-text"><?php the_sub_field( 'member_text' ); ?></span>
                                                <span class="solutions__member-info"><?php the_sub_field( 'member_info' ); ?></span>
                                            </div>
                                        </div>
										<?php $i ++;
									endwhile;
								endif; ?>
                            </div>
                            <div class="solutions__team-arrow solutions__team-arrow--right"></div>
                        </div>
					<?php endif; ?>
                </div>
			<?php endif; ?>
        </div>

		<?php if ( $button ) : ?>
            <div class="row">
                <div class="solutions__btn">
                    <a class="btn" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a>
                </div>
            </div>
		<?php endif; ?>
</section>
