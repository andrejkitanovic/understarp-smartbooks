<?php

$bg_image = get_sub_field( 'bg_image' ) ? 'background-image: url(' . get_sub_field( 'bg_image' ) . '); ' : '';
$bg_color = get_sub_field( 'bg_color' ) ? 'background-color:' . get_sub_field( 'bg_color' ) . ';' : '';

?>


<section class="privilege" style="<?php echo $bg_image . ' ' . $bg_color; ?>">
    <div class="container">
        <div class="row">
			<?php if ( get_sub_field( 'title' ) ) : ?>
                <h2 class="privilege__title">
					<?php the_sub_field( 'title' ) ?>
                </h2>
			<?php endif; ?>

            <ul class="privilege__list">

				<?php
				if ( have_rows( 'privilege_item' ) ):
					while ( have_rows( 'privilege_item' ) ) : the_row();
						$privilege_title = get_sub_field( 'privilege_title' );
						$privilege_text  = get_sub_field( 'privilege_text' );
						?>

                        <li class="privilege__item">
							<?php if ( $privilege_title ) : ?>
                                <h3>
									<?php echo $privilege_title; ?>
                                </h3>
							<?php endif; ?>

							<?php if ( $privilege_text ) : ?>
                                <p>
									<?php echo $privilege_text; ?>
                                </p>
							<?php endif; ?>
                        </li>

					<? endwhile;
				else :

				endif; ?>
            </ul>
        </div>
    </div>
</section>
