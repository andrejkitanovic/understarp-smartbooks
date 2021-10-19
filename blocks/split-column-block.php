<?php

// ? BLOCK

$block = 'split-column';
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

// ? PROPORTION

$proportion = get_field('proportion');

/*

    30% / 70% -> col-4 / col-8 => 4/8
    40% / 60% -> col-5 / col-7 => 5/7
    50% / 50% -> col-6 / col-6 => 6/6
	70% / 30% -> col-8 / col-4 => 8/4
    60% / 40% -> col-7 / col-5 => 7/5

    * |--> calculation is Round number of (n / 10 * 1.2) where n is from 1% to 100%
*/

$firstCol = '6';
$secondCol = '6';

// ! TO BE FIXED
if ($proportion) {
	$proportion = explode('/', $proportion);
	$firstCol = $proportion[0];
	$secondCol = $proportion[1];
}


// ? ORDER

$order = get_field('order');

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

// ? BUTTON

$button = get_field('button');
$buttonStyle = '';
$buttonTitle = '';
$buttonLink = '';

if ($button && $button['link']) {
	$buttonStyle = 'background-color: ' . $button['color']  . ';';
	$buttonTitle = $button['link']['title'];
	$buttonLink = $button['link']['url'];
}


// ? IMAGE

$image = get_field('image');
$imageAlignment = get_field('image_alignment');

// ? MEDIA

$mediaField = get_field('media');
$mediaType = $mediaField['media_type'];

$media = '';
$mediaClass = '';

$buttonLastMedia = '';

if ($mediaField) {
	if ($mediaType === 'image') {
		$media = $mediaField['image'];
		$mediaClass = $mediaField['image_position'];
		$mediaLink = $mediaField['image_link'];
	} else if ($mediaType === 'video') {
		$media = $mediaField['video'];
		$buttonLastMedia = 'd-none d-sm-inline-flex';
	}
}

// ? CONTENT MAX WIDTH
$contentMaxWidth = get_field('content_max_width');

// ? CTA BUTTON
// $ctaButton = get_field('cta_button');
// $ctaLink = $ctaButton['link'];
// $ctaTextColor = $ctaButton['text_color'];
// $ctaBg = $ctaButton['background_color'];

// $ctaStyle = 'color:' . $ctaTextColor . '; background-color:' . $ctaBg;

?>


<?php initializeSection($blockClass, $blockStyle) ?>
<div class="container<?php if ($contentMaxWidth == 'small') echo ' small_container' ?>">
	<div class="row <?php if ($order === 'right') {
						echo 'flex-row-reverse';
					} ?>">
		<div class="col-12 col-xl-<?php echo $firstCol; ?>">
			<!-- Heading -->
			<?php createTextElement($headingClass, $headingSize, $headingStyle, $headingText); ?>
			<!-- Sub Heading -->
			<?php if ($subHeadingText) {
				createTextElement($subHeadingClass, $subHeadingSize, $subHeadingStyle, $subHeadingText);
			}
			?>
			<!-- Description -->
			<?php createDivElement(generateClass($block, '__description description'), '', $description); ?>
			<!-- Button -->
			<?php createLinkElement(generateClass($block, '__button button' . ' ' . $buttonLastMedia), $buttonStyle, $buttonTitle, $buttonLink); ?>
		</div>
		<div class="col-12 col-xl-<?php echo $secondCol; ?>" style="position: static;">
			<div class="<?php echo generateClass($block, '__media'); ?>">
				<!-- Media -->
				<?php
				if ($mediaType === 'video' && $media) { ?>
					<div class="iframe-container">
						<?php createDivElement(generateClass($block, '__video'), '', $media); ?>
						<!-- Button -->
						<?php createLinkElement(generateClass($block, '__button button d-inline-flex d-sm-none'), $buttonStyle, $buttonTitle, $buttonLink); ?>
					</div>
				<? } else if ($mediaType === 'image' && $media) {

					$imageExpand = $mediaField['make_image_expand'];

					if (!$imageExpand) {

						$el = 'div';
						$href = '';
						$imageWidth = $mediaField['image_width'];
						$imageHeight = $mediaField['image_height'];
						if ($imageWidth && $imageHeight) {
							$imageStyle = 'height: ' . $imageHeight . 'px; width: ' . $imageWidth . 'px;';
						}

						if ($mediaLink) {
							$el = 'a';
							$href = 'href="' . $mediaLink . '"';
						}

						echo '<' . $el .  ' ' . $href . ' class="' . generateClass($block, '__image')  . ' ' . $mediaClass . '" style="background-image: url(' . $media['url'] . ');' .
							$imageStyle . '">
						</' . $el .  '>';
					}
				?>

				<?php }
				?>
			</div>
		</div>

	</div>
</div>
<?php if ($mediaField['make_image_expand'] && $mediaType === 'image') {
	$expandedStyle = '';
	$imgClass = '__expanded-image';
	if ($order === 'right') {
		$expandedStyle = "left: 0;";
		$imgClass .= ' stick-left';
	} else {
		$expandedStyle = "right: 0;";
	}
?>
	<div style="<?php echo $expandedStyle; ?>" class="<?php echo generateClass($block, '__expanded-image-holder') ?>">
		<div class="<?php echo generateClass($block, $imgClass) ?>" style="background-image: url('<?php echo $media['url'] ?>');">
		</div>
	</div>
<?php } ?>
</section>