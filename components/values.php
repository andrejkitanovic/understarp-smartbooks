<?php

$title    = get_sub_field( 'title' );
$bg_color = get_sub_field( 'bg_color' ) ? 'background-color:' . get_sub_field( 'bg_color' ) . ';' : '';

?>

<section class="values" style="<?php echo $bg_color; ?>">
    <div class="container">
		<?php if ( $title ) : ?>
            <h2 class="values__title"><?php echo $title; ?></h2>
		<?php endif; ?>

        <div class="values__list row">
			<?php
			if ( have_rows( 'item' ) ):
				while ( have_rows( 'item' ) ) : the_row();
					$name = get_sub_field( 'name' );
					$text = get_sub_field( 'text' );
					$icon = get_sub_field( 'icon' );
					?>
                    <div class="values__item">

						<?php if ( $icon ): ?>
                            <div class="values__icon">
                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                            </div>
						<?php endif; ?>

                        <div class="values__descr">
	                        <?php if ( $name ): ?>
                            <h3><?php echo $name; ?></h3>
	                        <?php endif; ?>

	                        <?php if ( $text ): ?>
                                <p><?php echo $text; ?></p>
	                        <?php endif; ?>
                        </div>

                    </div>
				<? endwhile;
			else :

			endif; ?>
        </div>
    </div>
</section>
