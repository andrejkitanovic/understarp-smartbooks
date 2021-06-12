<?php

$services_image = get_sub_field( 'image' );
$bg_color       = 'style="' . 'background-color:' . get_sub_field( 'bg_color' ) . ';"';

?>

<section class="services" <?php echo $bg_color; ?>>
    <div class="container">
        <div class="row">
			<?php if ( get_sub_field( 'title' ) ) : ?>
                <h2 class="services__title"><?php the_sub_field( 'title' ) ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'subtitle' ) ) : ?>
                <p class="services__subtitle">
					<?php the_sub_field( 'subtitle' ) ?>
                </p>
			<?php endif; ?>

			<?php if ( get_sub_field( 'text' ) ) : ?>
                <p class="services__text">
					<?php the_sub_field( 'text' ) ?>
                </p>
			<?php endif; ?>
        </div>

        <div class="row">
			<?php if ( $services_image ) : ?>
                <div class="services__image">
                    <img src="<?php echo $services_image['url']; ?>"
                         alt="<?php echo $services_image['alt']; ?>">
                </div>
			<?php endif; ?>
            <div class="services__descr">

				<?php if ( get_sub_field( 'list_title' ) ) : ?>
                    <h3 class="services__title services__title--list"><?php the_sub_field( 'list_title' ); ?></h3>
				<?php endif; ?>

				<?php if ( get_sub_field( 'list_content' ) ) : ?>
                    <div class="services__content"><?php the_sub_field( 'list_content' ); ?></div>
				<?php endif; ?>

            </div>
        </div>
    </div>
</section>
