<?php

// ? BLOCK

$block = 'subscription';
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

if ($padding) {
	$blockClass .= ' padding-' . $padding;
}

if ($textAlignment) {
	$textStyle .= 'text-align:' . $textAlignment . ';';
}

if ($textColor) {
	$textStyle .= 'color:' . $textColor . ';';
}

if ($bgStyle) {
	$blockStyle .= $bgStyle;
}
if ($textStyle) {
	$blockStyle .= $textStyle;
}

// ? HEADING

$heading = get_field('heading');

if ($heading) {
	$headingClass = $block . '__heading heading';
	$headingSize = $heading['size'];
	$headingColor = $heading['color'];
	$headingText = $heading['text'];
}

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

// ? INPUT BACKGROUND
$inputBg = get_field('input_background');

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
	<?php createTextElement($headingClass, $headingSize, $headingStyle, $headingText); ?>
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
	<!-- Subscription -->
	<div class="<?php echo generateClass($block, '__form') ?>" data-bg="<?php echo $inputBg; ?>">
		<?php gravity_form('New Subscribe', false, false, false, false, true, 1, true); ?>
	</div>

</div>
</section>