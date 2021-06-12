<?php
// check if the flexible content field has rows of data
if ( have_rows( 'page_builder' ) ):
	// loop through the rows of data
	while ( have_rows( 'page_builder' ) ) : the_row();
		if ( 'homepage_banner' == get_row_layout() ):
			get_template_part( 'components/homepage-banner' );
		elseif ( 'worked_with' == get_row_layout() ):
			get_template_part( 'components/worked-with' );
		elseif ( 'features' == get_row_layout() ):
			get_template_part( 'components/features' );
		elseif ( 'solutions' == get_row_layout() ):
			get_template_part( 'components/solutions' );
		elseif ( 'contact_us' == get_row_layout() ):
			get_template_part( 'components/contact-us' );
		elseif ( 'inner_intro' == get_row_layout() ):
			get_template_part( 'components/inner-intro' );
		elseif ( 'profit' == get_row_layout() ):
			get_template_part( 'components/profit' );
		elseif ( 'technology' == get_row_layout() ):
			get_template_part( 'components/technology' );
		elseif ( 'case' == get_row_layout() ):
			get_template_part( 'components/case' );
		elseif ( 'quote' == get_row_layout() ):
			get_template_part( 'components/quote' );
		elseif ( 'resources' == get_row_layout() ):
			get_template_part( 'components/resources' );
		elseif ( 'services' == get_row_layout() ):
			get_template_part( 'components/services' );
		elseif ( 'testimonial' == get_row_layout() ):
			get_template_part( 'components/testimonial' );
		elseif ( 'default_content' == get_row_layout() ):
			get_template_part( 'components/default-content' );
		elseif ( 'inner_contact' == get_row_layout() ):
			get_template_part( 'components/inner-contact' );
		elseif ( 'inner_banner' == get_row_layout() ):
			get_template_part( 'components/inner-banner' );
		elseif ( 'privilege' == get_row_layout() ):
			get_template_part( 'components/privilege' );
		elseif ( 'plans' == get_row_layout() ):
			get_template_part( 'components/plans' );
		elseif ( 'team' == get_row_layout() ):
			get_template_part( 'components/team' );
		elseif ( 'separator' == get_row_layout() ):
			get_template_part( 'components/separator' );
		elseif ( 'inner_case' == get_row_layout() ):
			get_template_part( 'components/inner-case' );
		elseif ( 'case_intro' == get_row_layout() ):
			get_template_part( 'components/case-intro' );
		elseif ( 'values' == get_row_layout() ):
			get_template_part( 'components/values' );
		elseif ( 'slider' == get_row_layout() ):
			get_template_part( 'components/slider' );
		endif;
	endwhile;
else :
	// no layouts found
endif;