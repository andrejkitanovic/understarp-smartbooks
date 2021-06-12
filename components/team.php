<?php

?>

<section class="team" id="team">
    <div class="container">

        <div class="row">
			<?php if ( get_sub_field( 'title' ) ): ?>
                <h2 class="team__title">
					<?php the_sub_field( 'title' ); ?>
                </h2>
			<?php endif; ?>
        </div>

		<?php
		if ( have_rows( 'members' ) ):
			while ( have_rows( 'members' ) ) : the_row();
				$category = get_sub_field( 'category' );

				?>

				<?php if ( $category ): ?>
                    <div class="row">
                        <h3 class="team__category">
							<?php echo $category; ?>
                        </h3>
                    </div>
				<?php endif; ?>

                <div class="team__list row">
					<?php
					if ( have_rows( 'members_item' ) ):
						while ( have_rows( 'members_item' ) ) : the_row();
							$members_image    = get_sub_field( 'members_image' );
							$members_name     = get_sub_field( 'members_name' );
							$members_position = get_sub_field( 'members_position' );
							$members_bio      = get_sub_field( 'members_bio' );
							$ind_years        = get_sub_field( 'industry_years' );
							$smrt_years       = get_sub_field( 'smartbook_years' );
							$badge1           = get_sub_field( 'badge1' );
							$badge2           = get_sub_field( 'badge2' );
							$badge3           = get_sub_field( 'badge3' );


							?>

                            <div class="team__item col-lg-4">
                                <div class="team__item-inner">

									<?php if ( $members_image ) : ?>
                                        <div class="team__img">
                                            <img src="<?php echo $members_image['url']; ?>"
                                                 alt="<?php echo $members_image['alt']; ?>">
                                        </div>
									<?php endif; ?>

                                    <div class="team__info">
										<?php if ( $members_name ) : ?>
                                            <h5 class="team__name">
												<?php echo $members_name; ?>
                                            </h5>
										<?php endif; ?>

										<?php if ( $members_position ) : ?>
                                            <h6 class="team__position">
												<?php echo $members_position; ?>
                                            </h6>
										<?php endif; ?>

										<?php if ( $members_bio ) : ?>
                                            <div class="team__bio">
												<?php echo $members_bio; ?>
                                            </div>
										<?php endif; ?>
                                    </div>

                                    <div class="team__badge1"><img src="<?php echo $badge1['url']; ?>"
                                                                   alt="<?php echo $badge1['alt']; ?>"></div>
                                    <div class="team__badge2"><img src="<?php echo $badge2['url']; ?>"
                                                                   alt="<?php echo $badge2['alt']; ?>"></div>
								    <div class="team__badge3"><img src="<?php echo $badge3['url']; ?>"
                                                                   alt="<?php echo $badge3['alt']; ?>"></div>
                                    <div class="team__ind-year"><span><?php echo $ind_years; ?></span></div>
                                    <div class="team__smrt-year"><span><?php echo $smrt_years; ?></span></div>
                                </div>
                            </div>

						<? endwhile;
					else :

					endif; ?>
                </div>


			<? endwhile;
		else :

		endif; ?>

    </div>
</section>
