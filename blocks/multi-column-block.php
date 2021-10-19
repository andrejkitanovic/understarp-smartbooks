<?php

// ? BLOCK

$block = 'multi-column';
$blockClass = $block;

//  * |--> Block styling

$blockStyle = '';

//  * |---|--> Block background

$bgType  = get_field('background_type');
$bgColor = get_field('background_color');
$bgImage = get_field('baclground_image');
$bgStyle = '';

if ($bgType) {
	if ($bgType == 'colored') {
		$bgStyle = 'background-color: ' . $bgColor  . ';';
	}
	if ($bgType == 'image') {
		$bgStyle = 'background-image: url(' . $bgImage . ');';
	}
}

//  * |---|--> Block text alignment

$textStyle = '';
$textAlignment = get_field('text_alignment');

// * |--\--> Block text color

$textColor = get_field('text_color');

//  * |---|--> Block padding

$padding = get_field('padding');

if ($textAlignment) {
	$textStyle .= 'text-align:' . $textAlignment . ';';
}

if ($textColor) {
	$textStyle .= 'color:' . $textColor . ';';
}

if ($padding) {
	$blockClass .= ' padding-' . $padding;
}

if ($bgStyle) {
	$blockStyle .= $bgStyle;
}
if ($textStyle) {
	$blockStyle .= $textStyle;
}

// ? HEADING

$heading = get_field('heading');
$headingSize = $heading['size'];
$headingColor = $heading['color'];
$headingText = $heading['text'];

$headingStyle = 'color:' . $headingColor . ';';

// ? SUB HEADING

$subHeading = get_field('sub_heading');

if ($subHeading) {
	$subHeadingClass = $block . '__sub-heading sub-heading';
	$subHeadingSize = $subHeading['size'];
	$subHeadingColor = $subHeading['color'];
	$subHeadingText = $subHeading['text'];
}

$subHeadingStyle = 'color:' . $subHeadingColor . ';';

// ? DESCRIPTION

$description = get_field('description');

// ? COLUMNS

$columns = filterDisplayed(get_field('columns'));
$colSize = 12;

if ($columns) {
	if (count($columns) < 4) {
		$colSize = round(12 / count($columns));
	} else $colSize = 3;
}

$columnsClass = generateClass($block, '__columns');


//  * |--> Columns styling

$columnStylingField = get_field('column_styling');
$columnType  = $columnStylingField['column_type'];
$columnBackground = $columnStylingField['column_background'];
$columnTitleColor = $columnStylingField['column_title_color'];
$columnTitleSize = $columnStylingField['column_header_size'];
$columnTitleBolded = $columnStylingField['column_header_bolded'];
$columnStyle = '';

if ($columnType) {
	if ($columnType == 'boxed') {
		$columnStyle = 'background-color: ' . $columnBackground  . ';';
		$columnsClass .= ' boxed';
	}
}

$columnTitleClass = '__column-title';

$columnTitleClass .= ' font-' . $columnTitleSize;

$columnTitleStyle = 'color: ' . $columnTitleColor  . ';';

if ($columnTitleBolded) {
	$columnTitleStyle .= ' font-weight: bold;';
}

// ? CONTENT MAX WIDTH
$contentMaxWidth = get_field('content_max_width');

// ? CTA BUTTON
$ctaButton = get_field('cta_button');
$ctaLink = $ctaButton['link'];
$ctaTextColor = $ctaButton['color'];
$ctaBg = $ctaButton['background_color'];

$ctaStyle = 'color:' . $ctaTextColor . '; background-color:' . $ctaBg;

?>


<?php initializeSection($blockClass, $blockStyle) ?>
<div class="container<?php if ($contentMaxWidth == 'small') echo ' small_container' ?>">
	<!-- Heading -->
	<?php createTextElement(generateClass($block, '__heading heading'), $headingSize, $headingStyle, $headingText); ?>
	<!-- Sub Heading -->
	<?php if ($subHeadingText) {
		createTextElement($subHeadingClass, $subHeadingSize, $subHeadingStyle, $subHeadingText);
	}
	?>
	<!-- Description -->
	<?php createTextElement(generateClass($block, '__description description'), 'div', '', $description); ?>
	<!-- Button -->
	<?php if ($ctaLink) {
		createLinkElement(generateClass($block, '__button button'), $ctaStyle, $ctaLink['title'], $ctaLink['url']);
	} ?>

	<div class="<?php echo $columnsClass; ?>">
		<div class="row">
			<?php foreach ($columns as $column) {
				$colCta = $column['cta_button'];
				$colCtaLink = $colCta['link'];
				$colCtaTextColor = $colCta['color'];
				$colCtaBg = $colCta['background_color'];

				$colCtaStyle = 'color:' . $colCtaTextColor . '; background-color:' . $colCtaBg;

				$bgClass = '__column-background';
			?>
				<div class="col-12 col-md-6 col-lg-<?php echo $colSize; ?>">
					<?php if ($colCtaLink) {  ?>
						<div class="<?php echo generateClass($block, '__column'); ?>">
							<!-- Background -->
							<div class="<?php echo generateClass($block, $bgClass) ?>" style="<?php echo $columnStyle; ?>"></div>
							<!-- Icon -->
							<?php
							$icon = '';
							$alt = '';

							if ($column['icon']) {
								$icon = $column['icon']['url'];
								$alt = $column['icon']['title'];
							}
							createImageElement(generateClass($block, '__column-icon'), $icon, $alt);
							?>
							<!-- Column Title -->
							<?php createTextElement(generateClass($block, $columnTitleClass), 'p', $columnTitleStyle, $column['title']); ?>
							<!-- Column Description -->
							<?php createTextElement(generateClass($block, '__column-description with-btn'), 'p', '', $column['description']); ?>
							<!-- Button -->
							<?php if ($colCtaLink) {
								createLinkElement(generateClass($block, '__column-button button'), $colCtaStyle, $colCtaLink['title'], $colCtaLink['url']);
							} ?>
						</div>
					<?php } else { ?>
						<a href="<?php echo $column['link']['url'] ?>" class="<?php echo generateClass($block, '__column'); ?>">
							<!-- Background -->
							<div class="<?php echo generateClass($block, $bgClass) ?>" style="<?php echo $columnStyle; ?>"></div>
							<!-- Icon -->
							<?php
							$icon = '';
							$alt = '';

							if ($column['icon']) {
								$icon = $column['icon']['url'];
								$alt = $column['icon']['title'];
							}
							createImageElement(generateClass($block, '__column-icon'), $icon, $alt);
							?>
							<!-- Column Title -->
							<?php createTextElement(generateClass($block, $columnTitleClass), 'p', $columnTitleStyle, $column['title']); ?>
							<!-- Column Description -->
							<?php createTextElement(generateClass($block, '__column-description'), 'p', '', $column['description']); ?>
						</a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>

</div>
</section>