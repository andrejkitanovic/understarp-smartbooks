<?php
?>

<section class="worked-with">
    <div class="container">
        <div class="row">
        <span class="worked-with__text">
            We’ve worked with:
        </span>
			<?php
			if ( have_rows( 'companies' ) ):

				while ( have_rows( 'companies' ) ) : the_row();
					$company_logo         = get_sub_field( 'company_logo' );
					$company_link         = get_sub_field( 'company_link' ) ? 'href="' . get_sub_field( 'company_link' ) . '"' : '';

					if ( $company_logo ) :
						$company_logo_url = $company_logo['url'];
						$company_logo_alt = $company_logo['alt']; ?>
                        <div class="worked-with__item">
                            <a <?php echo $company_link; ?>>
                                <img src="<?php echo $company_logo_url; ?>"
                                     alt="<?php echo $company_logo_alt; ?>">
                            </a>
                        </div>
					<?php endif;

				endwhile;

			else :

			endif; ?>
        </div>
    </div>
</section>
