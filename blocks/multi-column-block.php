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
$columnTitleSize = get_field('column_header_size');
$columnTitleBolded = get_field('column_header_bolded');
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

?>


<?php initializeSection($blockClass, $blockStyle) ?>
<div class="container">
	<!-- Heading -->
	<?php createTextElement(generateClass($block, '__heading heading'), $headingSize, $headingStyle, $headingText); ?>
	<!-- Description -->
	<?php createTextElement(generateClass($block, '__description description'), 'div', '', $description); ?>

	<div class="<?php echo $columnsClass; ?>">
		<div class="row">
			<?php foreach ($columns as $column) { ?>
				<div class="col-12 col-md-6 col-lg-<?php echo $colSize; ?>">
					<a href="<?php echo $column['link']['url'] ?>" class="<?php echo generateClass($block, '__column'); ?>">
						<!-- Background -->
						<div class="<?php echo generateClass($block, '__column-background') ?>" style="<?php echo $columnStyle; ?>"></div>
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
				</div>
			<?php } ?>
		</div>
	</div>

</div>
</section>