<?php

// ? BLOCK

$block = 'basic-content';
$blockClass = $block;

//  * |--> Block styling

$blockStyle = '';

//  * |---|--> Block background

$bgType  = get_field('background_type');
$bgColor = get_field('background_color');
$bgImage = get_field('background_image');
$bgStyle = '';

if ($bgType) {
	if ($bgType == 'colored') {
		$bgStyle = 'background-color: ' . $bgColor  . ';';
	}
	if ($bgType == 'image') {
		$bgStyle = 'background-image: url(' . $bgImage['url'] . ');';
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
$descriptionClass = $block . '__description description';

// ? IMAGES

$images = filterDisplayed(get_field('images'));

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
	<?php createTextElement($descriptionClass, 'div', '', $description); ?>
	<!-- Button -->
	<?php if ($ctaLink) {
		createLinkElement(generateClass($block, '__button button'), $ctaStyle, $ctaLink['title'], $ctaLink['url']);
	} ?>

	<div class="row justify-content-center">
		<?php foreach ($images as $image) { ?>
			<div class="<?php echo generateClass($block, '__image-holder'); ?> ">
				<!-- Image -->
				<?php createImageElement(generateClass($block, '__image'), $image['image']['url'], $image['image']['title']); ?>
			</div>
		<?php } ?>
	</div>
</div>

</section>