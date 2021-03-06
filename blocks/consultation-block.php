<?php

// ? BLOCK

$block = 'consultation';
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

// ? LABEL

$label = get_field('label');
$labelClass = '';
$labelColor = '';
$labelText = '';

if ($label) {
	$labelClass = $block . '__label label';
	$labelColor = $label['color'];
	$labelText = $label['text'];
}

$labelStyle = 'color:' . $labelColor . ';';

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

// ? CLENDAR

$calendar = get_field('calendar');

// ? IMAGE

$image = get_field('image');

// ? CONTENT MAX WIDTH
$contentMaxWidth = get_field('content_max_width');

// ? SINGLE COLUMN TYPE
$isSingleColumn = get_field('single_column_layout');

$colClass = "col-12 col-xl-6";

if ($isSingleColumn) {
	$colClass = "col-12";
}

// ? CTA BUTTON
$ctaButton = get_field('cta_button');
$ctaLink = $ctaButton['link'];
$ctaTextColor = $ctaButton['color'];
$ctaBg = $ctaButton['background_color'];

$ctaStyle = 'color:' . $ctaTextColor . '; background-color:' . $ctaBg;

?>

<?php initializeSection($blockClass, $blockStyle) ?>


<div class="container<?php if ($contentMaxWidth == 'small') echo ' small_container' ?>">
	<div class="row">
		<?php if (!$isSingleColumn) { ?>
			<div class="col-12 col-xl-6">

			</div>
		<?php } ?>
		<div class="<?php echo $colClass; ?>">
			<!-- Label -->
			<?php createTextElement($labelClass, 'p', $labelStyle, $labelText); ?>
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

			<!-- Calendar -->
			<?php createDivElement(generateClass($block, '__calendar'), '', $calendar); ?>

		</div>
	</div>
</div>
<?php if (!$isSingleColumn) { ?>
	<div class="<?php echo generateClass($block, '__images'); ?> d-none d-sm-block">
		<!-- Image -->
		<?php
		createDivImageElement(generateClass($block, '__image'), $image['url'], '', '');
		?>
	</div>
<?php } ?>

<script>
	let initialized = false;
	let intersectionObserver = new IntersectionObserver(function(entries) {
		if (entries[0].intersectionRatio <= 0) return;

		if (!initialized) {
			const script = document.createElement('script');
			script.type = 'text/javascript';
			script.async = true;
			script.src = "https://assets.calendly.com/assets/external/widget.js";
			document.getElementsByTagName('head')[0].appendChild(script);

			initialized = true;
		}
	});

	intersectionObserver.observe(document.querySelector(".consultation"));
</script>
</section>